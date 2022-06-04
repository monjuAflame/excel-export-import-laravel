<?php

namespace App\Imports;

use App\Models\Customer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImportHeading implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Customer([
            'email' => $row['email'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
