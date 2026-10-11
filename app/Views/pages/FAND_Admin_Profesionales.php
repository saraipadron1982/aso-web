<?php
/** @var array $pro */
$h = static fn ($v): string => htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <title>Administración de accesos · FAND</title>
  <style>
    :root { --teal: #0f766e; --ink: #1f2937; --soft: #f0fdfa; --line: #cbd5e1; }
    body { margin: 0; font-family: system-ui, "Segoe UI", sans-serif; color: var(--ink); line-height: 1.6; }
    header, main, footer { width: min(100% - 32px, 960px); margin: 0 auto; }
    header { padding: 22px 0 8px; } a { color: var(--teal); }
    .card { border: 1px solid var(--line); border-radius: 12px; padding: 18px 22px; margin: 18px 0; }
    .error { background: #fef2f2; border-left: 5px solid #b91c1c; padding: 10px 14px; border-radius: 8px; }
    .ok { background: #ecfdf5; border: 2px solid #059669; padding: 14px 18px; border-radius: 10px; }
    .ok code { font-size: 1.5rem; letter-spacing: .1em; font-weight: 700; }
    .notice { background: #fffbeb; border-left: 5px solid #d97706; padding: 12px 16px; border-radius: 8px; }
    label { display: block; font-weight: 700; margin: 10px 0 4px; }
    input[type=text], input[type=password], input[type=email] { width: 100%; box-sizing: border-box; padding: 10px; font-size: 1rem; border: 2px solid var(--line); border-radius: 10px; }
    input:disabled { background: #f1f5f9; }
    button { background: var(--teal); color: #fff; border: 0; padding: 10px 16px; border-radius: 10px; font-weight: 700; cursor: pointer; }
    button.secondary { background: #fff; color: var(--teal); border: 2px solid var(--teal); }
    button.danger { background: #b91c1c; }
    table { width: 100%; border-collapse: collapse; font-size: .92rem; }
    th, td { border: 1px solid var(--line); padding: 6px 8px; text-align: left; vertical-align: top; }
    th { background: var(--soft); } .form-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 12px; }
    form.inline { display: inline; }
  </style>
</head>
<body>
  <header>
    <a href="index.html">← Inicio</a> · <a href="FAND_Profesionales.html">Zona profesional</a>
    <h1>Administración de accesos</h1>
  </header>
  <main>
    <?php if (!empty($pro['flash'])): ?><p class="error" role="alert"><?= $h($pro['flash']) ?></p><?php endif; ?>

    <?php if (!$pro['configured']): ?>
      <section class="card">
        <h2 style="margin-top:0">Primer uso: crea la contraseña de administración</h2>
        <p class="notice">Hazlo tú ahora, antes de publicar la web: la primera persona que entre aquí fija la contraseña. Mínimo 10 caracteres.</p>
        <form method="post" autocomplete="off">
          <input type="hidden" name="csrf" value="<?= $h($pro['csrf']) ?>">
          <label for="clave">Contraseña</label><input type="password" id="clave" name="clave" minlength="10" required>
          <label for="clave2">Repite la contraseña</label><input type="password" id="clave2" name="clave2" minlength="10" required>
          <p><button name="accion" value="configurar">Guardar contraseña</button></p>
        </form>
      </section>
    <?php elseif (!$pro['admin']): ?>
      <section class="card">
        <h2 style="margin-top:0">Entrar como administración</h2>
        <form method="post">
          <input type="hidden" name="csrf" value="<?= $h($pro['csrf']) ?>">
          <label for="clave">Contraseña</label><input type="password" id="clave" name="clave" required>
          <p><button name="accion" value="entrar">Entrar</button></p>
        </form>
      </section>
    <?php else: ?>
      <?php if ($pro['newCode']): ?>
        <section class="ok" role="status">
          <p style="margin-top:0"><strong>Acceso creado para <?= $h($pro['newCode']['nombre']) ?>.</strong> Copia este código y envíaselo ahora: no se vuelve a mostrar (solo se guarda su huella).</p>
          <p><code><?= $h($pro['newCode']['codigo']) ?></code></p>
        </section>
      <?php endif; ?>

      <section class="card">
        <h2 style="margin-top:0">Autorizar a una persona</h2>
        <p>Solo tú puedes dar acceso. Cada persona recibe un código personal que puedes revocar cuando quieras.</p>
        <form method="post" autocomplete="off">
          <input type="hidden" name="csrf" value="<?= $h($pro['csrf']) ?>">
          <div class="form-row">
            <div><label for="nombre">Nombre y apellidos</label><input type="text" id="nombre" name="nombre" required maxlength="80"></div>
            <div><label for="email">Correo (opcional)</label><input type="email" id="email" name="email" maxlength="120"></div>
            <div>
              <label for="colegiado">Nº de colegiado <?= $pro['colegiadoRequerido'] ? '' : '(opcional, aún no se verifica)' ?></label>
              <input type="text" id="colegiado" name="colegiado" maxlength="30">
            </div>
          </div>
          <p><button name="accion" value="crear">Crear acceso y generar código</button></p>
        </form>
      </section>

      <section class="card">
        <h2 style="margin-top:0">Personas con acceso (<?= count($pro['list']) ?>)</h2>
        <?php if (!$pro['list']): ?><p>Todavía no has autorizado a nadie. Tú tienes acceso siempre como administración.</p><?php else: ?>
        <table>
          <tr><th>Nombre</th><th>Correo</th><th>Colegiado</th><th>Alta</th><th>Estado</th><th>Acciones</th></tr>
          <?php foreach ($pro['list'] as $p): ?>
            <tr>
              <td><?= $h($p['nombre']) ?></td><td><?= $h($p['email']) ?></td>
              <td><?= $p['colegiado'] !== '' ? $h($p['colegiado']) . ' (sin verificar)' : '—' ?></td>
              <td><?= $h($p['creado']) ?></td><td><?= $p['estado'] === 'activo' ? 'Activo' : 'Revocado' ?></td>
              <td>
                <form method="post" class="inline">
                  <input type="hidden" name="csrf" value="<?= $h($pro['csrf']) ?>"><input type="hidden" name="id" value="<?= $h($p['id']) ?>">
                  <?php if ($p['estado'] === 'activo'): ?><button class="secondary" name="accion" value="revocar">Revocar</button>
                  <?php else: ?><button class="secondary" name="accion" value="activar">Reactivar</button><?php endif; ?>
                  <button class="danger" name="accion" value="borrar" onclick="return confirm('¿Eliminar este acceso definitivamente?')">Eliminar</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
        <?php endif; ?>
      </section>

      <form method="post"><input type="hidden" name="csrf" value="<?= $h($pro['csrf']) ?>"><button class="secondary" name="accion" value="salir">Cerrar sesión de administración</button></form>
    <?php endif; ?>
  </main>
  <footer><p>Los accesos se guardan en <code>storage/acceso.json</code> (fuera del alcance de la web y excluido de Git).</p></footer>
</body>
</html>
