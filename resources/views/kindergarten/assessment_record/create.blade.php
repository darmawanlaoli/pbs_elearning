@extends('kindergarten.layout')

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

    <div class="row">
        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('kindergarten.assessment_record.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="assessment_date" class="form-label">Academic Year</label>
                            <input type="text" class="form-control" id="assessment_date" name="assessment_date"
                                value="{{ $academic_year->academic_year }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="assessment_score" class="form-label">Term</label>
                            <input type="text" class="form-control" value="{{ $academic_year->term }}" id="assessment_score"
                                name="assessment_score" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('kindergarten.assessment_record.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="class" class="form-label">Class</label>
                            <input type="text" readonly class="form-control" value="{{ session('homeroom_class') }}" id="class"
                                name="class" required>
                        </div>

                        <div class="mb-3">
                            <label for="assessment_score" class="form-label">Report Card Distribution</label>
                            <input type="date" class="form-control" id="assessment_score" name="assessment_score" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="card">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="text-center align-middle bg-primary text-white">
                        <th>Student Name</th>
                        <th>Reg. Number</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Parents Name</th>
                        <th>Teachers</th>
                    </tr>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->registration_number }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->dob }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->name_of_parents }}</td>
                            <td>{{ $student->teachers }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>


@endsection
