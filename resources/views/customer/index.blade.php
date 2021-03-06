<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Customer</h2>
                        <br>
                        <a href="{{ route('customers.export') }}" class="btn btn-primary btn-sm"> Export All Customer </a>

                        <a href="{{ route('customers.export_view') }}" class="btn btn-primary btn-sm"> Separate Class Export All Customer </a>

                        <a href="{{ route('customers.export_store') }}" class="btn btn-primary btn-sm"> Store As Files </a>


                        <a href="{{ route('customers.export_format', 'Csv') }}" class="btn btn-secondary btn-sm"> Download CSV </a>
                        <a href="{{ route('customers.export_format', 'Html') }}" class="btn btn-secondary btn-sm"> Download HTML </a>
                        <a href="{{ route('customers.export_format', 'Dompdf') }}" class="btn btn-secondary btn-sm"> Download PDF </a>
                        <!-- multipple sheet by org. -->
                        <a href="{{ route('customers.export_multiple_sheets') }}" class="btn btn-primary btn-sm"> Exports into Multiple Sheets </a>
                        <!-- multipple sheet by org. -->
                        <a href="{{ route('customers.export_by_heading') }}" class="btn btn-primary btn-sm"> Exports with heading </a>
                        {{-- export mapping --}}
                        <a href="{{ route('customers.export_mapping') }}" class="btn btn-primary btn-sm mt-2"> Exports Purchase by (Relation-mapping) </a>
                        {{-- export styling --}}
                        <a href="{{ route('customers.export_styling') }}" class="btn btn-primary btn-sm mt-2"> Exports with Styling </a>
                        {{-- export cell size --}}
                        <a href="{{ route('customers.export_autosize') }}" class="btn btn-primary btn-sm mt-2"> Exports with Styling </a>

                        {{-- export date time --}}
                        <a href="{{ route('customers.export_dateTime_format') }}" class="btn btn-primary btn-sm mt-2"> Exports Date Time Format </a>
                        {{-- export cell merge --}}
                        <a href="{{ route('customers.export_cell_merge') }}" class="btn btn-primary btn-sm mt-2"> Exports Cell Merge </a>
                        {{-- export formulas --}}
                        <a href="{{ route('customers.export_formulas') }}" class="btn btn-primary btn-sm mt-2"> Exports Transaction Formulas </a>

                        <br>
                        <br>
                        <br>

                        @if (session('message'))
                            <div class="alert alert-info">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        
                        <form action="{{ route('customers.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="import" id="">

                            <select name="delimiter" id="">
                                <option value=",">Delimiter , (comma)</option>
                                <option value=";">Delimiter ; (semicolon)</option>
                            </select>

                            <input type="submit" class="btn btn-sm btn-primary" value="Import File">
                        </form>
                        {{-- with heading --}}
                        <p>heading with</p>
                        <form action="{{ route('customers.import_heading') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="import" id="">

                            <select name="delimiter" id="">
                                <option value=",">Delimiter , (comma)</option>
                                <option value=";">Delimiter ; (semicolon)</option>
                            </select>

                            <input type="submit" class="btn btn-sm btn-primary" value="Import File">
                        </form>
                        {{-- large file upload --}}
                        <p>Large file upload 10,000</p>
                        <form action="{{ route('customers.import_largeFile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="import" id="">

                            <input type="submit" class="btn btn-sm btn-primary" value="Import File">
                        </form>
                        {{-- import relationship data --}}
                        <p>import relationship data</p>
                        <form action="{{ route('customers.import_relationships') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="import" id="">

                            <input type="submit" class="btn btn-sm btn-primary" value="Import File">
                        </form>
                        {{-- import datetime data --}}
                        <p>import Date Time Format</p>
                        <form action="{{ route('customers.import_datetime_format') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="import" id="">

                            <input type="submit" class="btn btn-sm btn-primary" value="Import File">
                        </form>
                        {{-- error handling eception --}}
                        <p>error handling exception</p>
                        <form action="{{ route('customers.import_error') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="import" id="">

                            <input type="submit" class="btn btn-sm btn-primary" value="Import File">
                        </form>

                    </div>
                    <div class="card-body">
                        @include('customer.table', $customers)
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>