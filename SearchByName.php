<?php

require_once('vendor/autoload.php');
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Chrome\ChromeDriver;

$web_driver = RemoteWebDriver::create("http://localhost:4444/wd/hub",
    array("platform"=>"WINDOWS", "browserName"=>"chrome"), 120000);
$web_driver->get("http://localhost/tspProject/");

$nameSearch = $web_driver->findElement(WebDriverBy::name("names"));
if($nameSearch) {
    $nameSearch->sendKeys("Accounting Principles I");
    $nameSearch->submit();
}
print $web_driver->getTitle();
sleep(5);
$web_driver->quit();

?>