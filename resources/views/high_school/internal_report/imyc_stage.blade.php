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

                    <a href="{{ route('imyc_stage') }}" class="btn btn-primary">IMYC Stage</a>

                    <div class="table-responsive mt-3">
                        <table class="table search-table align-middle text-nowrap">
                            <thead class="header-item">
                                <th>No.</th>
                                <th>Academic Year/Term</th>
                                <th>Homeroom</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($stages as $stage)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $stage->academic_year.'/'.$stage->term }}</td>
                                        <td>{{ $stage->class }}</td>

                                        <td>
                                            <a href="{{ route('imyc_stage.edit', $stage->id) }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="Tooltip on top" class="btn btn-primary btn-sm"><i class="ti ti-pencil"></i> Edit</a>

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
