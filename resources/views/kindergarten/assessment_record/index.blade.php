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
    <div class="widget-content searchable-container list">

    <div class="card">

        <div class="card-body">
            <a href="{{ route('kindergarten.assessment_record.create') }}" class="btn btn-primary mb-2"><i
                    class="ti ti-plus"></i> Create</a>

            <div class="table-responsive">
                <table class="table table-bordered search-table align-middle text-nowrap">
                    <thead class="header-item text-center">
                        <th>No.</th>
                        <th>Class</th>
                        <th>Academic Year - Term</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($assessments as $assessment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $assessment->class }}</td>
                            <td>{{ $assessment->academic_year . ' - '. $assessment->term }}</td>
                            <td class="d-flex">
                                <div class="d-flex justify-content-center gap-1 flex-wrap">

                                    <form action="{{ route('kindergarten.assessment_record.input', $assessment->id) }}"
                                        method="GET">
                                        @csrf
                                        <button data-bs-toggle="tooltip" title="Input" class="btn btn-sm btn-primary"><i
                                                class="ti ti-pencil"></i> Assesment Record</button>
                                    </form>

                                    <form action="{{ route('kindergarten.assessment_record.report_data', $assessment->id) }}" method="POST">
                                        @csrf
                                        <button data-bs-toggle="tooltip" title="Report Data" class="btn btn-sm btn-primary"><i class="ti ti-database"></i> Report Data</button>
                                    </form>

                                    <form action="{{ route('kindergarten.assessment_record.print_preview', $assessment->id) }}" method="POST">
                                        @csrf
                                        <button data-bs-toggle="tooltip" title="Print preview" class="btn btn-sm btn-success"><i class="ti ti-printer"></i> Print Preview</button>
                                    </form>

                                </div>
                            </td>
                        <tr>

                            @empty
                        <tr>
                            <td colspan="4">No data available</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@endsection
