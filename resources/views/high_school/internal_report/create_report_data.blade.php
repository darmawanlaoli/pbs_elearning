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

        <form action="{{ route('high_school.report_data.store_report_data') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">
                            <div class="mb-3">
                                <label for="assessment_date" class="form-label">Academic Year</label>
                                <input type="text" class="form-control" id="assessment_date" name="academic_year"
                                    value="{{ $academic_year->academic_year }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="assessment_score" class="form-label">Term</label>
                                <input type="text" class="form-control" value="{{ $academic_year->term }}"
                                    id="assessment_score" name="term" required>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">

                        <div class="card-body">

                            <div class="mb-3">
                                <label for="class" class="form-label">Class</label>
                                <input type="text" readonly class="form-control" value="{{ $class }}"
                                    id="class" name="class" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Homeroom</label>
                                <input type="text" class="form-control" name="homeroom"
                                    value="{{ session('name') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="text-center align-middle bg-primary text-white">
                                <th>No</th>
                                <th>Student Name</th>
                                <th>Class</th>
                            </tr>
                            @foreach ($students as $student)
                            <tr>
                                <!-- Input hidden untuk mengirim ID siswa ke Controller -->
                                <input type="hidden" name="student_ids[]" value="{{ $student->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->class }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="mb-3">
                        <!-- Tambahkan atribut name agar bisa divalidasi di backend -->
                        <input type="checkbox" name="is_confirmed" id="is_confirmed" required>
                        <label for="is_confirmed">Saya sudah memastikan bahwa data tersebut sudah benar</label>
                    </div>

                    <button class="btn btn-primary" type="submit">Create</button>

                </div>
            </div>

        </form>

    </div>


    @endsection
