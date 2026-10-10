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
    footer { padding: 24px 0 40px; font-size: .9rem; }
  </style>
</head>
<body>
  <header>
    <a href="index.html">← Inicio</a> · <a href="FAND_Juegos_Interactivos.html">Todos los juegos</a> · <a href="FAND_Fichas_Tecnicas.html">Fichas técnicas</a> · <a href="FAND_Ficha_Usuario.html">Mi ficha</a>
    <h1>Test orientativo</h1>
    <p>Ocho actividades breves para explorar atención, control de impulsos, planificación y memoria. Puedes hacer solo las que quieras y en el orden que prefieras. Al terminar, <a href="FAND_Ficha_Usuario.html">Mi ficha</a> reúne los resultados.</p>
  </header>
  <main>
    <div class="notice"><strong>Importante:</strong> este test es una guía orientativa. <strong>No es un diagnóstico</strong> ni sustituye la evaluación de un profesional. Sus rangos son provisionales y están en estudio. Tus datos se guardan solo en este navegador.</div>

    <form class="age-box" id="age-form">
      <div>
        <label for="age">¿Qué edad tienes?</label>
        <input id="age" type="number" min="3" max="110" inputmode="numeric" placeholder="Años">
      </div>
      <button type="submit">Configurar los juegos para mi edad</button>
      <p id="age-status" aria-live="polite"></p>
    </form>

    <ol class="grid">
      <?php foreach ($tests as $code => [$name, $area, $time]): ?>
        <li>
          <div class="card">
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
      var input = document.getElementById("age"), status = document.getElementById("age-status");
      function show() {
        var c = FANDProfile.ageConfig();
        if (c) input.value = FANDProfile.ageYears();
        status.textContent = c
          ? "Listo: los juegos se abrirán configurados para la franja " + c.label + ". Podrás cambiar cualquier opción."
          : "Sin edad indicada: los juegos usan su configuración general.";
      }
      document.getElementById("age-form").addEventListener("submit", function (e) {
        e.preventDefault();
        FANDProfile.setAge(input.value);
        show();
      });
      show();
    })();
  </script>
</body>
</html>
