<?php
declare(strict_types=1);

/**
 * attia.net — front controller.
 *
 * Phase 1 scaffold. Routing, sign-in and the tree itself are not built yet; what exists here
 * is the entry point the host serves and a health endpoint so deploys can be verified
 * without a browser.
 */

const APP_NAME    = 'attia.net';
const APP_PHASE   = 1;
const APP_VERSION = '0.1.0';

$path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

if ($path === '/health') {
    header('Content-Type: application/json');
    header('Cache-Control: no-store');
    echo json_encode([
        'status'  => 'ok',
        'app'     => APP_NAME,
        'phase'   => APP_PHASE,
        'version' => APP_VERSION,
        'php'     => PHP_VERSION,
        'time'    => gmdate('c'),
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit;
}

http_response_code(200);
header('Content-Type: text/html; charset=utf-8');
header('X-Robots-Tag: noindex, nofollow');
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow">
<title>attia.net</title>
<style>
  :root { color-scheme: light dark; }
  body { margin:0; min-height:100vh; display:grid; place-items:center;
         font:16px/1.6 -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;
         background:#faf9f7; color:#2b2724; }
  @media (prefers-color-scheme: dark) { body { background:#17161a; color:#e8e6e3; } }
  main { max-width:32rem; padding:2rem; text-align:center; }
  h1 { font-size:1.5rem; font-weight:600; margin:0 0 .5rem; letter-spacing:-.01em; }
  p { margin:0; opacity:.7; }
  code { font-size:.85em; opacity:.6; }
</style>
</head>
<body>
<main>
  <h1>attia.net</h1>
  <p>A private family tree, being built.</p>
  <p><code>phase <?= APP_PHASE ?> · v<?= APP_VERSION ?></code></p>
</main>
</body>
</html>
