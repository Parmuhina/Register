<?php
require_once 'vendor/autoload.php';
use App\FilterByName;
use App\FilterByRegcode;
use App\CompanyCollection;
use App\LastThirty;
use App\GetDataFromCsv;

echo "Hello from company registration database!".PHP_EOL;
while (true){
echo "What do you want to find? Press:".PHP_EOL;
echo "1 To choose company by name.".PHP_EOL;
echo "2 To choose company by registration number.".PHP_EOL;
echo "3 To print last 30.".PHP_EOL;
echo "4 To exit".PHP_EOL;

    $chose=(int)readline ();
    switch ($chose){
        case 1:
            $name=readline("Insert company name: ");
            $result=new FilterByName();
            printToScreen($result->filterByName($name));
            break;
        case 2:
            $regcode=readline ("Insert company registration code: ");
            $result=new FilterByRegcode();
            printToScreen($result->FilterByRegcode($regcode));
            break;
        case 3:
            $collection=new LastThirty();
            printToScreen($collection->lastThirty());
        case 4:
            echo "Bye!".PHP_EOL;
            exit;
        default:
            echo "Wrong choice!";
    }
}

function printToScreen (CompanyCollection $collection):void
{
    foreach ($collection->getCompanies() as $company){
        echo "Company ".$company->getName().", registration code ".$company->getRegistrationCode().".".PHP_EOL;
    }
}