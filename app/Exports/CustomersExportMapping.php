<?php

namespace App\Exports;

use App\Models\Purchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomersExportMapping implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Purchase::with('customer')->get();
    }

    public function map($purchase): array
    {
        return [
            $purchase->id,
            $purchase->customer->first_name . ' ' . $purchase->customer->last_name,
            $purchase->acc_no,
            $purchase->company,
            $purchase->created_at->toDateString(),
            $purchase->updated_at->toDateString(),
        ];
    }
}
