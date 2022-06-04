<?php

namespace App\Http\Controllers;

use App\Exports\CustomerEImportHeading;
use App\Exports\CustomerExport;
use App\Exports\CustomerExportDateTimeFormat;
use App\Exports\CustomerExportHeading;
use App\Exports\CustomerExportSize;
use App\Exports\CustomerExportStyling;
use App\Exports\CustomerExportView;
use App\Exports\CustomerMultipleExportSheets;
use App\Exports\CustomersExportMapping;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Imports\CustomerImportDateformat;
use App\Imports\CustomerImportHeading;
use App\Imports\CustomerImportLarge;
use App\Imports\CustomerImportRelationship;
use App\Imports\CustomersImport;
use App\Models\Purchase;
use Illuminate\Http\Request;
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

    public function export_mapping()
    {
        // dd(Purchase::with('customer')->get());
        return Excel::download(new CustomersExportMapping(), 'customers.xlsx');
    }

    public function export_styling()
    {
        return Excel::download(new CustomerExportStyling(), 'customer.xlsx');
    }

    public function export_autosize()
    {
        return Excel::download(new CustomerExportSize(), 'customer.xlsx');
    }

    public function export_dateTime_format(){
        return Excel::download(new CustomerExportDateTimeFormat(), 'customer.xlsx');
    }

    public function import(Request $request)
    {
        Excel::import(new CustomersImport($request->delimiter), request()->file('import', null, 'Csv'));
        return redirect()->route('customers.index')->withMessage('Successfully Import');
    }

    public function import_heading()
    {
        Excel::import(new CustomerImportHeading(), request()->file('import', null, 'Csv'));
        return redirect()->route('customers.index')->withMessage('Successfully Import');
    }

    public function import_largeFile()
    {
        $start_time = $this->microtime_float();
        Excel::import(new CustomerImportLarge(), request()->file('import'));
        $end_time = $this->microtime_float();
        $time = $end_time - $start_time;
        return "Time: $time secconds";
    }

    public function import_relationships()
    {
        $start_time = $this->microtime_float();
        Excel::import(new CustomerImportRelationship(), request()->file('import'));
        $end_time = $this->microtime_float();
        $time = $end_time - $start_time;
        return "Time: $time secconds";
    }
    

    public function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

   public function import_datetime_format()
   {
       Excel::import(new CustomerImportDateformat(), request()->file('import'));
       return redirect()->route('customers.index')->withMessage('Successfully Import');

   }

   public function import_error()
   {
    try{
        Excel::import(new CustomerImportDateformat(), request()->file('import'));
    } catch(\Carbon\Exceptions\InvalidFormatException $ex) {
        return back()->withError('wrong date format column');
    } catch(\Exception $ex){
        return back()->withError('somthing wrong check your file');
    } catch(\Error $er){
        return back()->withError('somthing wrong check your file');
    }
    return redirect()->route('customers.index')->withMessage('Successfully Import');
   }



}
