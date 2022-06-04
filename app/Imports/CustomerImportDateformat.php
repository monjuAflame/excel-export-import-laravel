<?php

namespace App\Imports;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomerImportDateformat implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Customer([
            'first_name' => $row[1],
            'last_name' => $row[2],
            'email' => $row[3],
            'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', $row[4])->toDateTimeString(),
            'updated_at' => Carbon::createFromFormat('d/m/Y H:i:s', $row[5])->toDateTimeString(),
        ]);
    }
}
