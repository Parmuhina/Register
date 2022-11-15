<?php
namespace App;
use App\CompanyCollection;
use App\GetDataFromCsv;
use App\Company;

class FilterByName
{
    private string $name;

    public function __construct(string $name="")
    {
        $this->name = $name;
    }

    public function filterByName(string $name): CompanyCollection
    {
        $companies=new GetDataFromCsv();
        $collection=new CompanyCollection($companies->getCompanies());
        $filtered=new CompanyCollection();
        foreach ($collection->getCompanies() as $company){
            if ($company->getName()===$name){
                $filtered->add($company);
            }
        }

        return $filtered;
    }
}