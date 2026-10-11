<?php
$all = CuestionarioCatalog::all();
$req = strtoupper((string) ($_GET['q'] ?? ''));
$sel = $all[$req] ?? null;
$scales = CuestionarioCatalog::SCALES;
?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cuestionarios · FAND</title>
  <style>
    :root { --teal: #0f766e; --ink: #1f2937; --soft: #f0fdfa; --line: #cbd5e1; }
    body { margin: 0; font-family: system-ui, "Segoe UI", sans-serif; color: var(--ink); line-height: 1.6; }
    header, main, footer { width: min(100% - 32px, 900px); margin: 0 auto; }
    header { padding: 22px 0 8px; }
    a { color: var(--teal); }
    .notice { background: #fffbeb; border-left: 5px solid #d97706; padding: 12px 16px; border-radius: 8px; margin: 16px 0; }
    .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 14px; padding: 0; list-style: none; }
    .grid a { display: block; height: 100%; box-sizing: border-box; border: 1px solid var(--line); border-radius: 12px; padding: 12px 16px; text-decoration: none; color: var(--ink); }
    .grid a:hover, .grid a:focus-visible { border-color: var(--teal); box-shadow: 0 2px 10px rgba(15,118,110,.18); }
    .grid small { display: block; color: #475569; }
    .tag { font-size: .8rem; background: var(--soft); border: 1px solid var(--line); border-radius: 999px; padding: 1px 10px; }
    fieldset { border: 1px solid var(--line); border-radius: 12px; margin: 16px 0; padding: 8px 18px 14px; }
    legend { font-weight: 700; color: var(--teal); padding: 0 6px; }
    .item { border-top: 1px solid #e2e8f0; padding: 10px 0; }
    .item:first-of-type { border-top: 0; }
    .item p { margin: 0 0 6px; font-weight: 600; }
    .opts { display: flex; flex-wrap: wrap; gap: 6px 14px; }
    .opts label { display: inline-flex; align-items: center; gap: 4px; min-height: 36px; }
    textarea { width: 100%; box-sizing: border-box; min-height: 60px; padding: 8px; border: 1px solid #94a3b8; border-radius: 8px; font: inherit; }
    .btn { display: inline-block; min-height: 44px; box-sizing: border-box; background: var(--teal); color: #fff; padding: 10px 18px; border-radius: 10px; text-decoration: none; font-weight: 700; }
    #saved { color: #475569; }
    footer { padding: 24px 0 40px; font-size: .9rem; }
  </style>
</head>
<body>
  <header>
    <a href="index.html">← Inicio</a> · <a href="FAND_Test_Orientativo.html">Test orientativo</a> · <a href="FAND_Cuestionarios.html">Cuestionarios</a> · <a href="FAND_Ficha_Usuario.html">Mi ficha</a>
    <h1><?= $sel ? htmlspecialchars($sel['codigo'] . ' · ' . $sel['nombre']) : 'Cuestionarios' ?></h1>
  </header>
  <main>
    <div class="notice"><strong>Importante:</strong> banco original de investigación, <strong>no validado</strong> y sin cortes clínicos. Sirve para orientar qué explorar y preparar una consulta; no diagnostica ni descarta nada. Puedes omitir cualquier pregunta. Tus respuestas se guardan solo en este navegador.</div>
    <div class="notice" style="border-left-color:#0f766e;background:#f0fdfa">
      <label for="informant"><strong>¿Quién responde?</strong></label>
      <select id="informant" style="display:block;min-height:40px;margin:6px 0;padding:6px;border:1px solid #94a3b8;border-radius:8px;font:inherit">
        <option value="self">La propia persona</option>
        <option value="familia">Un familiar o persona cercana (responde sobre la persona)</option>
        <option value="docente">Un docente o el centro educativo (responde sobre el alumno/a)</option>
      </select>
      <span id="informant-note"></span>
    </div>    <?php if (!$sel): ?>
      <p>Sigue este orden: al terminar cada cuestionario pasarás automáticamente al siguiente y, después, a los juegos del Test orientativo. Puedes omitir cualquier módulo con «Guardar y continuar». Los resultados de cuestionarios y juegos se mantienen separados.</p>
      <p><button type="button" class="btn" id="start-flow" style="border:0;cursor:pointer">Empezar / continuar el recorrido</button></p>
      <?php
        $main = array_filter($all, static fn (array $q): bool => $q['flujo']);
        $optional = array_filter($all, static fn (array $q): bool => !$q['flujo']);
        $groups = [['Recorrido ordenado', $main], ['Módulos opcionales (lenguaje temprano, diferenciales, camuflaje, funcionamiento)', $optional]];
        $step = 0;
        $kind = ['L' => 'Conformidad 0–4', 'H' => 'Registro, sin puntuar'];
      ?>
      <?php foreach ($groups as [$title, $list]): ?>
        <h2><?= $title ?></h2>
        <ul class="grid">
          <?php foreach ($list as $code => $q): $step++; ?>
            <li><a href="FAND_Cuestionarios.html?q=<?= $code ?>"><strong><?= $title === 'Recorrido ordenado' ? $step . '. ' : '' ?><?= $code ?> · <?= htmlspecialchars($q['nombre']) ?></strong><?= isset($q['solo']) ? ' <span class="tag">para docentes</span>' : '' ?>
              <small><span class="tag"><?= $kind[$q['escala']] ?? '' ?></span> · <span data-progress="<?= $code ?>"></span> <span data-done="<?= $code ?>"></span></small></a></li>
          <?php endforeach; ?>
        </ul>
      <?php endforeach; ?>
    <?php else: ?>
      <?php if ($sel['puntua']): ?>
        <p>Indica tu grado de conformidad con cada afirmación (de «Nada conforme» a «Muy conforme»). Salvo que se indique otra cosa, piensa en los últimos seis meses. Elige «No lo sé / No aplicable» si no puedes responder: se registra como dato ausente y no cuenta como cero. Si responde otra persona, indícalo en el registro I01 (informante).</p>
      <?php else: ?>
        <p>Responde con tus palabras; puedes dejar en blanco lo que no sepas. Estas respuestas dan contexto al informe y no se puntúan.</p>
      <?php endif; ?>
      <div id="guide"></div>
<?php if ($sel['objetivo'] !== ''): ?><p class="notice"><?= htmlspecialchars($sel['objetivo']) ?></p><?php endif; ?>
      <form id="qform" data-q="<?= $sel['codigo'] ?>" onsubmit="return false">
        <fieldset>
          <legend><?= htmlspecialchars($sel['nombre']) ?></legend>
          <?php $lastDim = null; foreach ($sel['items'] as $item): $n = htmlspecialchars($item['codigo']); ?>
            <?php if ($item['dimension'] !== '' && $item['dimension'] !== $lastDim): $lastDim = $item['dimension']; ?><h3><?= htmlspecialchars($lastDim) ?></h3><?php endif; ?>
            <div class="item">
              <p id="t-<?= $n ?>" data-self="<?= htmlspecialchars($item['texto']) ?>" data-familia="<?= htmlspecialchars($item['familia']) ?>"><?= htmlspecialchars($item['texto']) ?></p>
              <?php if ($sel['puntua']): ?>
                <div class="opts" role="radiogroup" aria-labelledby="t-<?= $n ?>">
                  <?php foreach ($scales[$sel['escala']] as $v => $label): ?>
                    <label><input type="radio" name="<?= $n ?>" value="<?= $v ?>"> <?= $label ?></label>
                  <?php endforeach; ?>
                  <label><input type="radio" name="<?= $n ?>" value="na"> No lo sé / No aplicable</label>
                </div>
              <?php else: ?>
                <textarea name="<?= $n ?>" aria-labelledby="t-<?= $n ?>" maxlength="500"></textarea>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </fieldset>
      </form>
      <p id="saved" aria-live="polite">Las respuestas se guardan automáticamente.</p>
      <p><button type="button" class="btn" id="next-step" style="border:0;cursor:pointer">Guardar y continuar</button> <a href="FAND_Cuestionarios.html">Ver todos los módulos</a></p>
      <p id="next-hint" class="notice" hidden></p>
    <?php endif; ?>
  </main>
  <footer><p>FAND · Alianza para la Neurodivergencia. Material de investigación; no constituye diagnóstico.</p></footer>
  <script src="assets/js/fand-perfil.js"></script>
  <script>FANDProfile.setQuestionnaireDef(<?= json_encode(CuestionarioCatalog::definition()) ?>);
  var ETAPAS = <?= json_encode(CuestionarioCatalog::etapas()) ?>;
  FANDProfile.setStages(ETAPAS);</script>
  <script>
    (function () {
      var F = FANDProfile, form = document.getElementById("qform");
      if (form) {
        var code = form.getAttribute("data-q"), ans = F.getAnswers(code);
        Object.keys(ans).forEach(function (k) {
          var radio = form.querySelector('input[name="' + k + '"][value="' + ans[k] + '"]');
          if (radio) radio.checked = true;
          var ta = form.querySelector('textarea[name="' + k + '"]');
          if (ta) ta.value = ans[k];
        });
        var timer;
        var texts = form.querySelectorAll("p[data-self]"), infNote = document.getElementById("informant-note");
        function applyTexts() {
          var inf = F.getInformant(), missing = 0, hidden = 0, sd = F.stageData(), notes = [];
          texts.forEach(function (p) {
            var id = p.id.replace(/^t-/, ""), alt = p.getAttribute("data-familia"), item = p.closest(".item");
            if (inf !== "self" && !alt) missing += 1;
            var txt = inf !== "self" ? (sd.texto[id] || alt) : "";
            p.textContent = txt || p.getAttribute("data-self");
            var hide = F.omitted(id);
            item.hidden = hide;
            if (hide) hidden += 1;
          });
          if (missing) notes.push("Este módulo está redactado en primera persona: responde pensando en la persona evaluada, no en ti.");
          if (hidden) notes.push("Se han ocultado " + hidden + " afirmaciones que no se pueden observar a esta edad (" + F.stage() + "); no cuentan como ausentes.");
          var from = ETAPAS.modulo_desde && ETAPAS.modulo_desde[code], y = F.ageYears();
          if (from && y !== null && y < from) notes.push("Este módulo está pensado para personas desde los " + from + " años; úsalo solo si un profesional lo considera útil.");
          var ri = F.recommendedInformant();
          if (ri && ri.allowed.indexOf(inf) === -1) notes.push("Por la edad indicada: " + ri.text);
          infNote.textContent = notes.join(" ");
        }
        applyTexts();
        document.addEventListener("fand:informant", applyTexts);
        if (code === "I01" && !ans["I01-01"] && F.ageYears()) { var ai = form.querySelector('[name="I01-01"]'); if (ai) ai.value = F.ageYears(); }
        function persist(target) {
          F.setAnswer(code, target.name, target.value.trim ? target.value.trim() : target.value);
          var age = target.name === "I01-01" ? F.syncAgeFromI01(target.value) : null;
          document.getElementById("saved").textContent = age ? "Guardado. Los juegos se configurarán para " + age + " años." : "Guardado.";
        }
        form.addEventListener("change", function (e) { if (e.target.type === "radio") persist(e.target); });
        form.addEventListener("input", function (e) {
          if (e.target.tagName !== "TEXTAREA") return;
          clearTimeout(timer); timer = setTimeout(function () { persist(e.target); }, 400);
        });
      }
      var infSel = document.getElementById("informant");
      infSel.value = F.getInformant();
      var infText = function () { return infSel.options[infSel.selectedIndex].text.replace(/ \(.*$/, ""); };
      infSel.addEventListener("change", function () {
        F.setInformant(infSel.value);
        F.setAnswer("I01", "I01-03", infText());
        document.dispatchEvent(new Event("fand:informant"));
        if (!form || form.getAttribute("data-q") === "I01") location.reload();
        else if (infSel.value !== "docente" && form.getAttribute("data-q") === "E01") location.href = "FAND_Cuestionarios.html?q=C01";
        else if (infSel.value === "docente") location.href = "FAND_Cuestionarios.html?q=E01";
        else location.reload();
      });
      var totals = <?= json_encode(array_map(static fn (array $q): int => count($q['items']), $all)) ?>;
      F.mountGuide(document.getElementById("guide"));
function goNext() { var f = F.flow(); location.href = f.url || "FAND_Ficha_Usuario.html"; }
      var sf = document.getElementById("start-flow"); if (sf) sf.addEventListener("click", goNext);
      var nb = document.getElementById("next-step");
      if (nb) nb.addEventListener("click", function () {
        F.markQuestionnaireDone(form.getAttribute("data-q"));
        goNext();
      });
      document.querySelectorAll("[data-done]").forEach(function (n) {
        var who = F.doneBy(n.getAttribute("data-done")).map(function (i) { return F.informants[i]; });
        if (who.length) n.textContent = "✔ completado por: " + who.join(" y ");
        else if (F.questionnaireDone(n.getAttribute("data-done"))) n.textContent = "✔ completado";
      });
      document.querySelectorAll("[data-progress]").forEach(function (n) {
        var c = n.getAttribute("data-progress"), done = Object.keys(F.getAnswers(c)).length;
        if (!done && F.informantsWith(c).length) { n.textContent = "respondido por otro informante · " + totals[c] + " preguntas"; return; }
        n.textContent = done ? done + " de " + totals[c] + " respondidas" : totals[c] + " preguntas";
      });
    })();
  </script>
</body>
</html>
