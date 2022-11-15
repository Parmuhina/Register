<?php

namespace App;
use App\Company;

class CompanyCollection
{
    private array $companies;

    public function __construct(array $companies=[])
    {
        foreach ($companies as $company){
            $this->add($company);
        }
    }

    public function add (Company $company):void
    {
        $this->companies[]=$company;
    }

    public function getCompanies ():array
    {
        return $this->companies;
    }
}