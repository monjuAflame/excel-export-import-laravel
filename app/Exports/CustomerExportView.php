<?php

namespace App\Exports;

use App\Models\Customer;
use illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CustomerExportView implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        $customers = Customer::all();
        return view('customer.table', compact('customers'));
    }
}
