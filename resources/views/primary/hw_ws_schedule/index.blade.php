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

                @if(session('role') == 'primaryteacher')
                <a href="{{ route('primary.hw_ws_schedule.create') }}" class="btn btn-primary"><i class="ti ti-circle-plus"></i> Add</a>
                @endif

                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Teacher</th>
                                <th>Academic Year - Term</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Kind of Assessment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($schedule as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('d F Y', strtotime($item->tanggal)) }}</td>
                                <td>{{ $item->teacher_name }}</td>
                                <td>{{ $item->academic_year }} - {{ $item->term }}</td>
                                <td>{{ $item->class }}</td>
                                <td>{{ $item->subject }}</td>
                                <td>{{ $item->kind_of_assessment }}</td>
                                <td><a href="{{ route('primary.hw_ws_schedule.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

@endsection
