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
            <a href="{{ route('kindergarten.report_data.create') }}" class="btn btn-primary mb-2"><i
                    class="ti ti-plus"></i> Create</a>

            <div class="table-responsive">
                <table class="table table-bordered search-table align-middle text-nowrap">
                    <thead class="header-item text-center">
                        <th>No.</th>
                        <th>Academic Year - Term</th>
                        <th>Distribution Date</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->academic_year . ' - '. $data->term }}</td>
                            <td>{{ date('d F Y', strtotime($data->distribution_date)) }}</td>
                            <td class="d-flex">
                                <a href="{{ route('kindergarten.report_data.edit', $data->id) }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Edit" class="m-1 btn btn-sm btn-primary"><i class="ti ti-pencil"></i></a>

                                <div class="d-flex justify-content-center gap-1 flex-wrap">
                                    <form id="deleteForm-{{ $data->id }}"
                                        action="{{ route('kindergarten.report_data.destroy', $data->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button tabindex="0" data-bs-toggle="tooltip" title="Hapus"
                                            class="m-1 btn btn-sm btn-danger"><i
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


@endsection
