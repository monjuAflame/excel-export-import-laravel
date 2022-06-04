<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\Purchase;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerImportRelationship implements ToModel
{

    private $customers;

    public function __construct()
    {
        $this->customers = Customer::select('id', 'first_name', 'last_name')->get()
                                    ->key(function($item) {
                                        return $item->first_name . ' ' . $item->last_name;
                                    })->toArray();
    }

    public function model(array $row)
    {
        return new Purchase([
            'customer_id' => $this->getCustomerId($row[1], $row[2]),
            'acc_no' => $row[3],
            'company' => $row[4]
        ]);
    }

    public function getCustomerIdDB($first_name, $last_name)
    {
        $customer = Customer::where('first_name', $first_name)->where('last_name', $last_name)->first();
        if($customer) return null;

        return $customer->id;
    }

    public function getCustomerId($first_name, $last_name)
    {
        $customer = $this->customers[$first_name . ' ' . $last_name] ?? null;
        if($customer) return null;

        return $customer->id;
    }

}
