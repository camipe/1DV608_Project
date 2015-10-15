<?php
/**
 * Autoloading classes with composer https://getcomposer.org/doc/00-intro.md
 */
require_once __DIR__ .'/vendor/autoload.php';

$mainController = new bildflode\controller\MainController();
$htmlView = new bildflode\view\HTMLView();

$htmlView->render($mainController->run());
