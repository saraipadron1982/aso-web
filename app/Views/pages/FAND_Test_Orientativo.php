<?php
$tests = [
    'J01' => ['Encuentra al Robot', 'Atención selectiva y búsqueda visual', '8–12 min'],
    'J02' => ['Que no te engañen', 'Control de interferencias', '4–6 min'],
    'J03' => ['Pulsa o Espera', 'Inhibición de respuesta', '3–6 min'],
    'J04' => ['El Vigilante', 'Atención sostenida', '6–12 min'],
    'J05' => ['La Torre', 'Planificación', '8–15 min'],
    'J06' => ['La lista', 'Memoria verbal y aprendizaje', '10–15 min'],
    'J07' => ['Recuerda la secuencia', 'Memoria de trabajo visoespacial', '4–8 min'],
    'J08' => ['El círculo mayor', 'Discriminación visual y atención', '2–6 min'],
];
?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Test orientativo · FAND</title>
  <style>
    [hidden] { display: none !important; }
    :root { --teal: #0f766e; --ink: #1f2937; --soft: #f0fdfa; --line: #cbd5e1; }
    body { margin: 0; font-family: system-ui, "Segoe UI", sans-serif; color: var(--ink); line-height: 1.6; }
    header, main, footer { width: min(100% - 32px, 1100px); margin: 0 auto; }
    header { padding: 22px 0 8px; }
    a { color: var(--teal); }
    h1 { margin: 8px 0; }
    .notice { background: #fffbeb; border-left: 5px solid #d97706; padding: 12px 16px; border-radius: 8px; margin: 16px 0; }
    .age-box { display: flex; flex-wrap: wrap; gap: 12px; align-items: end; background: var(--soft); border: 1px solid var(--line); border-radius: 14px; padding: 16px 20px; margin: 16px 0; }
    .age-box label { font-weight: 700; display: block; }
    .age-box input { min-height: 44px; width: 110px; padding: 6px 10px; border: 1px solid #94a3b8; border-radius: 9px; font-size: 1.1rem; }
    .age-box button, .btn { min-height: 44px; background: var(--teal); color: #fff; border: 0; padding: 10px 18px; border-radius: 10px; text-decoration: none; font-weight: 700; font-size: 1rem; cursor: pointer; display: inline-block; }
    .age-box button:hover, .btn:hover, .btn:focus-visible { background: #115e59; }
    #age-status { flex-basis: 100%; margin: 0; font-weight: 600; }
    .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 18px; margin: 20px 0; padding: 0; list-style: none; }
    .card { border: 1px solid var(--line); border-radius: 14px; padding: 12px; display: flex; flex-direction: column; gap: 6px; height: 100%; box-sizing: border-box; }
    .card img { width: 100%; height: auto; border-radius: 10px; display: block; }
    .card h2 { font-size: 1.1rem; margin: 4px 0 0; }
    .card p { margin: 0; font-size: .92rem; color: #475569; }
    .card .row { margin-top: auto; display: flex; flex-wrap: wrap; gap: 8px 14px; align-items: center; padding-top: 8px; }
    .order { font-weight: 700; color: var(--teal); }
    fieldset { flex-basis: 100%; border: 1px solid var(--line); border-radius: 10px; margin: 0; } legend { font-weight: 700; } .chk { display: block; font-weight: 400 !important; margin: 4px 0; } .chk input { width: auto; min-height: 0; margin-right: 6px; } select { min-height: 44px; display: block; margin: 4px 0 10px; padding: 6px; } fieldset small, .hint { color: #475569; }
    .route { border: 2px solid var(--teal); border-radius: 14px; padding: 4px 20px 12px; margin: 20px 0; }
    .route-list li.done { color: #475569; text-decoration: line-through; } .next { background: var(--soft); padding: 10px 14px; border-radius: 10px; }
    .state { border-left: 5px solid #94a3b8; background: #f8fafc; padding: 10px 14px; border-radius: 8px; margin: 10px 0; } .state-recomendada { border-color: #d97706; background: #fffbeb; }
    .btn.secondary { background: #fff; color: var(--teal); border: 2px solid var(--teal); } .badge { align-self: flex-start; background: #f59e0b; color: #1f2937; font-size: .8rem; font-weight: 700; padding: 2px 10px; border-radius: 999px; }
    footer { padding: 24px 0 40px; font-size: .9rem; }
  </style>
</head>
<body>
  <header>
    <a href="index.html">← Inicio</a> · <a href="FAND_Juegos_Interactivos.html">Todos los juegos</a> ·     <a href="FAND_Fichas_Tecnicas.html">Fichas técnicas</a> · <a href="FAND_Protocolo.html">Protocolo</a> · <a href="FAND_Cuestionarios.html">Cuestionarios</a> · <a href="FAND_Ficha_Usuario.html">Mi ficha</a>
    <h1>Test orientativo</h1>
    <p>Ocho actividades breves para explorar atención, control de impulsos, planificación y memoria. Puedes hacer solo las que quieras y en el orden que prefieras. Al terminar, <a href="FAND_Ficha_Usuario.html">Mi ficha</a> reúne los resultados.</p>
  </header>
  <main>
    <div class="notice"><strong>Importante:</strong> este test es una guía orientativa. <strong>No es un diagnóstico</strong> ni sustituye la evaluación de un profesional. Sus rangos son provisionales y están en estudio. Tus datos se guardan solo en este navegador.</div>

    <section id="resume-box" class="route" hidden aria-labelledby="resume-title">
      <h2 id="resume-title">¿Quieres continuar una prueba?</h2>
      <div id="resume-body"></div>
    </section>
    <div id="guide"></div>
    <form class="age-box" id="q-form">
      <h2 style="flex-basis:100%;margin:0">1. Cuestionario inicial</h2>
      <p class="hint" style="flex-basis:100%;margin:0">Sirve solo para elegir qué juegos te conviene hacer primero. No es una puntuación clínica y todas las preguntas son opcionales salvo la edad y el alias.</p>
      <div>
        <label for="alias">Nombre o alias (no hace falta que sea real)</label>
        <input id="alias" type="text" maxlength="40" autocomplete="off" placeholder="Para reconocer esta prueba">
      </div>
      <div>
        <label for="age">¿Qué edad tiene la persona que hará las pruebas?</label>
        <input id="age" type="number" min="3" max="110" inputmode="numeric" placeholder="Años">
      </div>
      <div>
        <label for="informant">¿Quién responde los cuestionarios?</label>
        <select id="informant">
          <option value="self">La propia persona</option>
          <option value="familia">Un familiar o persona cercana</option>
          <option value="docente">Un docente o el centro educativo</option>
        </select>
      </div>
      <fieldset>
        <legend>¿Qué te gustaría explorar? (marca las que quieras)</legend>
        <label class="chk"><input type="checkbox" name="concern" value="atencion"> Atención y concentración</label>
        <label class="chk"><input type="checkbox" name="concern" value="impulsividad"> Impulsividad, actuar sin pensar</label>
        <label class="chk"><input type="checkbox" name="concern" value="organizacion"> Organización y planificación</label>
        <label class="chk"><input type="checkbox" name="concern" value="memoria"> Memoria e instrucciones</label>
        <label class="chk"><input type="checkbox" name="concern" value="percepcion"> Percepción visual y coordinación ojo-mano</label>
        <label class="chk"><input type="checkbox" name="concern" value="social"> Comunicación social y reciprocidad</label>
        <label class="chk"><input type="checkbox" name="concern" value="sensorial"> Rutinas, intereses repetitivos o aspectos sensoriales</label>
        <small>Los dos últimos no se miden con juegos: solo se usan como contexto para recomendar una consulta profesional.</small>
      </fieldset>
      <fieldset>
        <legend>Accesibilidad (para evitar juegos que no se puedan interpretar bien)</legend>
        <label class="chk"><input type="checkbox" name="access" value="reading"> Dificultades de lectura o lenguaje</label>
        <label class="chk"><input type="checkbox" name="access" value="hearing"> Dificultades de audición</label>
        <label class="chk"><input type="checkbox" name="access" value="color"> Dificultades para distinguir colores</label>
        <label class="chk"><input type="checkbox" name="access" value="motor"> Dificultades motoras o de manejo del dispositivo</label>
      </fieldset>
      <button type="submit">Guardar y ver mi ruta</button>
      <p id="age-status" aria-live="polite"></p>
    </form>

    <section class="route" id="route" aria-labelledby="route-title">
      <h2 id="route-title">2. Cuestionarios y juegos asignados</h2>
      <div id="route-body"></div>
      <p><button type="button" class="btn secondary" id="stop">Prefiero parar aquí (cansancio u otro motivo)</button> <button type="button" class="btn secondary" id="resume" hidden>Reanudar</button></p>
    </section>

    <h2>Todos los juegos</h2>
    <p>Puedes hacer cualquiera cuando quieras; la ruta solo sugiere un orden. La exploración recomendada tiene como máximo 5 juegos.</p>
    <ol class="grid">
      <?php foreach ($tests as $code => [$name, $area, $time]): ?>
        <li>
          <div class="card" data-card="<?= $code ?>"><span class="badge" hidden></span>
            <img src="assets/img/juegos/<?= $code ?>.svg" alt="Ilustración del juego <?= htmlspecialchars($name) ?>" loading="lazy">
            <h2><span class="order"><?= (int) substr($code, 1) ?>.</span> <?= htmlspecialchars($name) ?></h2>
            <p><?= htmlspecialchars($area) ?> · <?= $time ?></p>
            <div class="row">
              <a class="btn" href="FAND_Juegos_Interactivos.html?jugar=<?= $code ?>">Empezar a jugar</a>
              <a href="FAND_Fichas_Tecnicas.html?juego=<?= $code ?>">Ficha técnica</a>
            </div>
          </div>
        </li>
      <?php endforeach; ?>
    </ol>
  </main>
  <footer>
    <p>FAND · Alianza para la Neurodivergencia. Las franjas de edad son grupos de planificación del piloto, no normas.</p>
  </footer>
  <script src="assets/js/fand-perfil.js"></script>
  <script>
    (function () {
      var F = FANDProfile;
      var $ = function (id) { return document.getElementById(id); };
      var names = F.games;
      F.setQuestionnaireDef(<?= json_encode(CuestionarioCatalog::definition()) ?>);
      F.setStages(<?= json_encode(CuestionarioCatalog::etapas()) ?>);
      function load() {
        var q = F.getQuestionnaire();
        if (F.ageYears()) $("age").value = F.ageYears();
        $("alias").value = F.evaluate().user.name || "";
        $("informant").value = F.getInformant();
        document.querySelectorAll("input[name=concern]").forEach(function (i) { i.checked = q.concerns.indexOf(i.value) !== -1; });
        document.querySelectorAll("input[name=access]").forEach(function (i) { i.checked = q.access.indexOf(i.value) !== -1; });
        
      }
      function el(tag, cls, text) { var n = document.createElement(tag); if (cls) n.className = cls; if (text) n.textContent = text; return n; }
      function gameLink(code) { var a = el("a", "btn", "Empezar a jugar " + names[code]); a.href = "FAND_Juegos_Interactivos.html?jugar=" + code; return a; }
      function renderRoute() {
F.mountGuide($("guide"));
        var r = F.route(), s = F.status(), q = F.getQuestionnaire(), body = $("route-body");
        body.replaceChildren();
        var c = F.ageConfig();
        $("age-status").textContent = c ? "Los juegos se abrirán configurados para la franja " + c.label + ". Podrás cambiar cualquier opción." : "Sin edad indicada: los juegos usan su configuración general.";
        var g = F.gate();
        document.querySelectorAll("[data-card]").forEach(function (card) { card.style.opacity = g.locked ? ".6" : ""; });
        if (g.locked) {
          var lk = el("div", "next"); lk.append(el("strong", "", "Paso 2: responde primero a los cuestionarios (" + g.pending.join(" → ") + "). "), document.createTextNode("Según tus respuestas, FAND te asignará unos juegos u otros. Puedes parar cuando quieras."), document.createElement("br"));
          var go = el("a", "btn", "Empezar los cuestionarios"); go.href = "FAND_Cuestionarios.html?q=" + g.pending[0];
          lk.append(go);
          document.querySelectorAll("[data-card] .row a.btn").forEach(function (a) { a.hidden = true; });
          body.append(lk);
          $("stop").hidden = true; $("resume").hidden = true;
          document.querySelectorAll("[data-card] .badge").forEach(function (b) { b.textContent = "Se asigna tras los cuestionarios"; b.hidden = false; });
          return;
        }
        var state = el("div", "state state-" + s.id); state.append(el("strong", "", s.title + ". "), document.createTextNode(s.text)); 
        var list = el("ol", "route-list");
        r.starters.forEach(function (code, i) {
          var li = el("li", r.played.indexOf(code) !== -1 ? "done" : "", "Arranque " + (i + 1) + ": " + names[code] + (r.played.indexOf(code) !== -1 ? " · hecho" : ""));
          list.append(li);
        });
        r.played.filter(function (c) { return r.starters.indexOf(c) === -1; }).forEach(function (code) { list.append(el("li", "done", "Adicional: " + names[code] + " · hecho")); });
        body.append(list);
        var pendQ = F.questionnaireOrder().filter(function (c) { return !F.questionnaireDone(c); });
        if (pendQ.length && !q.stopped && !q.skipQ) {
          var pq = el("p", "next"); pq.append(el("strong", "", "Antes de jugar: cuestionarios pendientes (" + pendQ.join(" → ") + "). "), document.createElement("br"));
          var pl = el("a", "btn", "Continuar con los cuestionarios"); pl.href = "FAND_Cuestionarios.html?q=" + pendQ[0]; pq.append(pl);
          body.append(pq);
        }
        if (r.next && !q.stopped) {
          var n = el("p", "next"); n.append(el("strong", "", "Siguiente: " + names[r.next.code] + ". "), document.createTextNode("Por qué: " + r.next.why + "."), document.createElement("br"), gameLink(r.next.code));
          body.append(n);
        } else if (r.done) {
          body.append(el("p", "next", "Exploración prevista terminada. Esto nunca significa que se descarte una neurodivergencia."));
          var l = el("a", "btn", "Ver Mi ficha"); l.href = "FAND_Ficha_Usuario.html"; body.append(l);
        }
        if (r.excluded.length) body.append(el("p", "hint", "Juegos no recomendados por tus datos de accesibilidad o edad: " + r.excluded.map(function (x) { return names[x.code] + " (" + x.why + ")"; }).join("; ") + "."));
        var qsig = F.integrate();
        if (!qsig.length) body.append(el("p", "hint", "Si completas los módulos C01 y C04, la ruta se ajustará a tus respuestas. "));
        else {
          body.append(el("p", "hint", "La ruta también usa tus cuestionarios (media ≥ 2,5 de 4 con 3 o más respuestas válidas en una dimensión prioriza su juego; es solo un criterio provisional para ordenar, no una puntuación clínica)."));
        }
        body.append(state);
        $("stop").hidden = !!q.stopped; $("resume").hidden = !q.stopped;
        document.querySelectorAll("[data-card]").forEach(function (card) {
          var code = card.getAttribute("data-card"), badge = card.querySelector(".badge");
          var tag = r.excluded.some(function (x) { return x.code === code; }) ? "No recomendado ahora" : r.starters.indexOf(code) !== -1 ? "Arranque recomendado" : r.next && r.next.code === code ? "Siguiente sugerido" : r.played.indexOf(code) !== -1 ? "Hecho" : "";
          badge.textContent = tag; badge.hidden = !tag;
        });
      }
      $("q-form").addEventListener("submit", function (e) {
        e.preventDefault();
        F.setAge($("age").value);
        F.setUser({ name: $("alias").value.trim() });
        F.setInformant($("informant").value);
        F.setQuestionnaire({
          concerns: Array.prototype.map.call(document.querySelectorAll("input[name=concern]:checked"), function (i) { return i.value; }),
          access: Array.prototype.map.call(document.querySelectorAll("input[name=access]:checked"), function (i) { return i.value; }),
          stopped: false, skipQ: false
        });
        renderRoute();
        var nf = F.flow();
        if (nf.type === "cuestionario") { location.href = nf.url; return; }
        $("route").scrollIntoView({ behavior: "smooth" });
      });
      $("stop").addEventListener("click", function () { F.setQuestionnaire({ stopped: true }); renderRoute(); });
      $("resume").addEventListener("click", function () { F.setQuestionnaire({ stopped: false }); renderRoute(); });
      function fmt(s) { return (s.alias || "Sin alias") + (s.ageYears ? " · " + s.ageYears + " años" : "") + " · " + s.modules + " cuestionario(s) y " + s.games + " juego(s)" + (s.at ? " · " + s.at.slice(0, 10) : ""); }
      function entry() {
        var box = $("resume-box"), body = $("resume-body"), saved = F.savedList(), cur = F.hasData() ? F.currentSummary() : null;
        if ((!cur && !saved.length) || sessionStorage.getItem("fand.entry")) return false;
        var hide = Array.prototype.filter.call(document.querySelectorAll("main > *"), function (n) { return n !== box && !n.classList.contains("notice"); });
        hide.forEach(function (n) { n.hidden = true; });
        function go() { sessionStorage.setItem("fand.entry", "1"); location.reload(); }
        if (cur) {
          var c = el("p", "next"); c.append(el("strong", "", "Prueba en curso: "), document.createTextNode(fmt(cur)), document.createElement("br"));
          var b1 = el("button", "btn", "Continuar esta prueba"); b1.type = "button"; b1.addEventListener("click", go); c.append(b1); body.append(c);
        }
        saved.forEach(function (s) {
          var row = el("p", "next"); row.append(el("strong", "", "Guardada: "), document.createTextNode(fmt(s)), document.createElement("br"));
          var r1 = el("button", "btn secondary", "Recuperar"); r1.type = "button"; r1.addEventListener("click", function () { F.restore(s.id); go(); });
          var r2 = el("button", "btn secondary", "Borrar"); r2.type = "button"; r2.addEventListener("click", function () { if (confirm("¿Borrar esta prueba guardada?")) { F.forget(s.id); location.reload(); } });
          row.append(r1, document.createTextNode(" "), r2); body.append(row);
        });
        var nw = el("button", "btn", "Empezar una prueba nueva en blanco"); nw.type = "button";
        nw.addEventListener("click", function () { F.startNew(); go(); });
        body.append(nw);
        if (cur) body.append(el("p", "hint", "La prueba en curso se guarda para poder recuperarla más tarde."));
        box.hidden = false;
        return true;
      }
      if (!entry()) { load(); renderRoute(); }
    })();
  </script>
</body>
</html>
