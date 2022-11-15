<?php
namespace App;
use App\CompanyCollection;
use App\Company;
class FilterByRegcode
{
    private string $regcode;

    public function __construct(string $regcode="")
    {
        $this->regcode=$regcode;
    }

    public function FilterByRegcode(string $regcode): CompanyCollection
    {
        $companies=new GetDataFromCsv();
        $collection=new CompanyCollection($companies->getCompanies());
        $result=new CompanyCollection();
        foreach ($collection->getCompanies() as $company){
            if ($company->getRegistrationCode()===$regcode){
                $result->add($company);
            }
        }
        return $result;
    }
}