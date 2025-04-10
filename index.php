<?php

require_once 'controllers/GameController.php';
require_once 'controllers/PlayerController.php';
require_once 'controllers/AssignmentController.php';
echo "hello";
// Simple routing example
if ($_SERVER['REQUEST_URI'] === '/games') {  echo "hello";
    $controller = new GameController();
    $controller->index();
} elseif ($_SERVER['REQUEST_URI'] === '/players') {
    $controller = new PlayerController();
    $controller->index();
} elseif ($_SERVER['REQUEST_URI'] === '/assignments') {
    $controller = new AssignmentController();
    $controller->index();
} elseif ($_SERVER['REQUEST_URI'] === '/games/add') {
    $controller = new GameController();
    $controller->add();
} elseif ($_SERVER['REQUEST_URI'] === '/players/add') {
    $controller = new PlayerController();
    $controller->add();
} elseif ($_SERVER['REQUEST_URI'] === '/assignments/assign') {
    $controller = new AssignmentController();
    $controller->assign();
}
?>
