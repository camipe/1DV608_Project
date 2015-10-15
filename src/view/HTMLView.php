<?php
namespace bildflode\view;

class HTMLView
{
    public function render($body){
        echo '
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Bildflode</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        ' . $body . '
    </div>
</body>
</html>';
    }
}
