<?php
$fichas = FichaCatalog::all();
$requested = strtoupper((string) ($_GET['juego'] ?? ''));
$selected = isset($fichas[$requested]) ? $requested : null;
?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fichas técnicas de los juegos · FAND</title>
  <style>
    :root { --teal: #0f766e; --ink: #1f2937; --soft: #f0fdfa; --line: #cbd5e1; }
    body { margin: 0; font-family: system-ui, "Segoe UI", sans-serif; color: var(--ink); line-height: 1.6; background: #fff; }
    header, main, footer { width: min(100% - 32px, 1000px); margin: 0 auto; }
    header { padding: 22px 0 8px; }
    a { color: var(--teal); }
    h1 { margin: 8px 0; } h2 { margin-top: 0; color: var(--teal); }
    .notice { background: #fffbeb; border-left: 5px solid #d97706; padding: 12px 16px; border-radius: 8px; margin: 16px 0; }
    nav.index { display: flex; flex-wrap: wrap; gap: 8px; margin: 16px 0; }
    nav.index a { border: 1px solid var(--line); border-radius: 999px; padding: 6px 14px; text-decoration: none; background: var(--soft); }
    article { border: 1px solid var(--line); border-radius: 12px; padding: 18px 22px; margin: 22px 0; }
    details { margin-top: 12px; }
    summary { cursor: pointer; font-weight: 700; padding: 6px 0; }
    .sub { margin-left: 14px; border-left: 3px solid var(--soft); padding-left: 14px; }
    h3, h4, h5, h6 { margin: 14px 0 4px; }
    p { margin: 4px 0; }
    .ficha-table { width: 100%; border-collapse: collapse; font-size: .92rem; margin: 8px 0; }
    .ficha-table th, .ficha-table td { border: 1px solid var(--line); padding: 5px 8px; text-align: left; vertical-align: top; }
    .ficha-table th { background: var(--soft); }
    .gallery { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 16px; margin: 18px 0; }
    .tile { display: flex; flex-direction: column; gap: 4px; border: 1px solid var(--line); border-radius: 14px; padding: 10px; text-decoration: none; color: var(--ink); background: #fff; }
    .tile:hover, .tile:focus-visible { border-color: var(--teal); box-shadow: 0 2px 10px rgba(15,118,110,.18); }
    .tile img, .hero { width: 100%; height: auto; border-radius: 10px; display: block; }
    .tile span { font-size: .9rem; color: #475569; }
    .hero { max-width: 520px; margin: 8px 0 12px; border: 1px solid var(--line); }
    .actions-row { display: flex; flex-wrap: wrap; gap: 10px 16px; align-items: center; margin: 12px 0; }
    .btn { background: var(--teal); color: #fff; padding: 10px 18px; border-radius: 10px; text-decoration: none; font-weight: 700; }
    .btn:hover, .btn:focus-visible { background: #115e59; }
    nav.index a[aria-current] { background: var(--teal); color: #fff; }
    .meta { font-size: .9rem; color: #475569; }
    footer { padding: 24px 0 40px; font-size: .9rem; }
    @media print { nav.index, details > summary { display: none; } details { display: block; } }
  </style>
</head>
<body>
  <header>
    <a href="index.html">← Inicio</a> · <a href="FAND_Juegos_Interactivos.html">Juegos</a> · <a href="FAND_Ficha_Usuario.html">Mi ficha</a>
    <h1>Fichas técnicas de los juegos</h1>
    <p>Documentación para profesionales: fundamento, mecánica, indicadores, protocolo, limitaciones y referencias de cada juego.</p>
  </header>
  <main>
    <div class="notice"><strong>Importante:</strong> los juegos de FAND son protocolos de investigación no validados y no disponen de baremos propios. No diagnostican ni sustituyen una evaluación profesional.</div>
    <nav class="index" aria-label="Fichas">
      <?php foreach ($fichas as $code => $ficha): ?>
        <a href="FAND_Fichas_Tecnicas.html?juego=<?= htmlspecialchars($code) ?>"<?= $code === $selected ? ' aria-current="page"' : '' ?>><?= htmlspecialchars($code) ?> · <?= htmlspecialchars((string) $ficha->nombre) ?></a>
      <?php endforeach; ?>
    </nav>
    <?php if ($selected === null): ?>
      <div class="gallery">
        <?php foreach ($fichas as $code => $ficha): ?>
          <a class="tile" href="FAND_Fichas_Tecnicas.html?juego=<?= htmlspecialchars($code) ?>">
            <img src="assets/img/juegos/<?= htmlspecialchars($code) ?>.svg" alt="Ilustración del juego <?= htmlspecialchars((string) $ficha->nombre) ?>" loading="lazy">
            <strong><?= htmlspecialchars($code) ?> · <?= htmlspecialchars((string) $ficha->nombre) ?></strong>
            <span><?= htmlspecialchars((string) $ficha->area_principal) ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <?php foreach ($fichas as $code => $ficha): ?>
      <?php if ($code !== $selected) { continue; } ?>
      <article id="<?= htmlspecialchars($code) ?>">
        <h2><?= htmlspecialchars($code) ?> · <?= htmlspecialchars((string) $ficha->nombre) ?></h2>
        <img class="hero" src="assets/img/juegos/<?= htmlspecialchars($code) ?>.svg" alt="Ilustración del juego <?= htmlspecialchars((string) $ficha->nombre) ?>">
        <p class="meta">Área principal: <?= htmlspecialchars((string) $ficha->area_principal) ?> · Versión: <?= htmlspecialchars((string) $ficha['version']) ?> · Estado: <?= htmlspecialchars(str_replace('_', ' ', (string) $ficha['estado'])) ?></p>
        <p><strong>Fundamento:</strong> <?= htmlspecialchars((string) $ficha->fundamento) ?></p>
        <p><strong>Mecánica:</strong> <?= htmlspecialchars((string) $ficha->mecanica) ?></p>
        <p class="noprint actions-row"><a class="btn" href="FAND_Juegos_Interactivos.html?jugar=<?= htmlspecialchars($code) ?>">Empezar a jugar</a> <a href="FAND_Juegos_Interactivos.html#juegos">Otros juegos</a> · <a href="FAND_Fichas_Tecnicas.html">Ver otras fichas de juegos</a></p>
        <details open>
          <summary>Ficha completa</summary>
          <?= FichaCatalog::render($ficha) ?>
        </details>
      </article>
    <?php endforeach; ?>
  </main>
  <footer>
    <p>FAND · Alianza para la Neurodivergencia. Estas fichas son material de apoyo y no constituyen diagnóstico.</p>
  </footer>
</body>
</html>
