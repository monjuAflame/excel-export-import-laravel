<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\Purchase;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerImportRelationship implements ToModel
{
    public function model(array $row)
    {
        return new Purchase([
            'customer_id' => $this->getCustomerIdDB($row[1], $row[2]),
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

}
