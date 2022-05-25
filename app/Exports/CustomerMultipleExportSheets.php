<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CustomerMultipleExportSheets implements WithMultipleSheets
{
    use Exportable;


    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets(): array
    {
        $sheets = [];
        $organizations = ['example.net', 'example.com', 'example.org'];

        foreach ($organizations as $item) {
            $sheets[] = new CustomerOrganizationSheets($item);
        }
        return $sheets;
    }
}
