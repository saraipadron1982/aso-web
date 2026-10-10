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
    @media print { .actions, .noprint, header a { display: none; } .card { break-inside: avoid; } }
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

    <section class="card noprint" aria-labelledby="datos-title">
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
      <button type="button" class="secondary" id="download">Descargar datos (JSON)</button>
      <button type="button" class="secondary" id="clear">Borrar mis datos</button>
    </div>

    <section class="card">
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

  <script src="assets/js/fand-perfil.js"></script>
  <script>
    (function () {
      var report = document.getElementById("report");
      var QDEF = <?= json_encode(CuestionarioCatalog::definition()) ?>;
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
      function section(title) { var s = el("section", "card"); s.append(el("h2", "", title)); s.firstChild.style.marginTop = "0"; return s; }

      function render() {
        var p = FANDProfile.evaluate();
        report.textContent = "";
        var played = Object.keys(p.latest);

        var head = section("Resumen del perfil");
        var u = p.user || {};
        head.append(el("p", "", "Persona: " + (u.name || "sin indicar") + " · Edad: " + (u.ageYears ? u.ageYears + " años" : "sin indicar") + " · Fecha del informe: " + p.generatedAt.slice(0, 10)));
        if (u.notes) head.append(el("p", "", "Notas: " + u.notes));
        if (u.factors && u.factors.length) head.append(el("p", "difficulty", "Factores que pueden alterar los resultados: " + u.factors.join("; ") + "."));
        head.append(el("p", "", "Juegos con resultados válidos: " + (played.length ? played.map(function (c) { return c + " " + p.games[c]; }).join(", ") : "ninguno todavía") + "."));
        var st = FANDProfile.status(), qn = FANDProfile.getQuestionnaire();
        var stBox = el("div", "", ""); stBox.style.cssText = "border-left:5px solid #0f766e;background:#f0fdfa;padding:10px 14px;border-radius:8px;margin:10px 0";
        stBox.append(el("strong", "", "Estado de la orientación: " + st.title + ". "), document.createTextNode(st.text));
        head.append(stBox);
        var concernNames = qn.concerns.map(function (id) { return (FANDProfile.concerns[id] || {}).label; }).filter(Boolean);
        head.append(el("p", "", "Cuestionario inicial · Áreas a explorar: " + (concernNames.join(", ") || "no indicadas") + " · Persistencia: " + (qn.persistent ? "sí" : "no indicada") + " · Impacto: " + ({ none: "sin impacto / no sabe", some: "algo", significant: "significativo" }[qn.impact] || "—") + " · Cribado reconocido: " + ({ none: "no realizado", negative: "negativo", positive: "positivo" }[qn.screening] || "—") + "."));
        head.append(el("p", "", "Los resultados de los juegos solo contextualizan la recomendación: una puntuación normal no excluye ninguna condición y una puntuación baja no la confirma."));
        report.append(head);

        var qs = FANDProfile.scoreQuestionnaires(QDEF);
        if (qs.length) {
          var qsec = section("Cuestionarios (C01–C05) · resumen descriptivo");
          qsec.append(el("p", "meta", "Media de frecuencia por dimensión (0 = nunca, 4 = casi siempre) sobre las respuestas válidas. «No sé / no aplica» es dato ausente, no cero. Banco no validado, sin cortes clínicos; no se suma con los juegos."));
          qs.forEach(function (q) {
            qsec.append(el("h3", "", q.code + " · " + q.nombre));
            var qt = el("table"), qh = el("tr");
            ["Dimensión", "Media (0–4)", "Válidas", "No sé / n.a.", "Ítems ampliados respondidos"].forEach(function (h) { qh.append(el("th", "", h)); });
            qt.append(qh);
            q.dimensiones.forEach(function (d) {
              var r = el("tr");
              r.append(el("td", "", d.nombre), el("td", "", d.mean === null ? "—" : d.mean.toFixed(2)), el("td", "", d.valid + " de " + d.total), el("td", "", String(d.na)), el("td", "", d.extraAnswered + " de " + d.extraTotal));
              qt.append(r);
            });
            qsec.append(qt);
          });
          var ql = el("a", "btn", "Completar o revisar cuestionarios"); ql.href = "FAND_Cuestionarios.html"; qsec.append(ql);
          report.append(qsec);
        }

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
      }

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
        var blob = new Blob([JSON.stringify(FANDProfile.evaluate(), null, 2)], { type: "application/json" });
        var a = document.createElement("a"); a.href = URL.createObjectURL(blob); a.download = "ficha-fand.json"; a.click();
        setTimeout(function () { URL.revokeObjectURL(a.href); }, 1000);
      });
      document.getElementById("clear").addEventListener("click", function () {
        if (window.confirm("¿Borrar todos los resultados y datos guardados en este navegador?")) { FANDProfile.clear(); loadUser(); render(); }
      });
      loadUser(); render();
    })();
  </script>
</body>
</html>
