<?php

$startTime = hrtime(true);

require '../vendor/autoload.php';

error_reporting(E_ALL);

use Application\MyComponents\{AppCanvas, MyContent, MainMenu};
use PHPUI\Components\UIDebug;
use PHPUI\Renderers\UIPHPRenderer;

$canvas = new AppCanvas();
$canvas->addComponent(
    new MyContent(),
    new MainMenu(),
    new UIDebug($startTime)
);

$renderer = new UIPHPRenderer();
$renderer->setTemplatePath(__DIR__ . '/../application/');

// $renderer->getResourceLoader()->ignoreComponent(UIAppCanvas::class, UIJsResource::class, UICssResource::class);

echo $renderer->render($canvas);
