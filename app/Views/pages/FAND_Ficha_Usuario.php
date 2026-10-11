<?php
$games = [
    'J01' => ['Encuentra al Robot', 'Atención selectiva y búsqueda visual'],
    'J02' => ['Que no te engañen', 'Control de interferencias'],
    'J03' => ['Pulsa o Espera', 'Inhibición de respuesta'],
    'J04' => ['El Vigilante', 'Atención sostenida'],
    'J05' => ['La Torre', 'Planificación'],
    'J06' => ['La lista', 'Memoria verbal y aprendizaje'],
    'J07' => ['Recuerda la secuencia', 'Memoria de trabajo visoespacial'],
    'J08' => ['El círculo mayor', 'Discriminación visual y atención'],
];
?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mi ficha de orientación · FAND</title>
  <style>
    :root { --teal: #0f766e; --ink: #1f2937; --soft: #f0fdfa; --line: #cbd5e1; --warn: #b45309; }
    body { margin: 0; font-family: system-ui, "Segoe UI", sans-serif; color: var(--ink); line-height: 1.6; }
    header, main, footer { width: min(100% - 32px, 1000px); margin: 0 auto; }
    header { padding: 22px 0 8px; }
    a { color: var(--teal); }
    h1 { margin: 8px 0; } h2 { color: var(--teal); margin-top: 28px; }
    .notice { background: #fffbeb; border-left: 5px solid #d97706; padding: 12px 16px; border-radius: 8px; margin: 14px 0; }
    .card { border: 1px solid var(--line); border-radius: 12px; padding: 14px 18px; margin: 14px 0; }
    .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 12px; }
    label { display: block; font-weight: 600; margin-top: 8px; }
    input, select, textarea { width: 100%; box-sizing: border-box; padding: 8px; border: 1px solid var(--line); border-radius: 8px; font: inherit; }
    .check { display: flex; gap: 8px; align-items: flex-start; font-weight: 400; }
    .check input { width: auto; margin-top: 6px; }
    button, .btn { background: var(--teal); color: #fff; border: 0; border-radius: 8px; padding: 10px 16px; font: inherit; cursor: pointer; text-decoration: none; display: inline-block; }
    button.secondary { background: #fff; color: var(--teal); border: 1px solid var(--teal); }
    .actions { display: flex; flex-wrap: wrap; gap: 10px; margin: 16px 0; }
    table { width: 100%; border-collapse: collapse; font-size: .93rem; }
    th, td { border: 1px solid var(--line); padding: 6px 8px; text-align: left; vertical-align: top; }
    th { background: var(--soft); }
    .bar { height: 14px; background: #e2e8f0; border-radius: 7px; overflow: hidden; }
    .bar span { display: block; height: 100%; background: var(--teal); }
    .index { font-size: 1.8rem; font-weight: 700; color: var(--teal); }
    .strength { color: #166534; font-weight: 600; } .difficulty { color: var(--warn); font-weight: 600; }
    .meta { font-size: .9rem; color: #475569; }
    footer { padding: 24px 0 40px; font-size: .9rem; }
    .tabs { display: flex; gap: 8px; margin: 14px 0 0; flex-wrap: wrap; }
    .tabs a { padding: 10px 16px; border: 1px solid var(--teal); border-radius: 8px; text-decoration: none; font-weight: 600; }
    .tabs a[aria-current="page"] { background: var(--teal); color: #fff; }
    body[data-vista="persona"] [data-vista="juegos"], body[data-vista="juegos"] [data-vista="persona"] { display: none; }
    @media print { body[data-vista] [data-vista] { display: block !important; } .actions, .noprint, header a { display: none; } .card { break-inside: avoid; } }
  </style>
</head>
<body>
  <header>
    <a href="index.html">← Inicio</a> · <a href="FAND_Juegos_Interactivos.html">Juegos</a> · <a href="FAND_Fichas_Tecnicas.html">Fichas técnicas</a>
    <h1>Mi ficha de orientación</h1>
    <p class="meta">Resumen de los resultados de los juegos FAND para compartir con un profesional.</p>
  </header>
  <main>
    <div class="notice" role="note">
      <strong>Esto NO es un diagnóstico.</strong> Es una guía orientativa, basada en juegos sin baremos validados, para preparar una futura consulta con un profesional cualificado.
      Solo un profesional puede diagnosticar una neurodivergencia, con entrevistas, historia clínica y pruebas estandarizadas.
      Tus datos se guardan únicamente en este navegador; no se envían a ningún servidor.
    </div>

    <div id="guide" class="noprint"></div>
    <nav class="tabs noprint" aria-label="Apartados de la ficha">
      <a href="FAND_Ficha_Usuario.html?vista=persona" id="tab-persona">Ficha de la persona</a>
      <a href="FAND_Ficha_Usuario.html?vista=juegos" id="tab-juegos">Resultados de los juegos</a>
    </nav>
    <p class="meta noprint">La ficha de la persona recoge sus datos y cuestionarios; los resultados de los juegos se consultan aparte. El PDF incluye ambos apartados.</p>

    <section class="card noprint" data-vista="persona" aria-labelledby="datos-title">
      <h2 id="datos-title" style="margin-top:0">Datos de la persona (opcionales)</h2>
      <div class="grid">
        <div><label for="u-name">Nombre o alias</label><input id="u-name" autocomplete="off"></div>
        <div><label for="u-age">Edad (años) · los juegos se configuran con ella</label>
          <input id="u-age" type="number" min="3" max="110" inputmode="numeric" placeholder="Por ejemplo, 10"><small id="u-age-note" aria-live="polite"></small></div>
      </div>
      <label for="u-notes">Notas (motivo de consulta, observaciones)</label>
      <textarea id="u-notes" rows="3"></textarea>
      <fieldset style="margin-top:12px;border:1px solid var(--line);border-radius:8px">
        <legend>Factores que pueden alterar los resultados</legend>
        <label class="check"><input type="checkbox" name="conf" value="Poco sueño o cansancio"> Poco sueño o cansancio</label>
        <label class="check"><input type="checkbox" name="conf" value="Ansiedad o estrés en el momento"> Ansiedad o estrés en el momento</label>
        <label class="check"><input type="checkbox" name="conf" value="Dificultades de visión o audición"> Dificultades de visión o audición</label>
        <label class="check"><input type="checkbox" name="conf" value="Dificultades motoras o de manejo del dispositivo"> Dificultades motoras o de manejo del dispositivo</label>
        <label class="check"><input type="checkbox" name="conf" value="Medicación que pueda influir"> Medicación que pueda influir</label>
        <label class="check"><input type="checkbox" name="conf" value="No se entendieron bien las instrucciones"> No se entendieron bien las instrucciones</label>
        <label class="check"><input type="checkbox" name="conf" value="Interrupciones o ruido durante el juego"> Interrupciones o ruido durante el juego</label>
      </fieldset>
      <div class="actions"><button type="button" id="save-user">Guardar datos</button></div>
    </section>

    <div id="report" aria-live="polite"></div>

    <div class="actions">
      <button type="button" id="print">Imprimir / guardar como PDF</button>
      <button type="button" class="secondary" id="download">Descargar ficha (PDF)</button>
      <button type="button" class="secondary" id="clear">Borrar mis datos</button>
    </div>

    <section class="card" data-vista="juegos">
      <h2 style="margin-top:0">Juegos incluidos y sus fichas técnicas</h2>
      <ul>
        <?php foreach ($games as $code => [$name, $area]): ?>
          <li><a href="FAND_Fichas_Tecnicas.html?juego=<?= $code ?>"><?= $code ?> · <?= htmlspecialchars($name) ?></a> — <?= htmlspecialchars($area) ?></li>
        <?php endforeach; ?>
      </ul>
    </section>
  </main>
  <footer>
    <p>FAND · Alianza para la Neurodivergencia. Herramienta de orientación: no diagnostica ni sustituye la evaluación profesional.</p>
  </footer>

  <script src="assets/js/jspdf.umd.min.js"></script>
  <script src="assets/js/fand-perfil.js"></script>
  <script>
    (function () {
      var vista = /vista=juegos/.test(location.search) ? "juegos" : "persona";
      document.body.dataset.vista = vista;
      document.getElementById("tab-" + vista).setAttribute("aria-current", "page");
      var report = document.getElementById("report");
      var QDEF = <?= json_encode(CuestionarioCatalog::definition()) ?>;
      FANDProfile.setQuestionnaireDef(QDEF);
      FANDProfile.setStages(<?= json_encode(CuestionarioCatalog::etapas()) ?>);
      function el(tag, cls, text) {
        var n = document.createElement(tag);
        if (cls) n.className = cls;
        if (text !== undefined) n.textContent = text;
        return n;
      }
      function fmt(v) { return typeof v === "number" ? (Math.abs(v) < 10 && v % 1 ? v.toFixed(2) : String(Math.round(v * 10) / 10)) : "—"; }
      function ageNote() {
        var c = FANDProfile.ageConfig();
        document.getElementById("u-age-note").textContent = c ? "Los juegos se configurarán para la franja " + c.label + " (franja de planificación del piloto, no una norma)." : "Sin edad indicada: los juegos usan su configuración general.";
      }
      function checkedFactors() {
        return Array.prototype.map.call(document.querySelectorAll("input[name=conf]:checked"), function (i) { return i.value; });
      }
      function loadUser() {
        var u = FANDProfile.evaluate().user || {};
        document.getElementById("u-name").value = u.name || "";
        document.getElementById("u-age").value = u.ageYears || "";
        ageNote();
        document.getElementById("u-notes").value = u.notes || "";
        Array.prototype.forEach.call(document.querySelectorAll("input[name=conf]"), function (i) {
          i.checked = (u.factors || []).indexOf(i.value) !== -1;
        });
      }
      var curView = "persona";
      function section(title) { var s = el("section", "card"); s.dataset.vista = curView; s.append(el("h2", "", title)); s.firstChild.style.marginTop = "0"; return s; }

      function render() {
FANDProfile.mountGuide(document.getElementById("guide"));
        var p = FANDProfile.evaluate();
        report.textContent = "";
        var played = Object.keys(p.latest);

        var cc = FANDProfile.conclusion();
        var csec = el("section", "card"); csec.dataset.vista = "todas"; csec.id = "conclusion";
        csec.style.cssText = "border:3px solid #0f766e";
        csec.append(el("h2", "", "Conclusión de las pruebas"));
        csec.firstChild.style.marginTop = "0";
        csec.append(el("p", "", cc.headline));
        csec.lastChild.style.cssText = "font-size:1.15em;font-weight:700";
        var warn = el("p", "difficulty", "Esto NO es un diagnóstico. Solo un profesional puede evaluar y diagnosticar. Esta herramienta es una orientación de investigación, no validada.");
        warn.style.fontWeight = "700"; csec.append(warn);
        if (cc.available) {
          csec.append(el("p", "", "Nivel de orientación: " + cc.level.toUpperCase() + "."));
          csec.append(el("p", "", "Puntuación de los cuestionarios: " + (cc.qScore === null ? "sin datos suficientes" : cc.qScore + "/100 (" + cc.qFlagged + " de " + cc.qTotal + " áreas con respuestas de conformidad alta)") + "."));
          csec.append(el("p", "", "Puntuación de los juegos: " + (cc.gScore === null ? "sin datos suficientes (faltan juegos)" : cc.gScore + "/100 (" + cc.gFlagged + " de " + cc.gTotal + " indicadores fuera del rango orientativo)") + "."));
          csec.append(el("p", "", "Tipo de neurodivergencia sobre el que se sospecha: " + (cc.suspect || "ninguno concreto") + ". Es una sospecha orientativa, no un resultado." + (cc.own ? " La persona que respondió indicó al inicio que sospechaba: " + cc.own + "." : "")));
          if (cc.review.length) {
            csec.append(el("h3", "", "Qué conviene valorar con un profesional"));
            var ul = el("ul"); cc.review.forEach(function (r) { ul.append(el("li", "", r)); }); csec.append(ul);
          }
          csec.append(el("p", "meta", "Cómo leer las puntuaciones: 0–24 baja, 25–49 media, 50 o más alta (criterios provisionales sin validar). Una puntuación baja no descarta nada y una alta no confirma nada."));
        }
csec.append(el("h3", "", "Resultados de los juegos"));
        if (!cc.games.length) csec.append(el("p", "", "Todavía no hay juegos completados con resultados válidos."));
        else {
          var gt = el("table"), gh = el("tr");
          ["Juego", "Fecha", "Indicador", "Resultado", "Lectura"].forEach(function (h) { gh.append(el("th", "", h)); });
          gt.append(gh);
          var vtxt = { difficulty: "fuera del rango orientativo", typical: "dentro del rango", strength: "punto fuerte" };
          cc.games.forEach(function (g) {
            if (!g.items.length) { var r0 = el("tr"); r0.append(el("td", "", g.code + " " + g.name), el("td", "", g.date), el("td", "", "-"), el("td", "", "-"), el("td", "", g.state)); gt.append(r0); return; }
            g.items.forEach(function (i, k) {
              var r = el("tr");
              r.append(el("td", "", k ? "" : g.code + " " + g.name), el("td", "", k ? "" : g.date), el("td", "", i.label), el("td", "", String(Math.round(i.value * 100) / 100)), el("td", "", vtxt[i.verdict]));
              gt.append(r);
            });
          });
          csec.append(gt);
          csec.append(el("p", "meta", "Se muestra el último intento válido de cada juego. Los rangos son orientativos y sin baremos validados."));
        }
        report.append(csec);
        var head = section("Resumen del perfil");
        var u = p.user || {};
        head.append(el("p", "", "Cuestionarios respondidos por: " + FANDProfile.informants[FANDProfile.getInformant()] + "."));
        head.append(el("p", "", "Persona: " + (u.name || "sin indicar") + " · Edad: " + (u.ageYears ? u.ageYears + " años" : "sin indicar") + " · Fecha del informe: " + p.generatedAt.slice(0, 10)));
        if (u.notes) head.append(el("p", "", "Notas: " + u.notes));
        if (u.factors && u.factors.length) head.append(el("p", "difficulty", "Factores que pueden alterar los resultados: " + u.factors.join("; ") + "."));
        head.append(el("p", "", "Juegos con resultados válidos: " + (played.length ? played.map(function (c) { return c + " " + p.games[c]; }).join(", ") : "ninguno todavía") + "."));
        var st = FANDProfile.status(), qn = FANDProfile.getQuestionnaire();
        var stBox = el("div", "", ""); stBox.style.cssText = "border-left:5px solid #0f766e;background:#f0fdfa;padding:10px 14px;border-radius:8px;margin:10px 0";
        stBox.append(el("strong", "", "Estado de la orientación: " + st.title + ". "), document.createTextNode(st.text));
        head.append(stBox);
        var concernNames = qn.concerns.map(function (id) { return (FANDProfile.concerns[id] || {}).label; }).filter(Boolean);
        head.append(el("p", "", "Cuestionario inicial · Áreas a explorar: " + (concernNames.join(", ") || "no indicadas") + "."));
        head.append(el("p", "", "Los resultados de los juegos solo contextualizan la recomendación: una puntuación normal no excluye ninguna condición y una puntuación baja no la confirma."));
        report.append(head);

        var qs = FANDProfile.scoreQuestionnaires(QDEF);
        if (qs.length) {
          var qsec = section("Cuestionarios (protocolo v7) · resumen descriptivo");
          qsec.append(el("p", "meta", "Por dimensión: respuestas válidas, distribución 0–4 y media de las afirmaciones respondidas (0 nada conforme … 4 muy conforme), con su equivalente descriptivo sobre 100. «No lo sé / No aplicable» es dato ausente, no cero; con menos del 75 % de respuestas válidas la dimensión no se interpreta (umbral provisional). Es el grado de conformidad con afirmaciones, no una probabilidad ni un diagnóstico. Sin umbrales clínicos; las dimensiones no se suman entre sí ni con los juegos. El registro I01 no se puntúa. Banco no validado."));
          qs.forEach(function (q) {
            
            qsec.append(el("h3", "", q.code + " · " + q.nombre + " — responde: " + (FANDProfile.informants[q.informant] || q.informant)));
            var qt = el("table"), qh = el("tr");
            ["Dimensión", "Media (0–4) · sobre 100", "Distribución 0 / 1 / 2 / 3 / 4", "Válidas", "N/O"].forEach(function (h) { qh.append(el("th", "", h)); });
            qt.append(qh);
            q.dimensiones.forEach(function (d) {
              var r = el("tr");
              r.append(el("td", "", q.code + " " + d.nombre), el("td", "", d.mean === null ? "no interpretable (menos del 75 % de respuestas válidas)" : d.mean.toFixed(2) + " · " + Math.round(d.mean / 4 * 100) + "/100"), el("td", "", d.dist.join(" / ")), el("td", "", d.valid + " de " + d.total), el("td", "", String(d.na)));
              qt.append(r);
            });
            qsec.append(qt);
          });
          var cmp = FANDProfile.compareInformants(QDEF);
          qsec.append(el("h3", "", "Comparación entre informantes"));
          if (!cmp.length) {
            qsec.append(el("p", "meta", "Aún no hay dos perspectivas sobre el mismo aspecto. Si el recorrido lo permite, un segundo informante (familia, docente o la propia persona) aporta contraste: en los Cuestionarios, cambia «¿Quién responde?» y completa de nuevo el módulo."));
          } else {
            qsec.append(el("p", "meta", "Las respuestas de cada informante se muestran por separado y no se promedian. Una diferencia de 1 punto o más en la escala 0–4 se marca como discrepancia (umbral provisional): puede reflejar contextos distintos, no un error de nadie."));
            var ct = el("table"), ch = el("tr");
            ["Dimensión", "Medias por informante (0–4)", "Lectura"].forEach(function (h) { ch.append(el("th", "", h)); });
            ct.append(ch);
            cmp.forEach(function (x) {
              var r = el("tr");
              var vals = x.values.map(function (v) { return (FANDProfile.informants[v.informant] || v.informant) + ": " + (v.mean === null ? "no interpretable" : v.mean.toFixed(2)); }).join(" · ");
              var lec = { discrepancia: "Discrepancia (" + (x.diff === null ? "" : x.diff.toFixed(1)) + " puntos): documentar y comentar con el profesional.", coinciden: "Perspectivas coincidentes.", sin_datos: "Datos insuficientes para comparar." }[x.state];
              r.append(el("td", "", x.label), el("td", "", vals), el("td", "", lec));
              ct.append(r);
            });
            qsec.append(ct);
          }
          var ql = el("a", "btn", "Completar o revisar cuestionarios"); ql.href = "FAND_Cuestionarios.html"; qsec.append(ql);
          report.append(qsec);
          var inter = FANDProfile.integrate();
          if (inter.length) {
            curView = "juegos"; var isec = section("Cuestionarios y juegos: contraste por objetivo");
            isec.append(el("p", "meta", "Cada fila compara una dimensión de cuestionario con el juego que explora un objetivo equivalente (hipótesis de contraste, no relación diagnóstica). Las dos fuentes se mantienen separadas: no se suman. Un dato contradictorio no invalida ninguna fuente; indica que conviene valorarlo con un profesional."));
            var it = el("table"), ih = el("tr");
            ["Dimensión", "Media (0–4)", "Juego", "Lectura"].forEach(function (h) { ih.append(el("th", "", h)); });
            it.append(ih);
            inter.forEach(function (x) {
              var r = el("tr");
              r.append(el("td", "", x.code + " · " + x.dim), el("td", "", x.mean.toFixed(2) + (x.qLevel === "alta" ? " (conformidad alta)" : "")), el("td", "", x.game + " " + x.gameName), el("td", "", x.relation));
              it.append(r);
            });
            isec.append(it);
            report.append(isec);
          }
        }

        curView = "juegos";
        if (!played.length) {
          var empty = section("Aún no hay resultados");
          empty.append(el("p", "", "Juega a los juegos de la página de juegos interactivos (J01–J08) y vuelve aquí. Cuantos más juegos completes, más útil será la ficha."));
          var link = el("a", "btn", "Ir a los juegos"); link.href = "FAND_Juegos_Interactivos.html#juegos"; empty.append(link);
          report.append(empty);
          return;
        }

        var idx = section("Índice de orientación (no es una probabilidad clínica)");
        var o = p.overall;
        if (o.index === null) {
          idx.append(el("p", "", "Todavía no hay suficientes indicadores evaluables (mínimo 6 en total). Completa más juegos."));
        } else {
          idx.append(el("div", "index", o.index + " %"));
          var bar = el("div", "bar"); var fill = el("span"); fill.style.width = o.index + "%"; bar.append(fill); idx.append(bar);
          idx.append(el("p", "", o.flagged + " de " + o.evaluable + " indicadores quedaron fuera del rango orientativo. Un porcentaje alto sugiere que puede ser útil consultar a un profesional; uno bajo NO descarta ninguna condición."));
        }
        idx.append(el("p", "meta", "El índice es la proporción de indicadores fuera de rangos orientativos genéricos (sin ajuste por edad). No estima la probabilidad de tener una neurodivergencia ni la confirma o descarta."));
        report.append(idx);

        p.domains.forEach(function (d) {
          var s = section(d.label);
          s.append(el("p", "meta", "Perfiles a los que puede orientar: " + d.families));
          if (!d.items.length) { s.append(el("p", "", "Sin datos válidos en esta área.")); report.append(s); return; }
          s.append(el("p", "", "Indicador de orientación del área: " + (d.index === null ? "datos insuficientes (mínimo 4 indicadores)" : d.index + " % (" + d.flagged + " de " + d.evaluable + ")")));
          var t = el("table"); var hr = el("tr");
          ["Juego", "Indicador", "Valor", "Lectura"].forEach(function (h) { hr.append(el("th", "", h)); });
          t.append(hr);
          d.items.forEach(function (i) {
            var r = el("tr");
            r.append(el("td", "", i.code + " " + i.game), el("td", "", i.label), el("td", "", fmt(i.value)));
            r.append(el("td", i.verdict === "strength" ? "strength" : i.verdict === "difficulty" ? "difficulty" : "", i.verdict === "strength" ? "Habilidad destacada" : i.verdict === "difficulty" ? "Posible dificultad" : "Dentro de lo orientativo"));
            t.append(r);
          });
          s.append(t);
          report.append(s);
        });

        var sd = section("Habilidades y posibles carencias");
        var strengths = [], diffs = [];
        p.domains.forEach(function (d) { strengths = strengths.concat(d.strengths); diffs = diffs.concat(d.difficulties); });
        var ls = el("h3", "", "Habilidades observadas"); sd.append(ls);
        var ul1 = el("ul"); (strengths.length ? strengths : [{ game: "", label: "Ninguna destacada con los datos actuales", code: "" }]).forEach(function (i) { ul1.append(el("li", "", (i.code ? i.code + " · " : "") + i.label)); }); sd.append(ul1);
        sd.append(el("h3", "", "Posibles dificultades observadas"));
        var ul2 = el("ul"); (diffs.length ? diffs : [{ label: "Ninguna con los datos actuales", code: "" }]).forEach(function (i) { ul2.append(el("li", "", (i.code ? i.code + " · " : "") + i.label + (i.value !== undefined ? " (" + fmt(i.value) + ")" : ""))); }); sd.append(ul2);
        report.append(sd);

        var pro = section("Información para el profesional");
        [
          "Estos datos proceden de juegos digitales en protocolo de investigación, sin baremos propios ni validación clínica. Las puntuaciones brutas no se suman entre juegos; el índice es solo un resumen descriptivo.",
          "Los umbrales usados son orientativos y genéricos, sin ajuste por edad, dispositivo ni nivel educativo.",
          "Las medidas de los juegos (J01–J08) se describen en sus fichas técnicas, con indicadores, protocolo, limitaciones y referencias.",
          "Se recomienda confirmar con entrevista clínica e historia del desarrollo, y con pruebas estandarizadas del área (por ejemplo, test de atención continuada, tareas de funciones ejecutivas, memoria verbal y cuestionarios validados por edad).",
          "J02: la ficha actualizada confirma CUATRO colores; los nombres exactos y si siempre hay dos opciones inferiores siguen pendientes de confirmar. Verificar lectura y discriminación de color.",
          "J05: las reglas del tablero (varillas/capacidades, deshacer, modelo visible) siguen pendientes de confirmar en la ficha; se usa Tower of London solo como referencia.",
          "J06: no aplicar baremos de RAVLT; la retención solo se calcula si R5 > 0."
        ].forEach(function (t) { pro.append(el("p", "", "• " + t)); });
        var guide = el("details"); guide.append(el("summary", "", "Guía de rangos piloto utilizada (punto de partida, pendiente de calibración)"));
        guide.append(el("p", "meta", "Rangos provisionales, sin ajuste por edad, que se calibrarán con muestras piloto supervisadas por profesionales. «Posible dificultad» = fuera del primer umbral; «habilidad destacada» = mejor que el segundo."));
        var gt = el("table"); var gh = el("tr");
        ["Juego", "Indicador", "Posible dificultad", "Habilidad destacada"].forEach(function (h) { gh.append(el("th", "", h)); });
        gt.append(gh);
        Object.keys(FANDProfile.rules).sort().forEach(function (code) {
          FANDProfile.rules[code].forEach(function (r) {
            var row = el("tr"), low = r[2] === "low";
            row.append(el("td", "", code + " " + FANDProfile.games[code]), el("td", "", r[1]), el("td", "", (low ? "< " : "> ") + r[3]), el("td", "", (low ? "≥ " : "≤ ") + r[4]));
            gt.append(row);
          });
        });
        guide.append(gt); pro.append(guide);
        var table = el("table"); var hrow = el("tr");
        ["Juego", "Fecha", "Nivel", "Válida", "Completa"].forEach(function (h) { hrow.append(el("th", "", h)); });
        table.append(hrow);
        p.sessions.slice(-20).forEach(function (s) {
          var r = el("tr");
          [s.code + " " + p.games[s.code], s.at.slice(0, 16).replace("T", " "), s.level || "—", s.valid ? "Sí" : "No", s.completed ? "Sí" : "No"].forEach(function (x) { r.append(el("td", "", x)); });
          table.append(r);
        });
        pro.append(el("h3", "", "Sesiones registradas")); pro.append(table);
        if (p.warnings.length) { pro.append(el("h3", "", "Avisos de validez")); p.warnings.slice(-10).forEach(function (w) { pro.append(el("p", "difficulty", w)); }); }
        report.append(pro);

        var raw = section("Anexo: datos en bruto (equivalente al JSON)");
        raw.append(el("p", "meta", "Valores exactos de cada juego y respuestas de cuestionarios, para que el profesional pueda revisarlos. Se incluye al imprimir o guardar como PDF."));
        var mt = el("table"), mh = el("tr");
        ["Juego", "Fecha", "Válida", "Métricas"].forEach(function (h) { mh.append(el("th", "", h)); });
        mt.append(mh);
        p.sessions.slice(-20).forEach(function (s) {
          var r = el("tr"), m = s.metrics || {};
          var txt = Object.keys(m).map(function (k) { return k + ": " + (typeof m[k] === "number" ? Math.round(m[k] * 1000) / 1000 : m[k]); }).join("; ") || "—";
          r.append(el("td", "", s.code + " " + p.games[s.code]), el("td", "", s.at.slice(0, 16).replace("T", " ")), el("td", "", s.valid ? "Sí" : "No"), el("td", "", txt));
          mt.append(r);
        });
        if (p.sessions.length) raw.append(el("h3", "", "Métricas por sesión"), mt);
        var cu = exportData().cuestBy;
        var cuBuckets = Object.keys(cu);
        if (cuBuckets.length) raw.append(el("h3", "", "Respuestas de cuestionarios (escala 0–4; na = no lo sé / no aplicable)"));
        cuBuckets.forEach(function (b) {
          Object.keys(cu[b]).filter(function (k) { return Object.keys(cu[b][k]).length; }).forEach(function (k) {
            raw.append(el("p", "", k + " (" + (b === "_" ? "registro" : FANDProfile.informants[b] || b) + "): " + Object.keys(cu[b][k]).sort().map(function (i) { return i + "=" + cu[b][k][i]; }).join(", ")));
          });
        });
        var det = el("details"); det.id = "raw-json"; det.append(el("summary", "", "Datos completos en formato JSON"));
        var pre = el("pre", "", JSON.stringify(exportData(), null, 2)); pre.style.cssText = "white-space:pre-wrap;word-break:break-all;font-size:.75rem";
        det.append(pre); raw.append(det);
        report.append(raw);
      }
      function exportData() {
        var d = FANDProfile.evaluate();
        d.cuestBy = FANDProfile.rawAnswers();
        d.comparacionInformantes = FANDProfile.compareInformants(QDEF);
        d.cuestionarios = FANDProfile.scoreQuestionnaires(QDEF);
        d.contraste = FANDProfile.integrate();
        d.ruta = FANDProfile.route();
        d.estado = FANDProfile.status();
        return d;
      }
      window.addEventListener("beforeprint", function () { var d = document.getElementById("raw-json"); if (d) d.open = true; });
      document.getElementById("save-user").addEventListener("click", function () {
        FANDProfile.setUser({
          name: document.getElementById("u-name").value.trim(), ageYears: (FANDProfile.setAge(document.getElementById("u-age").value), FANDProfile.ageYears() || undefined),
          notes: document.getElementById("u-notes").value.trim(), factors: checkedFactors()
        });
        render();
        ageNote();
      });
      document.getElementById("print").addEventListener("click", function () { window.print(); });
      document.getElementById("download").addEventListener("click", function () {
        if (!window.jspdf) { window.print(); return; }
        var doc = new window.jspdf.jsPDF({ unit: "mm", format: "a4" });
        var W = 210, M = 15, maxW = W - 2 * M, y = M;
        function clean(t) {
          return String(t).replace(/[≥]/g, ">=").replace(/[≤]/g, "<=").replace(/[—–]/g, "-").replace(/[↔]/g, "<->").replace(/[→]/g, "->").replace(/[←]/g, "<-").replace(/[•]/g, "-").replace(/[“”]/g, '"').replace(/[‘’]/g, "'").replace(/[^\u0000-\u00FF]/g, "").replace(/\s+/g, " ").trim();
        }
        function line(text, size, bold, gap) {
          if (!text) return;
          doc.setFont("helvetica", bold ? "bold" : "normal"); doc.setFontSize(size);
          doc.splitTextToSize(clean(text), maxW).forEach(function (l) {
            if (y > 282) { doc.addPage(); y = M; }
            doc.text(l, M, y); y += size * 0.45;
          });
          y += gap || 1.5;
        }
        var u = FANDProfile.evaluate().user || {};
        line("FAND - Ficha de orientacion", 16, true, 2);
        line("Fecha: " + new Date().toISOString().slice(0, 10) + (u.name ? " · Persona: " + u.name : "") + (u.ageYears ? " · Edad: " + u.ageYears + " años" : ""), 10, false, 2);
        line("AVISO: herramienta de orientacion de investigacion, no validada. No es un diagnostico ni lo sustituye; un resultado normal no descarta ninguna condicion.", 9, true, 4);
        report.querySelectorAll("section").forEach(function (s) {
          Array.prototype.forEach.call(s.querySelectorAll("h2,h3,p,li,tr,.index"), function (n) {
            if (n.closest("pre") || (n.closest("details") && n.closest("details").id === "raw-json")) return;
            var tag = n.tagName;
            if (tag === "H2") { y += 3; line(n.textContent, 13, true, 2); }
            else if (tag === "H3") line(n.textContent, 11, true, 1.5);
            else if (tag === "TR") line(Array.prototype.map.call(n.children, function (c) { return c.textContent.trim(); }).join(" | "), 8.5, n.firstElementChild && n.firstElementChild.tagName === "TH", 1);
            else if (tag === "LI") line("- " + n.textContent, 9.5, false, 1);
            else if (n.classList.contains("index")) line("Indice de orientacion: " + n.textContent, 11, true, 1.5);
            else line(n.textContent, 9.5, false, 1.5);
          });
        });
        doc.addPage(); y = M;
        line("Anexo: datos completos (JSON)", 13, true, 2);
        doc.setFont("courier", "normal"); doc.setFontSize(7);
        JSON.stringify(exportData(), null, 1).split("\n").forEach(function (l) {
          doc.splitTextToSize(clean(l) || " ", maxW).forEach(function (w) {
            if (y > 285) { doc.addPage(); y = M; }
            doc.text(w, M, y); y += 3;
          });
        });
        doc.save("ficha-fand.pdf");
      });
      document.getElementById("clear").addEventListener("click", function () {
        if (window.confirm("¿Borrar todos los resultados y datos guardados en este navegador?")) { FANDProfile.clear(); loadUser(); render(); }
      });
      loadUser(); render();
    })();
  </script>
</body>
</html>
