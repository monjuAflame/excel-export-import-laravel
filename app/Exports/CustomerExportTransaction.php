<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerExportTransaction implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $transactions = Transaction::all();

        $transactions->push(collect([
            'id' => '',
            'customer_id' => 'Total',
            'amount' => '=SUM(C1:C'.$transactions->count().')',
            'created_at' => '',
            'updated_at' => '',
        ]));
        return $transactions;
    }
}
