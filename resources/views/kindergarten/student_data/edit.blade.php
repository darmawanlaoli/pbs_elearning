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

    <form action="{{ route('kindergarten.student_data.update', $studentData->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                            <div class="mb-3">
                                <label for="assessment_date" class="form-label">Name</label>
                                <input type="text" class="form-control" id="assessment_date" name="name"
                                    value="{{ $studentData->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob" value="{{ $studentData->dob }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="registration_number" class="form-label">Registration Number</label>
                                <input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ $studentData->registration_number }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="assessment_score" class="form-label">Class</label>
                                <input type="text" class="form-control" value="{{ $studentData->class }}" id="assessment_score"
                                    name="class" required>
                            </div>

                            <div class="mb-3">
                                <label for="assessment_score" class="form-label">Name of Parents</label>
                                <input type="text" class="form-control" value="{{ $studentData->name_of_parents }}" id="assessment_score" name="name_of_parents"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" required>{{ $studentData->address }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">First Day of School</label>
                                <input type="date" class="form-control" value="{{ $studentData->first_day_of_school }}" name="first_day_of_school" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Teacher</label>
                                <input type="text" class="form-control" value="{{ $studentData->teachers }}" name="teachers" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Grade</label>
                                <input type="text" class="form-control" value="{{ $studentData->grade }}" name="grade" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Class</label>
                                <input type="text" class="form-control" value="{{ $studentData->class }}" name="class" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Gender</label>
                                <input type="text" class="form-control" value="{{ $studentData->gender }}" name="gender" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </div>
            </div>

        </div>

    </form>

</div>


@endsection
