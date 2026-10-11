/* FAND · motor de perfil orientativo. Todo se guarda solo en este navegador (localStorage). */
(function () {
  "use strict";
  var KEY = "fand.perfil.v1";
  var GAMES = {
    J01: "Encuentra al Robot", J02: "Que no te engañen", J03: "Pulsa o Espera", J04: "El Vigilante",
    J05: "La Torre", J06: "La lista", J07: "Recuerda la secuencia", J08: "El círculo mayor"
  };
  var DOMAINS = [
    { id: "atencion", label: "Atención y control inhibitorio", games: ["J01", "J02", "J03", "J04", "J08"],
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
    ],
    J08: [
      ["accuracy", "Aciertos al elegir el círculo mayor (%)", "low", 70, 90],
      ["dynamicAccuracy", "Aciertos con movimiento (%)", "low", 65, 85],
      ["movementCost", "Coste del movimiento en aciertos (puntos %)", "high", 25, 10],
      ["rtCv", "Variabilidad del tiempo de respuesta (CV)", "high", 0.5, 0.3]
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
    var given = session.ageGroup && session.ageGroup !== "unspecified" ? session.ageGroup : null;
    var userBand = bandOf(Number((data.user || {}).ageYears));
    data.sessions.push({
      code: code, at: new Date().toISOString(), ageGroup: given || (userBand ? BAND_LABELS[userBand] : "unspecified"),
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
  function setUser(user) { var data = read(); data.user = Object.assign({}, data.user, user || {}); return write(data); }
  function clear() { try { localStorage.removeItem(KEY); } catch (e) { /* sin acceso */ } }

  // Franjas de edad de las fichas técnicas (grupos de planificación del piloto, no normas).
  function bandOf(years) {
    if (!isFinite(years) || years === null || years <= 0) return null;
    if (years <= 8) return "6-8";
    if (years <= 11) return "9-11";
    if (years <= 17) return "12-17";
    if (years <= 59) return "18-59";
    return "60+";
  }
  var BAND_LABELS = { "6-8": "3–8 años", "9-11": "9–11 años", "12-17": "12–17 años", "18-59": "18–59 años", "60+": "60 años o más" };
  // Valores iniciales de cada juego según la franja (inicio del rango «niveles FAND piloto» de cada ficha).
  var AGE_CONFIG = {
    "6-8":   { group: "child", gng: 1, watcher: 1, circle: { levels: 2, seconds: 45 }, towerLevels: 4 },
    "9-11":  { group: "child", gng: 2, watcher: 3, circle: { levels: 3, seconds: 30 }, towerLevels: 6 },
    "12-17": { group: "teen", gng: 3, watcher: 4, circle: { levels: 4, seconds: 30 }, towerLevels: 8 },
    "18-59": { group: "adult", gng: 3, watcher: 4, circle: { levels: 4, seconds: 30 }, towerLevels: 8 },
    "60+":   { group: "adult", gng: 1, watcher: 1, circle: { levels: 3, seconds: 45 }, towerLevels: 8, untimed: true }
  };
  function ageYears() {
    var u = read().user || {};
    var n = Number(u.ageYears);
    return isFinite(n) && n > 0 ? n : null;
  }
  function band() { return bandOf(ageYears()); }
  // Nivel de J03/J04 según la edad exacta (coincide con los 6 niveles de sus fichas técnicas).
  function levelOf(years) {
    if (years <= 5) return 1;
    if (years <= 8) return 2;
    if (years <= 12) return 3;
    if (years <= 17) return 4;
    if (years <= 59) return 5;
    return 6;
  }
  function ageConfig() {
    var b = band();
    if (!b) return null;
    var lv = levelOf(ageYears());
    return Object.assign({ band: b, label: BAND_LABELS[b], under6: ageYears() < 6 }, AGE_CONFIG[b], { gng: lv, watcher: lv });
  }
  function setAge(years) {
    var data = read();
    data.user = data.user || {};
    var n = Number(years);
    if (isFinite(n) && n >= 3 && n <= 110) data.user.ageYears = Math.round(n); else delete data.user.ageYears;
    return write(data);
  }

  // ---- Protocolo adaptativo (versión piloto, hipótesis operativas; no diagnostica) ----
  var CONCERNS = {
    atencion: { label: "atención y concentración", games: ["J04", "J01"] },
    impulsividad: { label: "impulsividad e inhibición", games: ["J03", "J02"] },
    organizacion: { label: "organización y planificación", games: ["J05", "J07"] },
    memoria: { label: "memoria e instrucciones", games: ["J07", "J06"] },
    percepcion: { label: "percepción visual y coordinación ojo-mano", games: ["J08", "J01"] },
    social: { label: "comunicación social y reciprocidad", games: [] },
    sensorial: { label: "rutinas, intereses y aspectos sensoriales", games: [] }
  };
  var ROUTE_ORDER = ["J04", "J03", "J01", "J05", "J07", "J02", "J06", "J08"];
  var TRANSITIONS = {
    J04: [["J01", "contrastar la búsqueda visual estática"], ["J03", "distinguir omisión e inhibición"]],
    J01: [["J08", "explorar movimiento y color si la motricidad lo permite"]],
    J08: [["J01", "contrastar con búsqueda estática (revisa velocidad y precisión motora antes de interpretar)"]],
    J03: [["J02", "contrastar inhibición de respuesta con interferencia"]],
    J02: [["J03", "contrastar con inhibición motora (verifica lectura y visión del color)"]],
    J05: [["J07", "explorar la retención del orden espacial, sin asumir causalidad"]],
    J07: [["J06", "contrastar modalidad verbal y espacial"]],
    J06: [["J07", "explorar otra modalidad (considera audición, idioma y fatiga)"]]
  };
  var MAX_GAMES = 5;
  // Algoritmo FAND v7: dimensión de cuestionario → juegos que exploran un objetivo relacionado (regla R07).
  // Es una hipótesis operativa de contraste, no una relación diagnóstica demostrada.
  var DIM_GAMES = [
    ["C01", "Atención sostenida", "J04", "atención sostenida"],
    ["C01", "Atención sostenida", "J01", "atención selectiva"],
    ["C01", "Distractibilidad", "J01", "atención selectiva"],
    ["C01", "Distractibilidad", "J08", "selección visual dinámica"],
    ["C01", "Impulsividad", "J03", "inhibición"],
    ["C01", "Impulsividad", "J02", "control de interferencia"],
    ["C04", "Planificación", "J05", "planificación"],
    ["C04", "Memoria cotidiana", "J07", "memoria visoespacial"],
    ["C04", "Memoria cotidiana", "J06", "memoria verbal"],
    ["E01", "Atención en el aula", "J04", "atención sostenida"],
    ["E01", "Atención en el aula", "J01", "atención selectiva"],
    ["E01", "Autorregulación y control", "J03", "inhibición"],
    ["E01", "Autorregulación y control", "J02", "control de interferencia"],
    ["E01", "Organización y aprendizaje", "J05", "planificación"],
    ["E01", "Organización y aprendizaje", "J07", "memoria visoespacial"],
    ["E01", "Organización y aprendizaje", "J06", "memoria verbal"]
  ];
  // Dimensiones del centro educativo sin juego equivalente: cuentan como motivo para orientar a un profesional.
  var E01_PRO = ["Interacción social", "Comunicación y lenguaje", "Flexibilidad y sensorialidad"];
  // Escala 0–4 (0 nada conforme … 4 muy conforme). Media ≥ 2,5 con ≥ 3 respuestas válidas: solo prioriza qué explorar primero.
  var Q_PRIORITY = 2.5;
  var Q_MIN_VALID = 3;
  var Q_MAX = 4;
  var Q_MIN_SHARE = 0.75; // por debajo de este porcentaje de ítems válidos la dimensión no es interpretable (umbral operativo provisional)
  var QDEF = null;
  function setQDef(def) { QDEF = def; }
  function qSignals() {
    if (!QDEF) return [];
    var byDim = {};
    scoreQuestionnaires(QDEF).forEach(function (q) { q.dimensiones.forEach(function (d) { byDim[q.code + "|" + d.nombre] = d; }); });
    var out = [];
    DIM_GAMES.forEach(function (m) {
      var d = byDim[m[0] + "|" + m[1]];
      if (!d || d.valid < Q_MIN_VALID || d.mean === null) return;
      out.push({ code: m[0], dim: d.nombre, mean: d.mean, valid: d.valid, game: m[2], objective: m[3], level: d.mean >= Q_PRIORITY ? "alta" : "baja" });
    });
    return out;
  }  // Cruza cuestionarios y juegos por objetivo, sin sumarlos: informa de coincidencias y contradicciones (A8).
  function integrate() {
    var latest = evaluate().latest, rows = [];
    qSignals().forEach(function (s) {
      var res = latest[s.game], verdict = "pendiente";
      if (res) {
        var diff = 0, str = 0, n = 0;
        (RULES[s.game] || []).forEach(function (rule) {
          var v = judge(rule, res.metrics[rule[0]]);
          if (v === "difficulty") diff++; else if (v === "strength") str++;
          if (v) n++;
        });
        verdict = !n ? "sin_datos" : diff ? "dificultad" : "normal";
      }
      var rel;
      if (verdict === "pendiente") rel = s.level === "alta" ? "Prioridad: aún falta jugar " + s.game + " para contrastar." : "Sin prioridad en cuestionarios; " + s.game + " opcional.";
      else if (verdict === "sin_datos") rel = "El juego no aportó indicadores evaluables.";
      else if (s.level === "alta" && verdict === "dificultad") rel = "Coinciden: cuestionario y juego señalan diferencias en este objetivo.";
      else if (s.level === "alta") rel = "Dato contradictorio: el cuestionario muestra conformidad alta (media ≥ 2,5 de 4) y el juego queda dentro de lo orientativo (puede deberse al contexto, a compensación o a que la tarea no refleja la vida diaria).";
      else if (verdict === "dificultad") rel = "Dato contradictorio: el juego muestra diferencias y el cuestionario no (revisa fatiga, comprensión de la práctica o condiciones de la tarea).";
      else rel = "Coinciden: sin señales en cuestionario ni en juego.";
      rows.push({ code: s.code, dim: s.dim, mean: s.mean, qLevel: s.level, game: s.game, gameName: GAMES[s.game], objective: s.objective, verdict: verdict, relation: rel });
    });
    return rows;
  }
  function getQ() { var q = (read().user || {}).q; return q || { concerns: [], access: [], impact: "none", persistent: false, screening: "none", stopped: false }; }
  function setQ(patch) {
    var data = read();
    data.user = data.user || {};
    data.user.q = Object.assign(getQ(), patch);
    return write(data);
  }
  function excluded() {
    var q = getQ(), years = ageYears(), out = {};
    function ex(code, why) { if (!out[code]) out[code] = why; }
    if (years !== null && years < 6) { ex("J02", "requiere leer palabras"); ex("J05", "planificación compleja para esta edad"); ex("J06", "memoria verbal para esta edad"); }
    if (q.access.indexOf("reading") !== -1) { ex("J02", "dificultades de lectura"); ex("J06", "lectura/lenguaje"); }
    if (q.access.indexOf("hearing") !== -1) ex("J06", "audición");
    if (q.access.indexOf("color") !== -1) ex("J02", "visión del color");
    if (q.access.indexOf("motor") !== -1) ex("J08", "la motricidad puede limitar la interpretación");
    return out;
  }
  function route() {
    var q = getQ(), data = read(), ex = excluded();
    var score = {}, qWhy = {};
    qSignals().forEach(function (s) {
      if (s.level !== "alta" || ex[s.game]) return;
      score[s.game] = (score[s.game] || 0) + 12;
      if (!qWhy[s.game]) qWhy[s.game] = "tus respuestas en " + s.code + " · " + s.dim + " (media " + s.mean.toFixed(1) + " de " + Q_MAX + ") piden contrastar " + s.objective;
    });
    q.concerns.forEach(function (id, i) {
      ((CONCERNS[id] || {}).games || []).forEach(function (code, j) { score[code] = (score[code] || 0) + (10 - j * 3); });
    });
    var eligible = ROUTE_ORDER.filter(function (c) { return !ex[c]; });
    var ranked = eligible.slice().sort(function (a, b) { return (score[b] || 0) - (score[a] || 0) || ROUTE_ORDER.indexOf(a) - ROUTE_ORDER.indexOf(b); });
    var hasPriority = ranked.some(function (c) { return score[c]; });
    var starters = (hasPriority ? ranked : ["J04", "J07"].filter(function (c) { return !ex[c]; }).concat(ranked)).filter(function (c, i, a) { return a.indexOf(c) === i; }).slice(0, 2);
    var playedAll = [];
    data.sessions.forEach(function (s) { if (playedAll.indexOf(s.code) === -1) playedAll.push(s.code); });
    var latest = latestValid(data.sessions);
    var next = null, done = false;
    var pendingStarters = starters.filter(function (c) { return playedAll.indexOf(c) === -1; });
    if (q.stopped) { done = true; }
    else if (pendingStarters.length) { next = { code: pendingStarters[0], why: qWhy[pendingStarters[0]] || (hasPriority ? "responde a lo que has indicado en el cuestionario" : "juego de arranque general (sin prioridades indicadas)") }; }
    else if (playedAll.length >= MAX_GAMES) { done = true; }
    else {
      var lastCode = null;
      data.sessions.forEach(function (s) { if (s.valid) lastCode = s.code; });
      if (lastCode) {
        var flagged = (RULES[lastCode] || []).some(function (rule) { return judge(rule, latest[lastCode].metrics[rule[0]]) === "difficulty"; });
        if (flagged) {
          (TRANSITIONS[lastCode] || []).some(function (t) {
            if (!ex[t[0]] && playedAll.indexOf(t[0]) === -1) { next = { code: t[0], why: "tras " + GAMES[lastCode] + ": " + t[1] }; return true; }
            return false;
          });
        }
      }
      if (!next) {
        var open = ranked.filter(function (c) { return score[c] && playedAll.indexOf(c) === -1; })[0];
        if (open) next = { code: open, why: qWhy[open] || "aún no se ha explorado una prioridad que indicaste" };
      }
      if (!next) done = true;
    }
    var excludedList = Object.keys(ex).map(function (c) { return { code: c, why: ex[c] }; });
    return { starters: starters, next: next, done: done, played: playedAll, excluded: excludedList, maxGames: MAX_GAMES, hasPriority: hasPriority };
  }
  function status() {
    var q = getQ(), data = read(), r = route(), ev = evaluate();
    var validCount = Object.keys(ev.latest).length;
    var areas = q.concerns.map(function (id) { return (CONCERNS[id] || {}).label; }).filter(Boolean);
    var reasons = [];
    if (q.concerns.indexOf("social") !== -1 || q.concerns.indexOf("sensorial") !== -1) reasons.push("preocupaciones sobre comunicación, rutinas o aspectos sensoriales");
    if (q.persistent) reasons.push("dificultades persistentes");
    if (q.impact === "significant") reasons.push("impacto significativo en la vida diaria");
    if (q.screening === "positive") reasons.push("cribado reconocido positivo según su manual");
    var qs2 = QDEF ? scoreQuestionnaires(QDEF) : [];
    var freq = [];
    qs2.forEach(function (c) { if (/^C0[236]$/.test(c.code) || c.code === "E01") c.dimensiones.forEach(function (d) { if (c.code === "E01" && E01_PRO.indexOf(d.nombre) === -1) return; if (d.valid >= Q_MIN_VALID && d.mean >= Q_PRIORITY) freq.push(c.code + " " + d.nombre.toLowerCase()); }); });
    if (freq.length) reasons.push("respuestas de conformidad alta en los cuestionarios sobre " + freq.join(", "));
    var diffs = [];
    ev.domains.forEach(function (d) { if (d.flagged) diffs.push(d.label.toLowerCase()); });
    var cog = diffs.length ? "con diferencias descriptivas en " + diffs.join(" y ") + " (provisionales, sin normas)" : validCount ? "sin patrones destacados" : "sin pruebas interpretables";
    if (q.stopped) return { id: "interrumpida", title: "Evaluación interrumpida", text: "Proceso incompleto a petición de la persona o por fatiga. No se emiten conclusiones negativas." };
    if (!data.sessions.length && !q.concerns.length && q.impact === "none" && !q.persistent) return { id: "inicio", title: "Aún sin datos", text: "Rellena el cuestionario inicial y juega las actividades recomendadas." };
    if (reasons.length) {
      // Categorías de salida del informe (protocolo integral §11); ninguna excluye condiciones.
      var attnFlag = ["atencion", "impulsividad", "organizacion", "memoria", "percepcion"].some(function (k) { return q.concerns.indexOf(k) !== -1; }) || qSignals().some(function (s) { return s.level === "alta"; }) || diffs.length > 0;
      var socFlag = q.concerns.indexOf("social") !== -1 || q.concerns.indexOf("sensorial") !== -1 || freq.length > 0;
      var cat = attnFlag && socFlag ? "c" : attnFlag ? "a" : socFlag ? "b" : "d";
      var catText = { a: "explorar dificultades de atención y autorregulación (posible TDAH)", b: "explorar comunicación social, patrones y desarrollo (posible TEA)", c: "explorar ambas vías (atención/autorregulación y comunicación social)", d: "una evaluación más amplia de las dificultades comunicadas" }[cat];
      return { id: "recomendada", cat: cat, title: "Orientación profesional recomendada", text: "Se recomienda valoración profesional para " + catText + ", por " + reasons.join(", ") + ", con resultados cognitivos " + cog + ". Áreas indicadas: " + (areas.join(", ") || "no indicadas") + ". No equivale a diagnóstico ni excluye otras condiciones." };
    }
    if (data.sessions.length && !validCount) return { id: "insuficiente", title: "Información insuficiente", text: "No es posible interpretar adecuadamente las pruebas realizadas (sesiones no válidas o incompletas). Se pueden ofrecer adaptaciones, o evaluación profesional si la preocupación continúa." };
    if (r.done && validCount >= 2) return { id: "sin_senales", title: "Exploración completada sin señales suficientes para recomendar por esta vía", text: "No se han identificado motivos adicionales en esta exploración limitada. No excluye neurodivergencias; solicita valoración si existen preocupaciones persistentes." };
    return { id: "en_curso", title: "Exploración en curso", text: "Continúa con la siguiente actividad recomendada o detén la exploración cuando lo necesites." };
  }

  // ---- Cuestionarios C01–C15 (banco de investigación; sin umbrales clínicos) ----
  function getAnswers(code) { var c = read().cuest || {}; return c[code] || {}; }
  function setAnswer(code, item, value) {
    var data = read();
    data.cuest = data.cuest || {};
    data.cuest[code] = data.cuest[code] || {};
    if (value === "" || value === null || value === undefined) delete data.cuest[code][item]; else data.cuest[code][item] = value;
    return write(data);
  }
  // Por dimensión: suma, nº de ítems válidos, faltantes y media (suma/válidos). «na» = dato ausente, no cero.
  function scoreQuestionnaires(def) {
    var out = [];
    Object.keys(def || {}).forEach(function (code) {
      var ans = getAnswers(code), answeredAny = false;
      var dims = def[code].dimensiones.map(function (d) {
        var sum = 0, valid = 0, na = 0, dist = [0, 0, 0, 0, 0];
        var scored = d.scored.filter(function (it) { return !omitted(it); });
        scored.forEach(function (it) {
          var v = ans[it];
          if (v === "na") { na += 1; answeredAny = true; }
          else if (v !== undefined && isFinite(Number(v))) { sum += Number(v); valid += 1; answeredAny = true; if (dist[Number(v)] !== undefined) dist[Number(v)] += 1; }
        });
        var extraAnswered = d.extra.filter(function (it) { return ans[it] !== undefined && ans[it] !== "na"; }).length;
        var reliable = scored.length > 0 && valid >= Math.ceil(scored.length * Q_MIN_SHARE);
        return { nombre: d.nombre, reliable: reliable, dist: dist, sum: sum, valid: valid, na: na, total: scored.length, mean: reliable ? sum / valid : null, extraAnswered: extraAnswered, extraTotal: d.extra.length };
      });
      if (answeredAny) out.push({ code: code, nombre: def[code].nombre, dimensiones: dims });
    });
    return out;
  }
  function answeredModules() {
    var c = read().cuest || {};
    return Object.keys(c).filter(function (k) { return Object.keys(c[k]).length; });
  }

  // ---- Recorrido ordenado (protocolo v7): I01 → C01/C04 (atención y ejecutivas) y C02/C03 (social y sensorial) según motivo → C05 → juegos → Mi ficha ----
  var Q_ORDER = ["I01", "C01", "C04", "C02", "C03", "C05"];
  // Quién responde: self (la propia persona), familia (familiar o persona cercana), docente (centro educativo).
  var INFORMANTS = { self: "La propia persona", familia: "Familiar o persona cercana", docente: "Docente o centro educativo" };
  // Etapa vital según la edad: preescolar (<6), escolar (6–11), adolescencia (12–17), adultez (18+).
  var STAGES = null;
  function stageOf() {
    var y = ageYears();
    return y === null ? null : y < 6 ? "preescolar" : y < 12 ? "escolar" : y < 18 ? "adolescencia" : "adultez";
  }
  function setStages(d) { STAGES = d; }
  function stageData() { var s = stageOf(); return (STAGES && s && STAGES[s]) || { omitir: [], texto: {} }; }
  // Las afirmaciones omitidas por etapa solo se aplican si responde otra persona (la versión base es adolescente/adulto).
  function omitted(id) { return getInformant() !== "self" && stageData().omitir.indexOf(id) !== -1; }
  function getInformant() { var v = (read().user || {}).informant; return INFORMANTS[v] ? v : "self"; }
  function setInformant(v) { if (!INFORMANTS[v]) return false; return setUser({ informant: v }); }
  // Lee años o una fecha de nacimiento (dd/mm/aaaa o aaaa-mm-dd) escrita en el registro I01 y la guarda como edad de la persona.
  function ageFromText(text) {
    var s = String(text || "").trim(), m;
    if ((m = s.match(/^(\d{1,2})[\/\-.](\d{1,2})[\/\-.](\d{4})$/))) return yearsSince(+m[3], +m[2], +m[1]);
    if ((m = s.match(/^(\d{4})[\/\-.](\d{1,2})[\/\-.](\d{1,2})$/))) return yearsSince(+m[1], +m[2], +m[3]);
    if ((m = s.match(/^(\d{1,3})(?:\s*(?:años?|a))?$/i))) return +m[1];
    return null;
  }
  function yearsSince(y, mo, d) {
    var now = new Date(), age = now.getFullYear() - y;
    if (now.getMonth() + 1 < mo || (now.getMonth() + 1 === mo && now.getDate() < d)) age -= 1;
    return age;
  }
  function syncAgeFromI01(text) {
    var n = ageFromText(text);
    if (n !== null && n >= 3 && n <= 110) { setAge(n); return n; }
    return null;
  }
  function qList() {
    if (getInformant() === "docente") return ["I01", "E01"];
    var c = getQ().concerns;
    var has = function () { return Array.prototype.some.call(arguments, function (k) { return c.indexOf(k) !== -1; }); };
    var attn = has("atencion", "impulsividad", "organizacion", "memoria", "percepcion"), soc = has("social", "sensorial");
    var mixed = !attn && !soc; // sin motivo indicado: conservar ambas rutas (R06)
    return Q_ORDER.filter(function (code) {
      if (code === "C01" || code === "C04") return attn || mixed;
      if (code === "C02" || code === "C03") return soc || mixed;
      return true;
    });
  }  function qDone(code) { return !!((read().cuestDone || {})[code]); }
  function markDone(code) {
    var data = read();
    data.cuestDone = data.cuestDone || {};
    data.cuestDone[code] = true;
    data.cuestInf = data.cuestInf || {};
    data.cuestInf[code] = getInformant();
    return write(data);
  }
  // Los juegos se asignan al terminar los cuestionarios, salvo que la persona decida saltárselos.
  function gate() {
    var q = getQ(), pend = qList().filter(function (c) { return !qDone(c); });
    return { locked: !!pend.length && !q.skipQ && !q.stopped, pending: pend, skipped: !!q.skipQ };
  }
  function flow() {
    if (getQ().stopped) return { type: "fin" };
    var pending = qList().filter(function (c) { return !qDone(c); })[0];
    if (pending && !getQ().skipQ) return { type: "cuestionario", code: pending, url: "FAND_Cuestionarios.html?q=" + pending };
    var r = route();
    if (r.next) return { type: "juego", code: r.next.code, why: r.next.why, url: "FAND_Juegos_Interactivos.html?jugar=" + r.next.code };
    return { type: "fin", url: "FAND_Ficha_Usuario.html" };
  }
  // Quién debería responder según la edad (propuesta de diseño v2/v3, no norma): menores de 6 solo cuidador.
  function recommendedInformant() {
    var y = ageYears();
    if (y === null) return null;
    if (y < 6) return { allowed: ["familia"], text: "Hasta los 5 años responde un familiar o cuidador; no se usa el autoinforme." };
    if (y < 12) return { allowed: ["familia", "docente"], text: "De 6 a 11 años responde un familiar y, si es posible, el docente (con consentimiento)." };
    if (y < 17) return { allowed: ["self", "familia", "docente"], text: "De 12 a 16 años puede responder la propia persona; un observador (familia o docente) complementa si es posible, respetando su privacidad." };
    return { allowed: ["self", "familia"], text: "A partir de 17 años responde la propia persona; un observador cercano es opcional." };
  }
  // Recorrido en 4 pasos: Datos → Cuestionarios → Juegos → Informe. Siempre hay un único paso actual.
  function steps() {
    var q = getQ(), list = qList().filter(function (c) { return c !== "I01"; }), pend = list.filter(function (c) { return !qDone(c); });
    var hasData = ageYears() !== null && qDone("I01");
    var r = route(), played = r.played.length, g = gate();
    var qState = !hasData ? "pendiente" : q.skipQ && pend.length ? "omitido" : pend.length ? "pendiente" : "hecho";
    var gState = g.locked || !hasData && !q.skipQ ? "pendiente" : (r.done || q.stopped) ? "hecho" : "pendiente";
    var out = [
      { id: "datos", n: 1, title: "Datos iniciales", detail: hasData ? "Edad y registro I01 completados" : "Edad, quién responde y registro I01", state: hasData ? "hecho" : "pendiente", url: "FAND_Test_Orientativo.html#q-form" },
      { id: "cuestionarios", n: 2, title: "Cuestionarios", detail: !list.length ? "Se asignan al guardar los datos" : qState === "hecho" ? list.length + " de " + list.length + " completados" : (list.length - pend.length) + " de " + list.length + " completados", state: qState, url: "FAND_Cuestionarios.html" + (pend.length ? "?q=" + pend[0] : "") },
      { id: "juegos", n: 3, title: "Juegos asignados", detail: g.locked || !hasData && !q.skipQ ? "Se asignan al terminar los cuestionarios" : played + " de " + MAX_GAMES + " como máximo" + (r.next ? " · siguiente: " + GAMES[r.next.code] : ""), state: gState, url: r.next ? "FAND_Juegos_Interactivos.html?jugar=" + r.next.code : "FAND_Test_Orientativo.html" },
      { id: "informe", n: 4, title: "Informe en Mi ficha", detail: "Resumen descriptivo para llevar a un profesional", state: "pendiente", url: "FAND_Ficha_Usuario.html" }
    ];
    var cur = out.filter(function (s) { return s.state === "pendiente"; })[0];
    if (!cur) cur = out[3];
    out.forEach(function (s) { s.current = s === cur; });
    return out;
  }
  function mountGuide(host) {
    if (!host) return;
    var list = steps(), cur = list.filter(function (s) { return s.current; })[0];
    host.textContent = "";
    host.setAttribute("role", "region"); host.setAttribute("aria-label", "Tu recorrido en FAND");
    host.style.cssText = "border:2px solid #0f766e;background:#f0fdfa;border-radius:14px;padding:14px 18px;margin:16px 0";
    var title = document.createElement("strong"); title.textContent = "Tu recorrido: cuatro pasos sencillos"; host.appendChild(title);
    var ol = document.createElement("ol"); ol.style.cssText = "list-style:none;margin:10px 0;padding:0;display:grid;gap:8px;grid-template-columns:repeat(auto-fit,minmax(190px,1fr))";
    list.forEach(function (s) {
      var li = document.createElement("li"); if (s.current) li.setAttribute("aria-current", "step");
      li.style.cssText = "border:2px solid " + (s.current ? "#0f766e" : "#cbd5e1") + ";background:" + (s.current ? "#fff" : "transparent") + ";border-radius:10px;padding:8px 10px";
      var mark = s.state === "hecho" ? "✔ " : s.state === "omitido" ? "↷ " : s.current ? "▶ " : "";
      var h = document.createElement("div"); h.style.fontWeight = "700"; h.textContent = mark + s.n + ". " + s.title;
      var d = document.createElement("div"); d.style.cssText = "font-size:.9rem;color:#475569"; d.textContent = s.state === "omitido" ? "Omitido por decisión de la persona" : s.detail;
      li.append(h, d); ol.appendChild(li);
    });
    host.appendChild(ol);
    var a = document.createElement("a"); a.href = cur.url;
    a.style.cssText = "display:inline-block;min-height:44px;box-sizing:border-box;background:#0f766e;color:#fff;padding:10px 18px;border-radius:10px;text-decoration:none;font-weight:700";
    a.textContent = cur.n === 4 ? "Ver Mi ficha" : "Continuar: " + cur.title.toLowerCase();
    host.appendChild(a);
    var ri = recommendedInformant();
    if (ri) { var p = document.createElement("p"); p.style.cssText = "margin:8px 0 0;font-size:.9rem;color:#475569"; p.textContent = ri.text; host.appendChild(p); }
  }
  function showNextBanner() {
    if (!document.body || document.getElementById("fand-next")) return;
    var f = flow(), box = document.createElement("div");
    box.id = "fand-next"; box.setAttribute("role", "status");
    box.style.cssText = "position:fixed;left:50%;bottom:16px;transform:translateX(-50%);z-index:9999;width:min(92vw,560px);background:#fff;border:2px solid #0f766e;border-radius:14px;padding:12px 16px;box-shadow:0 6px 24px rgba(0,0,0,.25);font:16px/1.5 system-ui,sans-serif;color:#1f2937";
    var msg = document.createElement("p"); msg.style.margin = "0 0 8px";
    var a = document.createElement("a");
    a.style.cssText = "display:inline-block;min-height:44px;box-sizing:border-box;background:#0f766e;color:#fff;padding:10px 18px;border-radius:10px;text-decoration:none;font-weight:700";
    if (f.type === "juego") { msg.textContent = "Prueba guardada. Siguiente: " + GAMES[f.code] + " (" + f.why + ")."; a.textContent = "Ir a la siguiente prueba"; a.href = f.url; }
    else { msg.textContent = "Prueba guardada. Has completado el recorrido previsto: revisa tu ficha."; a.textContent = "Ver Mi ficha"; a.href = "FAND_Ficha_Usuario.html"; }
    var close = document.createElement("button"); close.type = "button"; close.textContent = "Cerrar";
    close.style.cssText = "margin-left:10px;min-height:44px;padding:8px 14px;border:1px solid #94a3b8;border-radius:10px;background:#fff;cursor:pointer";
    close.addEventListener("click", function () { box.remove(); });
    box.append(msg, a, close);
    document.body.appendChild(box);
  }

  window.FANDProfile = {
    flow: flow, gate: gate, steps: steps, mountGuide: mountGuide, recommendedInformant: recommendedInformant, informants: INFORMANTS, stage: stageOf, setStages: setStages, stageData: stageData, omitted: omitted, getInformant: getInformant, setInformant: setInformant, syncAgeFromI01: syncAgeFromI01, markQuestionnaireDone: markDone, questionnaireDone: qDone, questionnaireOrder: qList,
    getAnswers: getAnswers, setAnswer: setAnswer, scoreQuestionnaires: scoreQuestionnaires, answeredModules: answeredModules,
    setQuestionnaireDef: setQDef, integrate: integrate, qSignals: qSignals,
    save: save, evaluate: evaluate, setUser: setUser, clear: clear, games: GAMES, domains: DOMAINS, rules: RULES,
    ageYears: ageYears, band: band, ageConfig: ageConfig, setAge: setAge, bandLabels: BAND_LABELS,
    concerns: CONCERNS, getQuestionnaire: getQ, setQuestionnaire: setQ, route: route, status: status
  };
  window.saveProfile = function (code, session) {
    try {
      var ok = save(code, session);
      if (ok && /Juegos_Interactivos/.test(location.pathname)) { var old = document.getElementById("fand-next"); if (old) old.remove(); setTimeout(showNextBanner, 1200); }
      return ok;
    } catch (e) { return false; }
  };
})();
