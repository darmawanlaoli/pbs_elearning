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
                <a href="{{ route('hs_teacher.assignment.create') }}" class="btn btn-primary mb-2"><i
                        class="ti ti-plus"></i> Upload</a>

                <div class="table-responsive">
                    <table class="table table-bordered search-table align-middle text-nowrap">
                        <thead class="header-item text-center">
                            <th>No.</th>
                            <th>Subject</th>
                            <th>Class</th>
                            <th>Description</th>
                            <th>File</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($assignments as $assignment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $assignment->subject }}</td>
                                <td>{{ $assignment->class }}</td>
                                <td>{{ $assignment->description }}</td>
                                <td class="text-center">
                                    <a tabindex="0" data-bs-toggle="tooltip" title="Download" class="btn btn-primary"
                                        href="{{'/assignment/'.$assignment->file}}"><i class="ti ti-arrow-down"></i>
                                        Download</a>
                                </td>

                                <td class="d-flex text-center">

                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                        <form action="{{ route('hs_teacher.assignment.assign', $assignment->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button tabindex="0" data-bs-toggle="tooltip" title="Assign" class="m-1 btn btn-success">Assign</button>
                                        </form>
                                    </div>

                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                        <form action="{{ route('hs_teacher.assignment.detail', $assignment->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button tabindex="0" data-bs-toggle="tooltip" title="Detail" class="m-1 btn btn-success">Detail</button>
                                        </form>
                                    </div>

                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                        <form id="deleteForm-{{ $assignment->id }}"
                                            action="{{ route('hs_teacher.assignment.destroy', $assignment->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button tabindex="0" data-bs-toggle="tooltip" title="Hapus"
                                                class="m-1 btn btn-danger"><i
                                                    class="ti ti-trash"></i></button>
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
</div>

@endsection
