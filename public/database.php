<?php

function convertToTitleCase($problem)
{
    $words = explode('-', $problem);

    // Capitalize the first letter of each word
    $words = array_map('ucfirst', $words);
    $formattedProblem = implode(' ', $words);

    return $formattedProblem;
}

function listProblems()
{
    $directory = '../database';
    $files = scandir($directory);

    $output = '';
    foreach ($files as $file) {
	if (basename($file) == 'create_and_populate.sql') {
	    continue;
	}

	// Check if the file ends with '.sql'
	if (pathinfo($file, PATHINFO_EXTENSION) == 'sql') {
	    // Remove the '.sql' suffix
	    $filenameWithoutSuffix = basename($file, '.sql');
	    $output.= '<a href="/database.php?problem='.$filenameWithoutSuffix.'">' . $filenameWithoutSuffix . "</a><br />";
	}
}

    return $output;
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
    $solution = file_get_contents('../solutions/' . currentProblem() . '.sql');
    return $solution;
}


$problem = currentProblem();

// Database connection parameters
$dsn = 'mysql:host=localhost;dbname=leetcode-' . $problem; // DSN (Data Source Name)
$username = getenv('DB_USER'); // Database username
$password = getenv('DB_PASS'); // Database password

try {

    if ($problem) {

        // Create a PDO instance
        $pdo = new PDO($dsn, $username, $password);

        // Set PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to find salespersons with no orders to company "RED"
        $sql = getProblemSolution();

        // Prepare and execute the query
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Fetch and display results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($results) > 0) {
	        $resultsOutput = var_export($results, true);
	        $title = convertToTitleCase($problem);
            echo <<<END
<html>
<head>
    <title>$title</title>
</head>
</body>
    <h1>
	<a href="/">Leetcode</a> |
	<a href="/database.php">Database</a> |
	<a href="https://leetcode.com/problems/$problem/description/" target="_blank">$title</a>
    </h1>
    <a href="http://phpmyadmin:8080/index.php?route=/database/structure&db=leetcode-combine-two-tables" target="_blank">PHPMYADMIN</a>
    <hr />
    <pre>$sql</pre>
    <pre>$resultsOutput</pre>
    <hr />
</body>
<html>\n
END;

	    }

    } else {

        $problems = listProblems();
        echo <<<END
<html>
<head>
    <title>$title</title>
</head>
</body>
    <h1><a href="/">Leetcode</a> | Database</h1>
    <a href="http://phpmyadmin:8080/index.php?route=/database/structure" target="_blank">PHPMYADMIN</a>
    <hr />
    $problems
</body>
<html>\n
END;

    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo = null;

