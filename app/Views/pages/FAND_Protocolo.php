<?php
$file = dirname(__DIR__, 2) . '/Data/protocolo_integral.xml';
$xml = is_file($file) ? simplexml_load_file($file) : false;
$sections = $xml ? $xml->seccion : [];
?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Protocolo: cómo funcionan los juegos · FAND</title>
  <style>
    :root { --teal: #0f766e; --ink: #1f2937; --soft: #f0fdfa; --line: #cbd5e1; }
    body { margin: 0; font-family: system-ui, "Segoe UI", sans-serif; color: var(--ink); line-height: 1.65; }
    header, main, footer { width: min(100% - 32px, 900px); margin: 0 auto; }
    header { padding: 22px 0 8px; }
    a { color: var(--teal); }
    .notice { background: #fffbeb; border-left: 5px solid #d97706; padding: 12px 16px; border-radius: 8px; margin: 16px 0; }
    nav.toc { background: var(--soft); border: 1px solid var(--line); border-radius: 12px; padding: 12px 20px; margin: 16px 0; }
    nav.toc ol { margin: 6px 0; padding-left: 0; list-style: none; columns: 2 260px; }
    nav.toc a { display: inline-block; padding: 4px 0; }
    section { border: 1px solid var(--line); border-radius: 12px; padding: 4px 22px 12px; margin: 18px 0; }
    h2 { color: var(--teal); font-size: 1.25rem; }
    footer { padding: 24px 0 40px; font-size: .9rem; }
    @media print { nav.toc { display: none; } section { break-inside: avoid; } }
  </style>
</head>
<body>
  <header>
    <a href="index.html">← Inicio</a> · <a href="FAND_Test_Orientativo.html">Test orientativo</a> · <a href="FAND_Fichas_Tecnicas.html">Fichas técnicas</a> · <a href="FAND_Ficha_Usuario.html">Mi ficha</a>
    <h1>Protocolo: cómo funcionan los juegos</h1>
    <p>Cuestionarios, ocho juegos, métricas y algoritmo adaptativo. Documento de diseño para investigación<?= $xml ? ' · versión ' . htmlspecialchars((string) $xml['version']) : '' ?>.</p>
  </header>
  <main>
    <div class="notice"><strong>Importante:</strong> FAND es una herramienta de orientación, <strong>no un diagnóstico</strong>. Las configuraciones de niveles, tiempos y edades son propuestas piloto, no baremos ni reglas clínicas validadas.</div>
    <section id="recorrido" aria-labelledby="h-recorrido">
      <h2 id="h-recorrido">Recorrido FAND en cuatro pasos (protocolo consolidado)</h2>
      <p>Resume lo que coincide en todas las versiones del protocolo (v2 integral, v3, v5 y v7) y es lo que implementa la web.</p>
      <ol>
        <li><strong>Datos iniciales (I01).</strong> Edad, quién responde, motivo de consulta, antecedentes, idioma y accesibilidad. No se puntúa.</li>
        <li><strong>Cuestionarios.</strong> Afirmaciones con escala 0–4 y «No lo sé / No aplicable» (dato ausente, nunca cero). Se puntúa por dimensión, con un mínimo del 75 % de respuestas válidas. Las dimensiones no se suman entre sí.</li>
        <li><strong>Juegos asignados.</strong> Los cuestionarios priorizan 2 juegos iniciales y, según el resultado, se añaden 1–3 complementarios (máximo 5, sin repetir ni entrar en bucles). Se comprueba comprensión, validez y fatiga tras cada juego.</li>
        <li><strong>Informe en Mi ficha.</strong> Datos por fuente, dimensiones, juegos realizados, coincidencias y contradicciones entre cuestionarios y juegos, límites y motivos concretos de orientación.</li>
      </ol>
      <h3>Reglas que no cambian</h3>
      <ul>
        <li>Es orientación, no diagnóstico; ninguna salida confirma ni descarta TEA, TDAH u otras condiciones.</li>
        <li>La recomendación profesional se decide por historia, características e impacto; los juegos la contextualizan pero nunca la anulan.</li>
        <li>Ningún juego mide directamente los criterios nucleares del TEA: esa vía se apoya en C02, C03, C05, C06 e historia del desarrollo.</li>
        <li>Si la tarea no se entiende o hay barreras de acceso, el resultado no se etiqueta como bajo: se adapta, se pausa o se ofrece otra prueba.</li>
        <li>Se puede parar en cualquier momento; parar no equivale a descartar nada.</li>
        <li>Las diferencias entre informantes se documentan y no se promedian.</li>
      </ul>
      <h3>Quién responde según la edad (propuesta piloto)</h3>
      <ul>
        <li>Hasta 5 años: familiar o cuidador; sin autoinforme. 6–11: familiar y, si es posible, docente.</li>
        <li>12–16: la propia persona, con observador si es posible y respetando su privacidad. 17 o más: la propia persona; observador opcional.</li>
      </ul>
      <h3>Categorías de salida</h3>
      <p>(a) explorar atención y autorregulación; (b) explorar comunicación social, patrones y desarrollo; (c) ambas vías; (d) evaluación más amplia; (e) datos insuficientes o sin motivos adicionales en este cribado limitado. Ninguna categoría excluye condiciones.</p>
      <p class="notice">Los umbrales, las edades y los textos por etapa son provisionales y requieren validación antes de cualquier uso de cribado.</p>
    </section>
    <?php if (!$xml): ?>
      <p>El protocolo no está disponible en este momento.</p>
    <?php else: ?>
      <nav class="toc" aria-label="Índice del protocolo">
        <strong>Índice</strong>
        <ol>
          <?php foreach ($sections as $s): ?>
            <li><a href="#s<?= (int) $s['numero'] ?>"><?= htmlspecialchars((string) $s['titulo']) ?></a></li>
          <?php endforeach; ?>
        </ol>
      </nav>
      <?php foreach ($sections as $s): ?>
        <section id="s<?= (int) $s['numero'] ?>" aria-labelledby="h<?= (int) $s['numero'] ?>">
          <h2 id="h<?= (int) $s['numero'] ?>"><?= htmlspecialchars((string) $s['titulo']) ?></h2>
          <?php foreach ($s->parrafo as $p): ?>
            <p><?= htmlspecialchars((string) $p) ?></p>
          <?php endforeach; ?>
        </section>
      <?php endforeach; ?>
    <?php endif; ?>
    <p>Las fichas técnicas de cada juego están en <a href="FAND_Fichas_Tecnicas.html">Fichas técnicas</a>.</p>
  </main>
  <footer>
    <p>FAND · Alianza para la Neurodivergencia. Material de apoyo; no constituye diagnóstico.</p>
  </footer>
</body>
</html>
