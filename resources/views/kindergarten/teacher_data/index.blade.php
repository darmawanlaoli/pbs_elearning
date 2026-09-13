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
            @if(session('role') == 'kindergartenadmin')
            <a href="{{ route('kindergarten.teacher_data.create') }}" class="btn btn-primary"><i class="ti ti-plus"></i> Create</a>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered search-table align-middle text-nowrap">
                    <thead class="header-item text-center">
                        <th>No.</th>
                        @if(session('role') == 'kindergartenadmin')
                        <th>Action</th>
                        @endif
                        <th>Name</th>
                        <th>Username</th>
                        <th>Class</th>

                    </thead>
                    <tbody>
                        @forelse ($teachers as $teacher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if(session('role') == 'kindergartenadmin')
                            <td class="d-flex">
                                <a href="{{ route('kindergarten.teacher_data.edit', $teacher->id) }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Edit" class="m-1 btn btn-sm btn-primary"><i class="ti ti-pencil"></i></a>

                                <div class="d-flex justify-content-center gap-1 flex-wrap">
                                    <form id="deleteForm-{{ $teacher->id }}" action="{{ route('kindergarten.teacher_data.destroy', $teacher->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button tabindex="0" data-bs-toggle="tooltip" title="Hapus" class="m-1 btn btn-sm btn-danger tombol-hapus"><i
                                                class="ti ti-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                            @endif
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->username }}</td>
                            <td>{{ $teacher->homeroom_class }}</td>
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
