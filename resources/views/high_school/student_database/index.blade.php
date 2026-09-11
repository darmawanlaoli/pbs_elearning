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
        <!-- --------------------- start Contact ---------------- -->
        <div class="card card-body">
            <div class="row">
                <div class="col-md-4 col-xl-3">
                    <form class="position-relative" action="" method="GET">
                        <div class="row">


                        </div>

                        <div class="input-group mb-3">
                            <select name="filter_religion" class="form-control">
                                <option value="">Filter by Religion</option>
                                <option value="Islam">Islam</option>
                                <option value="Christian">Christian</option>
                                <option value="Catholic">Catholic</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                            <button type="submit" class="btn btn-primary input-group-text">Filter</button>
                        </div>
                    </form>
                </div>

                @if(session('role') == 'hsadmin')
                <div
                    class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <a href="{{ route('high_school.database.teachers.create') }}" id="btn-add-contact"
                        class="btn btn-info d-flex align-items-center">
                        <i class="ti ti-users text-white me-1 fs-5"></i> Add Student
                    </a>
                </div>
                @endif;
            </div>
        </div>


        <div class="card card-body">
            <div class="table-responsive">
                <table class="table search-table align-middle text-nowrap">
                    <thead class="header-item">
                        <th>No.</th>
                        <th>Name</th>
                        <th>Religion</th>
                        <th>Grade</th>
                        <th>Class</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->religion }}</td>
                            <td>{{ $student->grade }}</td>
                            <td>{{ $student->class }}</td>
                            <td>
                                @if(session('role') == 'hsadmin')
                                <form id="deleteForm-{{ $student->id }}"
                                action="{{ route('high_school.database.students.destroy', $student->id) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button tabindex="0" data-bs-toggle="tooltip" title="Hapus"
                                    class="m-1 tombol-hapus border-0 badge text-white btn btn-danger"><i
                                        class="ti ti-trash"></i></button>
                                </form>
                                @endif
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
