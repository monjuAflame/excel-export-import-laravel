<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Customer::all();

        // return Customer::where('email', 'like', '%example.org')->get();

        return Customer::select('first_name', 'last_name', 'email')
                        ->where('email', 'like', '%example.org')
                        ->get();

        return Customer::select('first_name', 'last_name', 'email')
                        ->where('email', 'like', '%example.org')
                        ->orderBy('first_name')
                        ->get();


    }
}
