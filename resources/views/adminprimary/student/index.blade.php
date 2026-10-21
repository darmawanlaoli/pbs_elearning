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
        <!-- --------------------- start Contact ---------------- -->
        <div class="card card-body">
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <form class="row">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" autofocus placeholder="Search Student">
                            <button type="submit" class="input-group-text btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                <div
                    class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <a href="{{ route('admin_primary.student.create') }}" id="btn-add-contact"
                        class="btn btn-info d-flex align-items-center">
                        <i class="ti ti-users text-white me-1 fs-5"></i> Add Student
                    </a>
                </div>
            </div>
        </div>


        <div class="card card-body">
            <div class="table-responsive">
                <table class="table search-table align-middle text-nowrap">
                    <thead class="header-item">
                        <th>No.</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Class</th>
                        <th>Last Login</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @php
                            use Carbon\Carbon;
                        @endphp
                        @forelse ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->username }}</td>
                            <td>{{ $student->class }}</td>
                            <td>{{ Carbon::parse($student->last_login)->diffForHumans(); }}</td>
                            <td class="d-flex">
                                <form id="deleteForm-{{ $student->id }}"
                                action="{{ route('admin_primary.student.destroy', $student->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button tabindex="0" data-bs-toggle="tooltip" title="Hapus"
                                    class="m-1 tombol-hapus border-0 badge text-white btn btn-danger"><i
                                        class="ti ti-trash"></i></button>
                                </form>

                                <form action="{{ route('admin_primary.student.reset_password', $student->id) }}"
                                    method="POST">
                                    @csrf
                                    <button tabindex="0" data-bs-toggle="tooltip" title="Reset Password"
                                        class="m-1 tombol-reset border-0 badge text-white btn btn-primary"><i class="ti ti-rotate-clockwise-2"></i></button>
                                </form>
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
