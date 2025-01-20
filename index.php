<?php

use App\Router;
use PHPUnit\Event\Code\ThrowableBuilder;
use App\Services\CSRFToken;

require_once __DIR__.'/vendor/autoload.php';

set_exception_handler(function(Throwable $exception) {
    header('Location: /error/server-error');
    die;
});

if (!ini_get('session.use_strict_mode')) {
    ini_set('session.use_strict_mode', '1');
}
// https://cheatsheetseries.owasp.org/cheatsheets/Session_Management_Cheat_Sheet.html#secure-attribute
session_set_cookie_params([
    'lifetime' => 0,
    'secure' => true,
    'httponly' => true,
    'samesite' => 'Strict',
]);
//https://cheatsheetseries.owasp.org/cheatsheets/Session_Management_Cheat_Sheet.html#session-id-name-fingerprinting
session_name('id');

session_start();
// https://cheatsheetseries.owasp.org/cheatsheets/Session_Management_Cheat_Sheet.html#session-id-generation-and-verification-permissive-and-strict-session-management
$inactivityLimit = 1800;

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $inactivityLimit)) {
    session_unset();
    session_destroy();
    header('Location: /signin/login');
    exit();
}

$_SESSION['last_activity'] = time();

CSRFToken::init();

$router = new Router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

$controller = $router->getController();
$method = $router->getMethod();

if($controller !== null && method_exists($controller, $method)) {
    $data = $controller->{$method}();
}

$page = __DIR__ . "/Views/pages/404.php";

if($router->getPath() === '/error/server-error') {
    $page = __DIR__ . '/Views/pages/500.php';
}

if(isset($data)) {
    $file = __DIR__ . "/Views/pages/{$data['page']}.php";
    if(file_exists($file)) {
        $page = $file;
        extract($data['variables'] ?? []);
    }
}

require_once 'Views/base_view.php';