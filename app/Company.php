<?php
namespace App;

class Company
{
    private $name;
    private $registrationCode;

    public function __construct(string $name, string $registrationCode)
    {
        $this->name = $name;
        $this->registrationCode = $registrationCode;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getRegistrationCode():string
    {
        return $this->registrationCode;
    }
}