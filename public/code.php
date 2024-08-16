<?php

require '../vendor/autoload.php';

use Parsedown;


function listDirectories($dir) {
    // Get an array of files and directories inside the specified directory
    $items = scandir($dir);

    // Filter only directories, excluding '.' and '..'
    $directories = array_filter($items, function($item) use ($dir) {
        return is_dir($dir . DIRECTORY_SEPARATOR . $item) && $item !== '.' && $item !== '..';
    });

    return $directories;
}

function currentProblem()
{
    if (isset($_GET['problem'])) {
    	return $_GET['problem'];
    } else {
	    return false;
    }
}

function getProblemSolution() {

    $path = '../solutions/' . currentProblem() . '/README.md';

    if (is_file($path)) {
        $solution = file_get_contents($path);
    }

    return $solution;
}


$problem = currentProblem();

if ($problem) {
    function markdownToHtml($markdown) {
        $parsedown = new Parsedown();
        return $parsedown->text($markdown);
    }

    $solution = getProblemSolution();

    $readmeMarkdown = markdownToHtml($solution);



    echo <<<END
    <html>
    <head>
        <title>Leetcode Code</title>
    </head>
    <body>
        <h1><a href="/">Leetcode</a> | <a href="code.php">Code</a></h1>
        <h2>README</h2>
        <hr />
        $readmeMarkdown
    </body>
    <html>\n
    END;

} else {

    // Specify the directory
    $directory = '../solutions';

    // List directories inside the specified directory
    $directories = listDirectories($directory);

    // Print the list of directories
    $solutions = '';
    foreach ($directories as $dir) {
        $solutions.= '<a href="/code.php?problem='.$dir.'">' . $dir . PHP_EOL . "</a><br />";
    }

    echo <<<END
    <html>
    <head>
        <title>Leetcode Code</title>
    </head>
    <body>
        <h1><a href="/">Leetcode</a> | Code</h1>
        <hr />
        $solutions
    </body>
    <html>\n
    END;
}
