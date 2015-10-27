<?php
namespace bildflode\view;

class HTMLView
{
    /**
     * Renders the page
     * @param  string $body Main body of the page
     * @return void
     */
    public function render($body){
        echo '
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Bildflode</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"
</head>
<body>
    <div class="header">
        <h1>Bildflöde</h1>
    </div>
    <div class="container-fluid">
        ' . $body . '
    </div>
</body>
</html>';
    }
}
