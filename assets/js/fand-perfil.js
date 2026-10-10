/* FAND · motor de perfil orientativo. Todo se guarda solo en este navegador (localStorage). */
(function () {
  "use strict";
  var KEY = "fand.perfil.v1";
  var GAMES = {
    J01: "Encuentra al Robot", J02: "Que no te engañen", J03: "Pulsa o Espera", J04: "El Vigilante",
    J05: "La Torre", J06: "La lista", J07: "Recuerda la secuencia"
  };
  var DOMAINS = [
    { id: "atencion", label: "Atención y control inhibitorio", games: ["J01", "J02", "J03", "J04"],
      families: "Perfiles atencionales/ejecutivos (por ejemplo, rasgos compatibles con TDAH)" },
    { id: "ejecutiva", label: "Planificación y funciones ejecutivas", games: ["J05"],
      families: "Perfiles ejecutivos y de organización (TDAH, TEA, otros)" },
    { id: "memoria", label: "Memoria y aprendizaje", games: ["J06", "J07"],
      families: "Dificultades de memoria de trabajo y aprendizaje verbal/visoespacial" }
  ];
  // Umbrales orientativos genéricos, sin baremos por edad. flag: valor que marca posible dificultad; strong: valor que marca fortaleza.
  var RULES = {
    J04: [
      ["detectionRate", "Detección de objetivos (%)", "low", 70, 90],
      ["omissionRate", "Omisiones (%)", "high", 25, 10],
      ["falseAlarmRate", "Falsas alarmas (%)", "high", 15, 5],
      ["rtCv", "Variabilidad del tiempo de respuesta (CV)", "high", 0.45, 0.25],
      ["vigilanceDecrement", "Descenso de vigilancia (puntos %)", "high", 20, 5],
      ["anticipatory", "Respuestas anticipatorias (n)", "high", 3, 0]
    ],
    J01: [
      ["detectionRate", "Detección de robots (%)", "low", 70, 90],
      ["falseAlarmRate", "Falsas alarmas (%)", "high", 15, 5],
      ["highSimilarityBalancedAccuracy", "Precisión con distractores muy similares (%)", "low", 65, 85]
    ],
    J03: [
      ["goAccuracy", "Aciertos en señales Go (%)", "low", 80, 95],
      ["omissionRate", "Omisiones Go (%)", "high", 15, 5],
      ["commissionRate", "Errores de comisión No-Go (%)", "high", 35, 15],
      ["rtCv", "Variabilidad del tiempo de respuesta (CV)", "high", 0.4, 0.25],
      ["anticipatory", "Respuestas anticipatorias (n)", "high", 3, 0]
    ],
    J02: [
      ["accuracy", "Precisión (%)", "low", 75, 90],
      ["omissionRate", "Omisiones (%)", "high", 15, 5],
      ["rtCv", "Variabilidad del tiempo de respuesta (CV)", "high", 0.45, 0.25],
      ["interferenceTimeCostMs", "Coste de interferencia en tiempo (ms)", "high", 300, 100],
      ["interferenceErrorCost", "Coste de interferencia en errores (puntos %)", "high", 20, 5]
    ],
    J05: [
      ["solvedRate", "Problemas resueltos (%)", "low", 60, 90],
      ["extraMovesMean", "Movimientos extra sobre el mínimo (media)", "high", 6, 2],
      ["efficiencyMean", "Eficiencia (%)", "low", 50, 80],
      ["ruleErrors", "Movimientos no permitidos (n)", "high", 5, 0],
      ["resets", "Deshacer/reinicios (n)", "high", 8, 2]
    ],
    J06: [
      ["r1", "Recuerdo en la 1.ª escucha (de 15)", "low", 5, 8],
      ["r5", "Recuerdo en la 5.ª escucha (de 15)", "low", 10, 13],
      ["learningTotal", "Aprendizaje total R1–R5 (de 75)", "low", 40, 55],
      ["gain", "Ganancia R5 − R1 (palabras)", "low", 3, 6],
      ["retention", "Retención tras la pausa (%)", "low", 70, 90],
      ["intrusions", "Intrusiones (n)", "high", 3, 0],
      ["perseverations", "Repeticiones (n)", "high", 3, 0]
    ],
    J07: [
      ["maxSpan", "Máxima longitud recordada", "low", 4, 6],
      ["orderAccuracy", "Precisión del orden (%)", "low", 60, 85],
      ["locationAccuracy", "Precisión de localización (%)", "low", 70, 90],
      ["consistency", "Consistencia (%)", "low", 50, 80]
    ]
  };

  function read() {
    try { return JSON.parse(localStorage.getItem(KEY)) || { sessions: [], user: {} }; }
    catch (e) { return { sessions: [], user: {} }; }
  }
  function write(data) {
    try { localStorage.setItem(KEY, JSON.stringify(data)); return true; } catch (e) { return false; }
  }
  function save(code, session) {
    if (!GAMES[code]) return false;
    var data = read();
    data.sessions.push({
      code: code, at: new Date().toISOString(), ageGroup: session.ageGroup || "unspecified",
      level: session.level || "", valid: !!session.valid, completed: !!session.completed,
      interruptions: session.interruptions || 0, selfReport: session.selfReport || null, metrics: session.metrics || {}
    });
    if (data.sessions.length > 60) data.sessions = data.sessions.slice(-60);
    return write(data);
  }
  function latestValid(sessions) {
    var latest = {};
    sessions.forEach(function (s) { if (s.valid) latest[s.code] = s; });
    return latest;
  }
  function judge(rule, value) {
    if (value === null || value === undefined || typeof value !== "number" || !isFinite(value)) return null;
    var dir = rule[2], flag = rule[3], strong = rule[4];
    if (dir === "low") return value < flag ? "difficulty" : value >= strong ? "strength" : "typical";
    return value > flag ? "difficulty" : value <= strong ? "strength" : "typical";
  }
  function evaluate() {
    var data = read();
    var latest = latestValid(data.sessions);
    var warnings = [];
    data.sessions.forEach(function (s) {
      if (!s.valid) warnings.push(GAMES[s.code] + ": sesión del " + s.at.slice(0, 10) + " no válida o incompleta; no se usa en el perfil.");
    });
    var totalEval = 0, totalFlag = 0;
    var domains = DOMAINS.map(function (domain) {
      var items = [], strengths = [], difficulties = [], evaluable = 0, flagged = 0, played = [];
      domain.games.forEach(function (code) {
        var session = latest[code];
        if (!session) return;
        played.push(code);
        (RULES[code] || []).forEach(function (rule) {
          var value = session.metrics[rule[0]];
          var verdict = judge(rule, value);
          if (verdict === null) return;
          evaluable += 1;
          var item = { code: code, game: GAMES[code], label: rule[1], value: value, verdict: verdict };
          items.push(item);
          if (verdict === "difficulty") { flagged += 1; difficulties.push(item); }
          if (verdict === "strength") strengths.push(item);
        });
      });
      totalEval += evaluable; totalFlag += flagged;
      return {
        id: domain.id, label: domain.label, families: domain.families, played: played, items: items,
        evaluable: evaluable, flagged: flagged, strengths: strengths, difficulties: difficulties,
        index: evaluable >= 4 ? Math.round(flagged / evaluable * 100) : null
      };
    });
    return {
      user: data.user, sessions: data.sessions, latest: latest, domains: domains, warnings: warnings,
      overall: { evaluable: totalEval, flagged: totalFlag, index: totalEval >= 6 ? Math.round(totalFlag / totalEval * 100) : null },
      games: GAMES, generatedAt: new Date().toISOString()
    };
  }
  function setUser(user) { var data = read(); data.user = user || {}; return write(data); }
  function clear() { try { localStorage.removeItem(KEY); } catch (e) { /* sin acceso */ } }

  window.FANDProfile = { save: save, evaluate: evaluate, setUser: setUser, clear: clear, games: GAMES, domains: DOMAINS, rules: RULES };
  window.saveProfile = function (code, session) {
    try { return save(code, session); } catch (e) { return false; }
  };
})();
