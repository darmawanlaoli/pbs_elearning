@extends('primaryteacher.layout')

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


        <div class="card card-custome">

            <div class="card-body">
                <a href="{{ route('primary_teacher.assesment_record.create') }}" class="btn btn-primary mb-2"><i
                        class="ti ti-plus"></i> New</a>

                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                            <th>No.</th>
                            <th>Academic Year</th>
                            <th>Class</th>
                            <th>Term</th>
                            <th>Subject</th>
                            <th>Import</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($assesments as $assesment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $assesment->academic_year }}</td>
                                <td>{{ $assesment->class }}</td>
                                <td>{{ $assesment->term }}</td>
                                <td>{{ $assesment->subject }}</td>
                                <td>
                                    <div class="dropdown">
                                        <a class="border-0 text-white btn btn-sm btn-primary dropdown-toggle" href="#"
                                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Import
                                        </a>

                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('primary_teacher.assesment_record.export', [$assesment->class, $assesment->subject]) }}">Download
                                                    Format Excel</a></li>
                                            <li>
                                                <form method="POST"
                                                    action="{{ route('primary_teacher.assesment_record.import') }}">
                                                    @csrf
                                                    <input type="hidden" name="academic_year"
                                                        value="{{ $assesment->academic_year }}">
                                                    <input type="hidden" name="term" value="{{ $assesment->term }}">
                                                    <input type="hidden" name="subject"
                                                        value="{{ $assesment->subject }}">
                                                    <input type="hidden" name="class" value="{{ $assesment->class }}">
                                                    <input type="hidden" name="id_assesment"
                                                        value="{{ $assesment->id }}" class="form-control mb-2">
                                                    <button class="dropdown-item" type="submit">Import
                                                        Excel</button>
                                                </form>

                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="d-flex">
                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                        <form id="deleteForm-{{ $assesment->id }}"
                                            action="{{ route('primary_teacher.assesment_record.destroy', $assesment->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button tabindex="0" data-bs-toggle="tooltip" title="Delete"
                                                class="m-1 tombol-hapus btn btn-sm btn-danger"><i
                                                    class="ti ti-trash"></i></button>
                                        </form>
                                    </div>

                                    <a data-bs-toggle="tooltip" title="Detail"
                                        href="{{ route('primary_teacher.assesment_record.detail', $assesment->id) }}"
                                        class="m-1 btn btn-sm btn-primary"><i class="ti ti-eye"></i></a>
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