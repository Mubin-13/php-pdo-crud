<?php

function writeLogToFile($message)
{
	$logFile = 'error.log';
	$logMessage = date('[Y-m-d H:i:s]') . ' ' . $message . PHP_EOL;
	file_put_contents($logFile, $logMessage, FILE_APPEND);
}

try {
	$database_username = 'root';
	$database_password = '';
	$pdo_conn = new PDO('mysql:host=localhost;dbname=blog_samples', $database_username, $database_password);

	// Enable PDO error reporting by setting the error mode attribute.
	// By setting PDO::ERRMODE_EXCEPTION, PDO will throw exceptions when errors occur,
	// allowing you to catch and handle them.
	$pdo_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	// Handle the exception
	echo "An error occurred: " . $e->getMessage();
	// Additional error handling or logging can be performed here

	writeLogToFile($errorMessage); // Call a function to write to the log file
	// Handle the error (e.g., display an error message to the user or perform other actions)
}
