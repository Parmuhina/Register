<?php
namespace App;
use App\GetDataFromCsv;
use App\CompanyCollection;
use App\Company;
class LastThirty
{
    public function lastThirty ():CompanyCollection
    {
        $data=new GetDataFromCsv();
        $collection=new CompanyCollection($data->getRowNumber());

        return $collection;
    }
}