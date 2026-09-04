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
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#importModal"><i
                    class="ti ti-file-import"></i> Import</button>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered search-table align-middle text-nowrap">
                    <thead class="header-item text-center">
                        <th>No.</th>
                        @if(session('role') == 'kindergartenadmin')
                        <th>Action</th>
                        @endif
                        <th>Name</th>
                        <th>Registration Number</th>
                        <th>Class</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>First Day of School</th>
                        <th>Teacher</th>
                        <th>Name of Parents</th>
                        <th>Address</th>

                    </thead>
                    <tbody>
                        @forelse ($datas as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if(session('role') == 'kindergartenadmin')
                            <td class="d-flex">
                                <a href="{{ route('kindergarten.student_data.edit', $data->id) }}" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="Edit" class="m-1 btn btn-sm btn-primary"><i class="ti ti-pencil"></i></a>

                                <div class="d-flex justify-content-center gap-1 flex-wrap">
                                    <form id="deleteForm-{{ $data->id }}" action="{{ route('kindergarten.student_data.destroy', $data->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button tabindex="0" data-bs-toggle="tooltip" title="Hapus" class="m-1 btn btn-sm btn-danger"><i
                                                class="ti ti-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                            @endif
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->registration_number }}</td>
                            <td>{{ $data->class }}</td>
                            <td>{{ $data->gender }}</td>
                            <td>{{ date('d F Y', strtotime($data->dob)) }}</td>
                            <td>{{ date('d F Y', strtotime($data->first_day_of_school)) }}</td>
                            <td>{{ $data->teachers }}</td>
                            <td>{{ $data->name_of_parents }}</td>
                            <td>{{ $data->address }}</td>


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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Import Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('kindergarten.student_data.import') }}" method="POST" enctype="multipart/form-data"
                class="mb-8 p-4 border rounded bg-gray-50">
                @csrf

                <p class="mb-4 text-gray-500">Download template file: <a href="{{ asset('templates/kindergarten_student_template.xlsx') }}" class="text-blue-500 underline">Click here</a></p>
                <div class="modal-body">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Pilih File Excel (.xlsx / .xls):</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload &
                        Import</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
