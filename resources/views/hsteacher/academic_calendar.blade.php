@extends('hsteacher.layout')

@section('content')


<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">{{ $title }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="./index.html">{{ $path }}</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Unit</th>
                <th>Academic Year</th>
                <th>Semester</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ '1' }}</td>
                <td>{{ 'JHS' }}</td>
                <td>{{ '2026/2027' }}</td>
                <td>{{ 'Semester 1' }}</td>
                <td><a href="<?= '/assets/academic_calendar/ac20262027sem1smp.xlsx'; ?>"
                        class="btn btn-primary">Download</a></td>
            </tr>

            <tr>
                <td>{{ '2' }}</td>
                <td>{{ 'SHS' }}</td>
                <td>{{ '2026/2027' }}</td>
                <td>{{ 'Semester 1' }}</td>
                <td><a href="<?= '/assets/academic_calendar/ac20262027sem1sma.xlsx'; ?>"
                        class="btn btn-primary">Download</a></td>
            </tr>
        </tbody>

</div>


@endsection
