@extends('adminprimary.layout')

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

                <div class="table-responsive">
                    <table style="font-size: 14px" class="table search-table align-middle text-nowrap table-bordered">
                        <thead class="header-item text-center">
                            <th>No.</th>
                            <th>Action</th>
                            <th>Class</th>
                            <th>Term</th>
                            <th>Subject</th>
                            <th>Teacher</th>
                            <th>Submitted On</th>
                        </thead>
                        <tbody>
                            @forelse ($assesments as $assesment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="d-flex">
                                    
                                    <a data-bs-toggle="tooltip" title="Download Excel"
                                        href="{{ route('admin_primary.assesment_record.excel',$assesment->id) }}"
                                        class="m-1 btn btn-sm btn-success"><i class="fa-regular fa-file-excel"></i></a>
                                    <a data-bs-toggle="tooltip" title="Detail"
                                        href="{{ route('admin_primary.assesment_record.detail', $assesment->id) }}"
                                        class="m-1 btn btn-sm btn-primary"><i class="ti ti-eye"></i></a>
                                </td>
                                <td>{{ $assesment->class }}</td>
                                <td>{{ $assesment->term }}</td>
                                <td>{{ $assesment->subject }}</td>
                                <td>{{ $assesment->teacher }}</td>
                                <td>{{ $assesment->created_at }}</td>

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
