<?php
require_once 'vendor/autoload.php'; // Include the Composer autoloader

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

// Start a WebDriver session
$webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', [
    'platform' => 'WINDOWS',
    'browserName' => 'chrome',
    'version' => 'latest',
]);

// Open the index.php file
$webDriver->get('C:\xampp\htdocs\sadtest\index.php');

// Perform interactions and assertions
$pageTitle = $webDriver->getTitle();
if ($pageTitle === 'Emergency Alerts and Updates') {
    echo 'Test Passed: Page title matches expected value.';
} else {
    echo 'Test Failed: Page title does not match expected value.';
}

// Additional interactions and assertions can be added here

// Close the browser
$webDriver->quit();
