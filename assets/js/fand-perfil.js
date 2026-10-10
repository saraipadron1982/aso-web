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
  function ageConfig() { var b = band(); return b ? Object.assign({ band: b, label: BAND_LABELS[b], under6: ageYears() < 6 }, AGE_CONFIG[b]) : null; }
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
  // Algoritmo FAND v5: bloque de cuestionario → juegos que exploran un objetivo relacionado.
  // Es una hipótesis operativa de contraste, no una relación diagnóstica demostrada.
  var DIM_GAMES = [
    ["A01", "J04", "atención sostenida"],
    ["A01", "J01", "atención selectiva"],
    ["A01", "J08", "selección visual dinámica"],
    ["A02", "J05", "planificación"],
    ["A02", "J07", "memoria visoespacial"],
    ["A02", "J06", "memoria verbal"],
    ["A03", "J03", "inhibición"],
    ["A03", "J02", "control de interferencia"]
  ];
  var Q_PRIORITY = 2; // media ≥ 2 («a menudo» o más, escala 0–3) con ≥ 3 respuestas válidas: solo prioriza qué explorar primero
  var Q_MIN_VALID = 3;
  var QDEF = null;
  function setQDef(def) { QDEF = def; }
  function qSignals() {
    if (!QDEF) return [];
    var byCode = {};
    scoreQuestionnaires(QDEF).forEach(function (q) { byCode[q.code] = q.dimensiones[0]; });
    var out = [];
    DIM_GAMES.forEach(function (m) {
      var d = byCode[m[0]];
      if (!d || d.valid < Q_MIN_VALID || d.mean === null) return;
      out.push({ code: m[0], dim: d.nombre, mean: d.mean, valid: d.valid, game: m[1], objective: m[2], level: d.mean >= Q_PRIORITY ? "alta" : "baja" });
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
      else if (s.level === "alta") rel = "Dato contradictorio: el cuestionario muestra frecuencia alta («a menudo» o más) y el juego queda dentro de lo orientativo (puede deberse al contexto, a compensación o a que la tarea no refleja la vida diaria).";
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
      if (!qWhy[s.game]) qWhy[s.game] = "tus respuestas en " + s.code + " · " + s.dim + " (media " + s.mean.toFixed(1) + " de 4) piden contrastar " + s.objective;
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
    qs2.forEach(function (c) { if (/^[SR]0/.test(c.code)) c.dimensiones.forEach(function (d) { if (d.valid >= Q_MIN_VALID && d.mean >= Q_PRIORITY) freq.push(c.code + " " + d.nombre.toLowerCase()); }); });
    if (freq.length) reasons.push("respuestas «a menudo» o más en los cuestionarios sobre " + freq.join(", "));
    var diffs = [];
    ev.domains.forEach(function (d) { if (d.flagged) diffs.push(d.label.toLowerCase()); });
    var cog = diffs.length ? "con diferencias descriptivas en " + diffs.join(" y ") + " (provisionales, sin normas)" : validCount ? "sin patrones destacados" : "sin pruebas interpretables";
    if (q.stopped) return { id: "interrumpida", title: "Evaluación interrumpida", text: "Proceso incompleto a petición de la persona o por fatiga. No se emiten conclusiones negativas." };
    if (!data.sessions.length && !q.concerns.length && q.impact === "none" && !q.persistent) return { id: "inicio", title: "Aún sin datos", text: "Rellena el cuestionario inicial y juega las actividades recomendadas." };
    if (reasons.length) return { id: "recomendada", title: "Orientación profesional recomendada", text: "Se recomienda explorar " + (areas.join(", ") || "las áreas indicadas") + " por " + reasons.join(", ") + ", con resultados cognitivos " + cog + ". No equivale a diagnóstico." };
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
        var sum = 0, valid = 0, na = 0, dist = [0, 0, 0, 0];
        d.scored.forEach(function (it) {
          var v = ans[it];
          if (v === "na") { na += 1; answeredAny = true; }
          else if (v !== undefined && isFinite(Number(v))) { sum += Number(v); valid += 1; answeredAny = true; if (dist[Number(v)] !== undefined) dist[Number(v)] += 1; }
        });
        var extraAnswered = d.extra.filter(function (it) { return ans[it] !== undefined && ans[it] !== "na"; }).length;
        var reliable = valid >= Math.ceil(d.scored.length * 0.6);
        return { nombre: d.nombre, reliable: reliable, dist: dist, sum: sum, valid: valid, na: na, total: d.scored.length, mean: reliable ? sum / valid : null, extraAnswered: extraAnswered, extraTotal: d.extra.length };
      });
      if (answeredAny) out.push({ code: code, nombre: def[code].nombre, dimensiones: dims });
    });
    return out;
  }
  function answeredModules() {
    var c = read().cuest || {};
    return Object.keys(c).filter(function (k) { return Object.keys(c[k]).length; });
  }

  // ---- Recorrido ordenado (algoritmo v5): I01 → F01 → D01 → módulos A/S/R según motivo → juegos de la ruta → Mi ficha ----
  var Q_ORDER = ["I01", "F01", "D01", "A01", "A02", "A03", "S01", "S02", "R01", "R02"];
  function qList() {
    var c = getQ().concerns;
    var has = function () { return Array.prototype.some.call(arguments, function (k) { return c.indexOf(k) !== -1; }); };
    var attn = has("atencion", "impulsividad", "organizacion", "memoria", "percepcion"), soc = has("social", "sensorial");
    var mixed = !attn && !soc; // sin motivo indicado: explorar ambos grupos de dominios
    return Q_ORDER.filter(function (code) {
      if (/^A0/.test(code)) return attn || mixed;
      if (/^[SR]0/.test(code)) return soc || mixed;
      return true;
    });
  }
  function qDone(code) { return !!((read().cuestDone || {})[code]); }
  function markDone(code) {
    var data = read();
    data.cuestDone = data.cuestDone || {};
    data.cuestDone[code] = true;
    return write(data);
  }
  function flow() {
    if (getQ().stopped) return { type: "fin" };
    var pending = qList().filter(function (c) { return !qDone(c); })[0];
    if (pending) return { type: "cuestionario", code: pending, url: "FAND_Cuestionarios.html?q=" + pending };
    var r = route();
    if (r.next) return { type: "juego", code: r.next.code, why: r.next.why, url: "FAND_Juegos_Interactivos.html?jugar=" + r.next.code };
    return { type: "fin", url: "FAND_Ficha_Usuario.html" };
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
    flow: flow, markQuestionnaireDone: markDone, questionnaireDone: qDone, questionnaireOrder: qList,
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
