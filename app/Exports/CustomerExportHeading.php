<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExportHeading implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Customer::all();



        // after 3 items get a gap
        // $customers = Customer::all();
        // $final_collection = [];
        // foreach ($customers->chunk(3) as $chunk) {
        //     $final_collection = array_merge($final_collection, $chunk->toArray(), [[]]);
        // }
        // return collect($final_collection);

        // if get any space row
        return Customer::select(\DB::raw("'', id, first_name, last_name, email, created_at, updated_at"))->get();

    }

    public function headings(): array
    {
        return [
            ' ',
            '#',
            'First_name',
            'Last_name',
            'Email',
            'Created_at',
            'Updated_at'
        ];
    }


}
