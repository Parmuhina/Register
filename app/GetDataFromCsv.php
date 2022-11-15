<?php

namespace App;
use App\Company;
use League\Csv\Reader;
use League\Csv\Statement;

class GetDataFromCsv
{
    public function getCompanies ():array
    {
        $csv = Reader::createFromPath('register.csv');
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);

        $header = $csv->getHeader();
        $stmt = Statement::create()
            ->limit(30);
        $records = $stmt->process($csv);
        $companies=[];

        foreach ($records as $record) {
            $companies[] = new Company($record["name"], $record["regcode"]);
        }
        return $companies;
    }

    public function getRowNumber ():array
    {
        $csv = Reader::createFromPath('register.csv');
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        $header = $csv->getHeader();
        $records = $csv->getRecords();
        $count=0;
        $secondCount=0;

        $companies=[];
        foreach ($records as $record){
            $count++;
        }
        foreach ($records as $record){
            $secondCount++;
            if($secondCount>=($count-29)){
                $companies[]=new Company($record["name"], $record["regcode"]);
            }
        }
        return $companies;
    }
}