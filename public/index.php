<?php

require '../vendor/autoload.php';

use Parsedown;

function markdownToHtml($markdown) {
    $parsedown = new Parsedown();
    return $parsedown->text($markdown);
}


$path = dirname(__FILE__);

$readmePath = realpath($path . '/../README.md');
$readmeContents = file_get_contents($readmePath);
$readmeMarkdown = markdownToHtml($readmeContents);

echo <<<END
<html>
<head>
    <title>Leetcode Code</title>
</head>
<body>
    <h1><a href="/">Leetcode</a></h1>
    <hr />
    <ul>
        <li><a href="database.php">Database</a></li>
        <li><a href="code.php">Code</a></li>
    </ul>
    <hr />
    $readmeMarkdown
</body>
<html>\n
END;

