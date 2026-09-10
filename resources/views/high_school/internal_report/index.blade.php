@extends('layout.' . strtolower(session('role')))

@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">{{ $title }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="./index.html">{{ $path }}</a>
                                </li>
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
        <div class="widget-content searchable-container list">


            <div class="card card-custome">

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table search-table align-middle text-nowrap">
                            <thead class="header-item">
                                <th>No.</th>
                                <th>Class</th>
                                <th>Homeroom</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($classes as $class)
                                    <tr class="bg-danger">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $class->class }}</td>
                                        <td>{{ $class->homeroom }}</td>

                                        <td class="d-flex">

                                            <div class="d-flex justify-content-center gap-1 flex-wrap">
                                                <form
                                                    action="{{ route('high_school.assessment_record.generate', $class->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button tabindex="0" data-bs-toggle="tooltip"
                                                        title="Print Report" class="btn btn-sm btn-primary m-1"><i
                                                            class="ti ti-printer"></i> Print Report</button>
                                                </form>
                                            </div>

                                            <div class="d-flex justify-content-center gap-1 flex-wrap">

                                                <a href="{{ route('high_school.assessment_record.create_report_data', $class->class) }}" class="btn btn-sm btn-info m-1">
                                                    <i class="ti ti-database"></i> Create Report Data</a>
                                                </a>
                                            </div>

                                            <div class="d-flex justify-content-center gap-1 flex-wrap">

                                                <a href="{{ route('high_school.internal_report.accumulated', $class->class) }}"
                                                    class="btn btn-sm btn-success m-1">
                                                    <i class="ti ti-pencil"></i> Assessment Record</a>
                                                </a>
                                            </div>

                                        </td>

                                    <tr>

                                    @empty
                                    <tr>
                                        <td colspan="6">No data available</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
