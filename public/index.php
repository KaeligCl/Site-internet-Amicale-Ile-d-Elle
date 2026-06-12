<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader, [
    'cache' => false,
    'debug' => true,
]);

$router = new Router($twig);

$router->get('/', 'presentation.html.twig');
$router->get('/evenements', 'evenement.html.twig');
$router->get('/equipe', 'Equipe.html.twig');
$router->get('/location', 'location.html.twig');
$router->get('/location/gaufrier', 'ProduitsLocation.html.twig');
$router->get('/mentions-legales', 'Mentions.html.twig');

try {
    echo $router->dispatch($_SERVER['REQUEST_URI']);
} catch (Throwable $exception) {
    http_response_code(500);
    echo '<h1>Erreur systeme</h1>';
    echo '<p>' . htmlspecialchars($exception->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
}
