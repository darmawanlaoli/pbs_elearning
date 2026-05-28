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
                    <form class="position-relative">
                        <input type="text" class="form-control product-search ps-5" id="input-search"
                            placeholder="Search Teachers..." />
                        <i
                            class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
                <div
                    class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                    <a href="{{ route('admin_primary.teacher.create') }}" id="btn-add-contact"
                        class="btn btn-info d-flex align-items-center">
                        <i class="ti ti-users text-white me-1 fs-5"></i> Add Teacher
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
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($teachers as $teacher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->username }}</td>
                            <td class="d-flex">
                                <div class="d-flex justify-content-center gap-1 flex-wrap">
                                    <form id="deleteForm-{{ $teacher->id }}"
                                        action="{{ route('admin_primary.teacher.destroy', $teacher->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button tabindex="0" data-bs-toggle="tooltip" title="Hapus"
                                            class="m-1 tombol-hapus border-0 badge text-white btn btn-danger"><i
                                                class="ti ti-trash"></i></button>
                                    </form>
                                    <a tabindex="0" data-bs-toggle="tooltip" title="Edit"
                                        class="m-1 badge text-white btn btn-primary"
                                        href="{{ route('admin_primary.teacher.edit', $teacher->id) }}"><i
                                            class="ti ti-edit"></i></a>
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
