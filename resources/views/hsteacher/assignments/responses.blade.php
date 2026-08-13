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
    <div class="widget-content searchable-container list">

        <div class="card">

            <div class="card-body">

                <table class="mb-2">
                    <tr>
                        <th style="width: 150px">Subject</th>
                        <th>: {{ $assignment->subject }}</th>
                    </tr>

                    <tr>
                        <th>Class</th>
                        <th>: {{ $assignment->class }}</th>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <th>: {{ $assignment->description }}</th>
                    </tr>
                </table>

                <div class="table-responsive">
                    <table class="table table-bordered search-table align-middle text-nowrap">
                        <thead class="header-item text-center">
                            <th>No.</th>
                            <th>Name</th>
                            <th>Responses</th>
                            <th>Submitted at</th>
                            <th>Score</th>
                        </thead>
                        <tbody>
                            @forelse ($assignmentResponses as $response)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $response->student_name }}</td>

                                <td class="text-center">
                                    <a tabindex="0" data-bs-toggle="tooltip" title="Download" class="btn btn-primary"
                                        href="{{'/assignment/'.$response->file}}"><i class="ti ti-arrow-down"></i>
                                        Download</a>
                                </td>
                                <td>{{ $response->created_at }}</td>
                                <td>{{ $response->score }}</td>

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
</div>

@endsection
