<?php
$all = CuestionarioCatalog::all();
$req = strtoupper((string) ($_GET['q'] ?? ''));
$sel = $all[$req] ?? null;
$scale = [0 => 'Nunca', 1 => 'Rara vez', 2 => 'A veces', 3 => 'Con frecuencia', 4 => 'Casi siempre'];
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
    <?php if (!$sel): ?>
      <p>Elige un módulo. Los cinco primeros (C01–C05) usan una escala de frecuencia y se resumen por dimensión en <a href="FAND_Ficha_Usuario.html">Mi ficha</a>. Los módulos opcionales (C06–C15) recogen contexto con respuestas libres, sin puntuación.</p>
      <ul class="grid">
        <?php foreach ($all as $code => $q): ?>
          <li><a href="FAND_Cuestionarios.html?q=<?= $code ?>"><strong><?= $code ?> · <?= htmlspecialchars($q['nombre']) ?></strong>
            <small><span class="tag"><?= $q['opcional'] ? 'Módulo opcional · contexto' : 'Escala de frecuencia' ?></span> · <span data-progress="<?= $code ?>"></span></small></a></li>
        <?php endforeach; ?>
      </ul>
    <?php else: ?>
      <?php if ($sel['puntua']): ?>
        <p>¿Con qué frecuencia te ocurre o describe tu caso cada frase? Elige «No sé / no aplica» si no puedes responder: no cuenta como cero.</p>
      <?php else: ?>
        <p>Responde con tus palabras. Estas respuestas dan contexto al informe y no se puntúan.</p>
      <?php endif; ?>
      <form id="qform" data-q="<?= $sel['codigo'] ?>" onsubmit="return false">
        <?php foreach ($sel['dimensiones'] as $di => $dim): ?>
          <fieldset>
            <legend><?= htmlspecialchars($dim['nombre']) ?></legend>
            <?php foreach ($dim['items'] as $item): $n = htmlspecialchars($item['codigo']); ?>
              <div class="item">
                <p id="t-<?= $n ?>"><?= htmlspecialchars($item['texto']) ?></p>
                <?php if ($sel['puntua']): ?>
                  <div class="opts" role="radiogroup" aria-labelledby="t-<?= $n ?>">
                    <?php foreach ($scale as $v => $label): ?>
                      <label><input type="radio" name="<?= $n ?>" value="<?= $v ?>"> <?= $label ?></label>
                    <?php endforeach; ?>
                    <label><input type="radio" name="<?= $n ?>" value="na"> No sé / no aplica</label>
                  </div>
                <?php else: ?>
                  <textarea name="<?= $n ?>" aria-labelledby="t-<?= $n ?>" maxlength="500"></textarea>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </fieldset>
        <?php endforeach; ?>
      </form>
      <p id="saved" aria-live="polite">Las respuestas se guardan automáticamente.</p>
      <p><a class="btn" href="FAND_Ficha_Usuario.html">Ver Mi ficha</a> <a href="FAND_Cuestionarios.html">Otros módulos</a></p>
    <?php endif; ?>
  </main>
  <footer><p>FAND · Alianza para la Neurodivergencia. Material de investigación; no constituye diagnóstico.</p></footer>
  <script src="assets/js/fand-perfil.js"></script>
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
        function persist(target) {
          F.setAnswer(code, target.name, target.value.trim ? target.value.trim() : target.value);
          document.getElementById("saved").textContent = "Guardado.";
        }
        form.addEventListener("change", function (e) { if (e.target.type === "radio") persist(e.target); });
        form.addEventListener("input", function (e) {
          if (e.target.tagName !== "TEXTAREA") return;
          clearTimeout(timer); timer = setTimeout(function () { persist(e.target); }, 400);
        });
      }
      var totals = <?= json_encode(array_map(static fn (array $q): int => array_sum(array_map(static fn (array $d): int => count($d['items']), $q['dimensiones'])), $all)) ?>;
      document.querySelectorAll("[data-progress]").forEach(function (n) {
        var c = n.getAttribute("data-progress"), done = Object.keys(F.getAnswers(c)).length;
        n.textContent = done ? done + " de " + totals[c] + " respondidas" : totals[c] + " preguntas";
      });
    })();
  </script>
</body>
</html>
