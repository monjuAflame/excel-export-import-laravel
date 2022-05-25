<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use App\Exports\CustomerExportHeading;
use App\Exports\CustomerExportView;
use App\Exports\CustomerMultipleExportSheets;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    public function export()
    {
        return Excel::download(new CustomerExport(), 'customer.xlsx');
    }

    public function export_view()
    {
        return Excel::download(new CustomerExportView(), 'customer.xlsx');
    }

    public function export_store()
    {
        // file store in storage/app
        //  Excel::store(new CustomerExport(), 'customer-'.now()->toDateString().'.xlsx');

        // file store in storage/app/public to show file have run a commad
        
         Excel::store(new CustomerExport(), 'customer-'.now()->toDateString().'.xlsx', 'public');
         return 'Ok';
    }

    public function export_format($format)
    {
        $extension = strtolower($format);
        // please if composer add any pdf package then it will work
        if(in_array($format, ['Mpdf','Dompdf', 'Tcpdf'])) $extension = 'pdf';
        return Excel::download(new CustomerExportView(), 'customer.'.$extension, $format);
    }

    public function export_multiple_sheets()
    {
        return Excel::download(new CustomerMultipleExportSheets, 'customer.xlsx' );
    }

    public function export_with_heading()
    {
        return Excel::download( new CustomerExportHeading(), 'customer.xlsx');
    }

}
