<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;

class CustomerOrganizationSheets implements FromCollection, WithTitle
{

    private $organization;

    public function __construct($organization) {
        $this->organization = $organization;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::where('email', 'Like', '%'. $this->organization)->get();
    }

    public function title(): string
    {
        return 'Organization' . $this->organization;
    }

}
