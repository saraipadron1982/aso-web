<?php
declare(strict_types=1);

require_once __DIR__ . '/app/Models/PageCatalog.php';
require_once __DIR__ . '/app/Models/FichaCatalog.php';
require_once __DIR__ . '/app/Models/CuestionarioCatalog.php';
require_once __DIR__ . '/app/Models/ProAccess.php';
require_once __DIR__ . '/app/Controllers/ProController.php';
require_once __DIR__ . '/app/Controllers/PageController.php';

PageController::show($_SERVER['REQUEST_URI'] ?? '/');
