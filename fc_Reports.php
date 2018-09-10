<?php 
require_once('./class_Reports.php');
require_once("./DB.php");

$oReports = new Reports(DB::getInstance());

$action = isset($_POST['action']) ? $_POST['action'] : isset($_GET['action']) ? $_GET['action'] : null;
// $action = "getNewClients";

switch($action){
    case "getNewClients":
        header("Content-type:text/html");
        echo $oReports->getNewClients();
    break;
    case "getLostClients":
        header("Content-type:text/html");
        echo $oReports->getLostClients();
    break;
    case "getNewEmployeesNonPB":
        header("Content-type:text/html");
        echo $oReports->getNewEmployeesNonPB();
    break;
    case "getNewEmployeesPB":
        header("Content-type:text/html");
        echo $oReports->getNewEmployeesPB();
    break;
    case "getLostEmployees":
        header("Content-type:text/html");
        echo $oReports->getLostEmployees();
    break;
    case "getSalesDistribution":
        header("Content-type:text/html");
        echo $oReports->getSalesDistribution();
    break;
    case "getIndustry":
        header("Content-type:text/html");
        echo $oReports->getIndustry();
    break;
    case "getCountry":
        header("Content-type:text/html");
        echo $oReports->getCountry();
    break;
    case "getCollection":
        header("Content-type:text/html");
        echo $oReports->getCollection();
    break;
}