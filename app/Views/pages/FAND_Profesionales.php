<?php
/** @var array $pro */
$h = static fn ($v): string => htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>Zona profesional · FAND</title>
  <style>
    :root { --teal: #0f766e; --ink: #1f2937; --soft: #f0fdfa; --line: #cbd5e1; }
    body { margin: 0; font-family: system-ui, "Segoe UI", sans-serif; color: var(--ink); line-height: 1.6; }
    header, main, footer { width: min(100% - 32px, 820px); margin: 0 auto; }
    header { padding: 22px 0 8px; } a { color: var(--teal); } h1 { margin: 8px 0; }
    .card { border: 1px solid var(--line); border-radius: 12px; padding: 18px 22px; margin: 18px 0; }
    .notice { background: #fffbeb; border-left: 5px solid #d97706; padding: 12px 16px; border-radius: 8px; margin: 16px 0; }
    .error { background: #fef2f2; border-left: 5px solid #b91c1c; padding: 10px 14px; border-radius: 8px; }
    label { display: block; font-weight: 700; margin: 10px 0 4px; }
    input[type=text], input[type=password] { width: 100%; box-sizing: border-box; padding: 12px; font-size: 1.1rem; border: 2px solid var(--line); border-radius: 10px; letter-spacing: .08em; }
    button, .btn { background: var(--teal); color: #fff; border: 0; padding: 12px 20px; border-radius: 10px; font-weight: 700; font-size: 1rem; cursor: pointer; text-decoration: none; display: inline-block; }
    button.secondary { background: #fff; color: var(--teal); border: 2px solid var(--teal); }
    .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 14px; }
    .grid a.tile { display: block; border: 1px solid var(--line); border-radius: 12px; padding: 16px; text-decoration: none; color: var(--ink); background: var(--soft); }
    .grid a.tile:hover, .grid a.tile:focus-visible { border-color: var(--teal); }
    footer { padding: 24px 0 40px; font-size: .9rem; }
  </style>
</head>
<body>
  <header>
    <a href="index.html">← Inicio</a>
    <h1>Zona profesional</h1>
    <p>Fichas técnicas de los juegos y explicación de cómo se puntúan los cuestionarios y las pruebas. Acceso restringido a profesionales autorizados.</p>
  </header>
  <main>
    <?php if (!empty($pro['flash'])): ?><p class="error" role="alert"><?= $h($pro['flash']) ?></p><?php endif; ?>

    <?php if ($pro['authorized']): ?>
      <section class="card">
        <h2 style="margin-top:0">Hola, <?= $h($pro['name']) ?></h2>
        <div class="grid">
          <a class="tile" href="FAND_Metodologia.html"><strong>Cómo se puntúa todo</strong><br>Cuestionarios, juegos, umbrales, asignación de juegos y conclusión.</a>
          <a class="tile" href="FAND_Fichas_Tecnicas.html"><strong>Fichas técnicas de los juegos</strong><br>Fundamento, mecánica, indicadores, limitaciones y referencias (J01–J08).</a>
          <a class="tile" href="FAND_Protocolo.html"><strong>Protocolo</strong><br>Cómo se encadenan los pasos de la prueba.</a>
          <?php if ($pro['admin']): ?><a class="tile" href="FAND_Admin_Profesionales.html"><strong>Administración de accesos</strong><br>Autorizar o revocar profesionales.</a><?php endif; ?>
        </div>
        <form method="post" style="margin-top:16px">
          <input type="hidden" name="csrf" value="<?= $h($pro['csrf']) ?>">
          <button class="secondary" name="accion" value="salir">Cerrar sesión</button>
        </form>
      </section>
    <?php else: ?>
      <section class="card">
        <h2 style="margin-top:0">Acceder con tu código personal</h2>
        <form method="post" autocomplete="off">
          <input type="hidden" name="csrf" value="<?= $h($pro['csrf']) ?>">
          <input type="hidden" name="next" value="<?= $h($pro['next']) ?>">
          <label for="codigo">Código de acceso</label>
          <input type="text" id="codigo" name="codigo" placeholder="XXXX-XXXX-XXXX" required maxlength="30" autocapitalize="characters">
          <p><button name="accion" value="entrar">Entrar</button></p>
        </form>
        <p>¿No tienes código? Solicítalo a la persona responsable del proyecto. El acceso se concede de forma individual y puede revocarse.</p>
        <p class="notice">Próximamente: acceso directo para profesionales con número de colegiado. De momento no se solicita.</p>
      </section>
    <?php endif; ?>
  </main>
  <footer><p>FAND · Alianza para la Neurodivergencia. Esta información es de uso profesional: no sustituye el criterio clínico.</p></footer>
</body>
</html>
