<?php
require_once __DIR__ . '/../vendor/autoload.php';
use ShapeGenerator\Application;

$pageTemplate = <<<EOT
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Christmas shapes generator</title>
</head>
<body>
  %s
</body>
</html>
EOT;

$resultTemplate = <<<EOT
<pre>%s</pre>
EOT;

$erroTemplate = <<<EOT
<span style="background-color: red">
  %s
</span>
EOT;

$size = isset($_GET['size']) ? $_GET['size'] : null;
try {
    $shapes = Application::run($size);
    $result = sprintf($resultTemplate, $shapes);
} catch (\Exception $ex) {
    http_response_code(500);
    $result = sprintf($erroTemplate, $ex->getMessage());
}
printf($pageTemplate, $result);
