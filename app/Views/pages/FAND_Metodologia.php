<?php
/** @var array $pro */
$h = static fn ($v): string => htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
$cuest = CuestionarioCatalog::all();
?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>Cómo se puntúa todo · Zona profesional · FAND</title>
  <style>
    :root { --teal: #0f766e; --ink: #1f2937; --soft: #f0fdfa; --line: #cbd5e1; }
    body { margin: 0; font-family: system-ui, "Segoe UI", sans-serif; color: var(--ink); line-height: 1.6; }
    header, main, footer { width: min(100% - 32px, 1000px); margin: 0 auto; }
    header { padding: 22px 0 8px; } a { color: var(--teal); } h2 { color: var(--teal); margin-top: 0; }
    section { border: 1px solid var(--line); border-radius: 12px; padding: 18px 22px; margin: 20px 0; }
    .notice { background: #fffbeb; border-left: 5px solid #d97706; padding: 12px 16px; border-radius: 8px; margin: 16px 0; }
    table { width: 100%; border-collapse: collapse; font-size: .9rem; margin: 8px 0; }
    th, td { border: 1px solid var(--line); padding: 5px 8px; text-align: left; vertical-align: top; } th { background: var(--soft); }
    nav.index { display: flex; flex-wrap: wrap; gap: 8px; margin: 12px 0; }
    nav.index a { border: 1px solid var(--line); border-radius: 999px; padding: 4px 12px; text-decoration: none; background: var(--soft); }
    details { margin: 6px 0; } summary { cursor: pointer; font-weight: 700; }
    code { background: #f1f5f9; padding: 1px 5px; border-radius: 4px; }
    footer { padding: 24px 0 40px; font-size: .9rem; }
    @media print { nav.index { display: none; } details { display: block; } }
  </style>
</head>
<body>
  <header>
    <a href="FAND_Profesionales.html">← Zona profesional</a> · <a href="FAND_Fichas_Tecnicas.html">Fichas técnicas</a>
    <h1>Cómo funcionan y se puntúan los cuestionarios y las pruebas</h1>
    <p>Descripción completa del mecanismo para que puedas interpretarlo en tu propia valoración. Los valores de las tablas se leen directamente del motor de la web, así que reflejan lo que se aplica de verdad.</p>
  </header>
  <main>
    <div class="notice"><strong>Estado de validación:</strong> todos los umbrales y reglas son <strong>provisionales</strong>. No proceden de baremos y todavía no están validados por profesionales ni probados en un estudio piloto. La herramienta orienta; <strong>no diagnostica</strong>. La decisión clínica es siempre del profesional.</div>
    <nav class="index" aria-label="Apartados">
      <a href="#flujo">1. Flujo</a><a href="#cuestionarios">2. Cuestionarios</a><a href="#asignacion">3. Asignación de juegos</a><a href="#juegos">4. Juegos e indicadores</a><a href="#integracion">5. Integración y conclusión</a><a href="#limites">6. Límites</a>
    </nav>

    <section id="flujo">
      <h2>1. Flujo de la prueba</h2>
      <ol>
        <li><strong>Datos iniciales y registro I01</strong> (alias, edad, quién responde, antecedentes, accesibilidad, consentimiento). No se puntúa. La edad determina la versión de cada juego; si la persona indica sospecha de neurodivergencia, se anota su opinión.</li>
        <li><strong>Cuestionarios</strong> C01–C05 (y E01 si responde el centro educativo): afirmaciones valoradas de 0 a 4. Siempre antes de los juegos.</li>
        <li><strong>Juegos asignados</strong> según los resultados de los cuestionarios, con la configuración de edad bloqueada para que la prueba sea válida. Máximo <span id="p-max"></span> juegos.</li>
        <li><strong>Informe en «Mi ficha»</strong>: resultados por separado, contraste cuestionario–juego y conclusión orientativa.</li>
      </ol>
      <p>Todos los datos se guardan solo en el navegador de la persona; el servidor no recibe respuestas ni resultados.</p>
    </section>

    <section id="cuestionarios">
      <h2>2. Cuestionarios: cómo se puntúan</h2>
      <ul>
        <li><strong>Escala:</strong> cada afirmación se responde de 0 (nada conforme) a 4 (muy conforme). «No lo sé / No aplicable» es <em>dato ausente</em>, no cero.</li>
        <li><strong>Puntuación por dimensión:</strong> media de las afirmaciones válidas = suma / nº de respuestas válidas. Se muestra también sobre 100 (media/4·100) solo como equivalente descriptivo.</li>
        <li><strong>Interpretable:</strong> la dimensión solo se interpreta si hay al menos el <span id="p-share"></span> % de respuestas válidas.</li>
        <li><strong>Prioridad:</strong> media ≥ <span id="p-prio"></span> con al menos <span id="p-valid"></span> respuestas válidas = «conformidad alta». Solo sirve para priorizar qué explorar y para asignar juegos; no es un punto de corte clínico.</li>
        <li><strong>Informantes:</strong> la propia persona, familia y docente responden por separado y <em>nunca se promedian</em>. Una diferencia ≥ <span id="p-disc"></span> punto entre informantes se marca como discrepancia (puede reflejar contextos distintos).</li>
        <li><strong>Adaptación por informante y etapa:</strong> el cuestionario se redacta según quién responde y la etapa vital; el centro educativo (E01) lo contesta solo el docente.</li>
        <li><strong>C05 (historia e impacto):</strong> sus preguntas se reescriben con las características que salieron altas en C01–C04/E01 (hasta 3 dimensiones), para que se entienda de qué se habla.</li>
        <li>Los cuestionarios y los juegos <strong>nunca se suman</strong> entre sí.</li>
      </ul>
      <?php foreach ($cuest as $q): $code = $q['codigo']; if ($code === 'I01' || !$q['puntua']) continue;
        $dims = [];
        foreach ($q['items'] as $it) { $dims[$it['dimension']][] = $it; }
      ?>
        <details>
          <summary><?= $h($code) ?> · <?= $h($q['nombre']) ?> — <?= count($dims) ?> dimensiones, <?= count($q['items']) ?> ítems</summary>
          <table>
            <tr><th>Dimensión</th><th>Ítems</th><th>Enunciados</th></tr>
            <?php foreach ($dims as $name => $items): ?>
              <tr><td><?= $h($name) ?></td><td><?= count($items) ?></td><td><?= $h(implode(' · ', array_map(static fn (array $i): string => $i['codigo'] . ' ' . $i['texto'], $items))) ?></td></tr>
            <?php endforeach; ?>
          </table>
        </details>
      <?php endforeach; ?>
    </section>

    <section id="asignacion">
      <h2>3. Qué juegos se asignan y por qué</h2>
      <ul>
        <li>Cada dimensión con conformidad alta suma <strong>12 puntos</strong> a los juegos que exploran el mismo objetivo (tabla inferior). Cada preocupación indicada al inicio suma 10, 7… puntos a sus juegos.</li>
        <li>Se empieza por los <strong>2 juegos con más puntos</strong>. Sin prioridades se arranca con J04 y J07.</li>
        <li>Si un juego sale con indicadores fuera de rango, se propone el siguiente de contraste (tabla de transiciones). Máximo <span id="p-max2"></span> juegos.</li>
        <li><strong>Exclusiones por accesibilidad:</strong> menores de 6 años sin J02, J05, J06; dificultades de lectura sin J02 ni J06; problemas de audición sin J06; de color sin J02; motoras sin J08.</li>
        <li>El nivel de J03 y J04 depende de la edad exacta (≤5 años: 1 · 6–8: 2 · 9–12: 3 · 13–17: 4 · 18–59: 5 · ≥60: 6); J08 y J05 se configuran por franja (tabla). Ninguno es modificable por el usuario.</li>
      </ul>
      <h3>Dimensión de cuestionario → juego de contraste</h3>
      <table id="t-dimgames"><tr><th>Módulo</th><th>Dimensión</th><th>Juego</th><th>Objetivo</th></tr></table>
      <h3>Transiciones tras un resultado fuera de rango</h3>
      <table id="t-trans"><tr><th>Juego de origen</th><th>Siguiente</th><th>Motivo</th></tr></table>
      <h3>Niveles por franja de edad</h3>
      <table id="t-age"><tr><th>Franja</th><th>J08 (niveles · segundos)</th><th>J05 (niveles de torre)</th></tr></table>
    </section>

    <section id="juegos">
      <h2>4. Juegos: indicadores y umbrales orientativos</h2>
      <p>Cada indicador se compara con dos valores genéricos, sin ajuste por edad: el que marca <strong>posible dificultad</strong> («fuera del rango orientativo») y el que marca <strong>fortaleza</strong>. «Bajo» significa que es peor cuanto menor; «alto», peor cuanto mayor. Solo cuenta el <em>último intento válido</em> de cada juego. Una sesión incompleta o interrumpida no se usa.</p>
      <div id="t-rules"></div>
      <p>Cada juego tiene además su <a href="FAND_Fichas_Tecnicas.html">ficha técnica</a> con fundamento, mecánica, protocolo, limitaciones y referencias.</p>
    </section>

    <section id="integracion">
      <h2>5. Integración y conclusión</h2>
      <h3>Contraste cuestionario–juego</h3>
      <p>Para cada pareja dimensión–juego se compara la conformidad del cuestionario con el resultado del juego: <em>coinciden</em> (ambos señalan o ambos no), <em>dato contradictorio</em> (uno sí y otro no; se sugiere revisar fatiga, comprensión, compensación o que la tarea no refleja la vida diaria). Ninguna fuente invalida a la otra.</p>
      <h3>Puntuaciones de la conclusión</h3>
      <ul>
        <li><strong>Puntuación de cuestionarios (0–100):</strong> % de dimensiones de C01–C04 y E01 con ≥ <span id="p-valid2"></span> respuestas válidas cuya media es ≥ <span id="p-prio2"></span>.</li>
        <li><strong>Puntuación de juegos (0–100):</strong> % de indicadores evaluables fuera del rango orientativo (mínimo 6 indicadores en total).</li>
        <li><strong>Nivel de orientación:</strong> toma la más alta de las dos puntuaciones: &lt; 25 bajo · 25–49 medio · ≥ 50 alto.</li>
        <li>Las dos puntuaciones se muestran por separado y no se suman.</li>
      </ul>
      <h3>Sospecha de tipo</h3>
      <table>
        <tr><th>Categoría</th><th>Criterio</th><th>Texto del informe</th></tr>
        <tr><td>a</td><td>Señales de atención/ejecutivas (preocupaciones de atención, impulsividad, organización, memoria o percepción; cuestionarios con conformidad alta; o juegos fuera de rango) <em>sin</em> señales sociales</td><td>TDAH (atención, impulsividad y autorregulación)</td></tr>
        <tr><td>b</td><td>Señales sociales/sensoriales (preocupaciones sociales o sensoriales; C02, C03, C06 o dimensiones de E01 sin juego con conformidad alta) <em>sin</em> señales de atención</td><td>Autismo (comunicación social, rutinas, sensorial)</td></tr>
        <tr><td>c</td><td>Ambos grupos de señales</td><td>TDAH y autismo a la vez</td></tr>
        <tr><td>d</td><td>Hay motivos para consultar pero ninguno encaja en a o b</td><td>Evaluación más amplia</td></tr>
      </table>
      <p>Además se recoge, sin puntuarla, la sospecha que indicó la persona en I01-17/I01-18. Los motivos que activan la recomendación incluyen: preocupaciones sociales/sensoriales, C05 (historia evolutiva o impacto funcional) con conformidad alta y dimensiones de C02, C03, C06 o E01 sociales con conformidad alta.</p>
      <p><strong>Siempre</strong> se indica que no es un diagnóstico y que un resultado bajo no descarta nada.</p>
    </section>

    <section id="limites">
      <h2>6. Límites y estado de validación</h2>
      <ul>
        <li>Umbrales (2,5 de 4; 75 % de respuestas válidas; ≥ 3 respuestas; 1 punto de discrepancia; 25/50 de nivel) y franjas de edad: <strong>operativos y provisionales</strong>, pendientes de revisión por varios profesionales y de un estudio piloto antes de su aprobación.</li>
        <li>No hay normas por edad, percentiles ni puntos de corte clínicos; los rangos de los juegos son genéricos.</li>
        <li>Los resultados pueden verse alterados por sueño, ansiedad, medicación, visión/audición, dificultades motoras o comprensión de las instrucciones (factores que la persona puede registrar).</li>
        <li>No hay estudios de validez ni de fiabilidad todavía; úsese como material de apoyo a la entrevista y a las pruebas estandarizadas.</li>
      </ul>
    </section>
  </main>
  <footer><p>Uso profesional. Documento de metodología generado a partir del motor de la web. <a href="FAND_Profesionales.html">Volver a la zona profesional</a>.</p></footer>
  <script src="assets/js/fand-perfil.js"></script>
  <script>
    (function () {
      var F = window.FANDProfile, P = F.params;
      function set(id, v) { var e = document.getElementById(id); if (e) e.textContent = v; }
      function num(n) { return String(n).replace(".", ","); }
      set("p-max", P.MAX_GAMES); set("p-max2", P.MAX_GAMES);
      set("p-share", Math.round(P.Q_MIN_SHARE * 100)); set("p-prio", num(P.Q_PRIORITY)); set("p-prio2", num(P.Q_PRIORITY));
      set("p-valid", P.Q_MIN_VALID); set("p-valid2", P.Q_MIN_VALID); set("p-disc", P.Q_DISC);
      function row(t, cells, head) { var tr = document.createElement("tr"); cells.forEach(function (c) { var td = document.createElement(head ? "th" : "td"); td.textContent = c; tr.append(td); }); t.append(tr); }
      P.DIM_GAMES.forEach(function (m) { row(document.getElementById("t-dimgames"), [m[0], m[1], m[2] + " " + F.games[m[2]], m[3]]); });
      Object.keys(P.TRANSITIONS).forEach(function (k) { P.TRANSITIONS[k].forEach(function (t) { row(document.getElementById("t-trans"), [k + " " + F.games[k], t[0] + " " + F.games[t[0]], t[1]]); }); });
      Object.keys(P.AGE_CONFIG).forEach(function (b) {
        var c = P.AGE_CONFIG[b];
        row(document.getElementById("t-age"), [F.bandLabels[b], c.circle.levels + " niveles · " + c.circle.seconds + " s" + (c.untimed ? " (sin cronómetro estricto)" : ""), "niveles 1–" + c.towerLevels]);
      });
      var rules = document.getElementById("t-rules");
      Object.keys(F.rules).sort().forEach(function (code) {
        var d = document.createElement("details"), s = document.createElement("summary"), t = document.createElement("table");
        s.textContent = code + " · " + F.games[code] + " (" + F.rules[code].length + " indicadores)"; d.append(s); d.append(t);
        row(t, ["Indicador", "Sentido", "Posible dificultad", "Fortaleza"], true);
        F.rules[code].forEach(function (r) { row(t, [r[1], r[2] === "low" ? "peor si es bajo" : "peor si es alto", (r[2] === "low" ? "< " : "> ") + num(r[3]), (r[2] === "low" ? "≥ " : "≤ ") + num(r[4])]); });
        rules.append(d);
      });
    })();
  </script>
</body>
</html>
