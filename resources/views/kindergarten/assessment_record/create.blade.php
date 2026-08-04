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

    <div class="card">

        <div class="card-body">
            <form action="{{ route('kindergarten.assessment_record.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="student_name" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" required>
                </div>
                <div class="mb-3">
                    <label for="assessment_date" class="form-label">Assessment Date</label>
                    <input type="date" class="form-control" id="assessment_date" name="assessment_date" required>
                </div>
                <div class="mb-3">
                    <label for="assessment_score" class="form-label">Assessment Score</label>
                    <input type="number" class="form-control" id="assessment_score" name="assessment_score" required>
                </div>
            </form>
        </div>
    </div>


    <div class="card">

        <div class="card-body">
            <form action="{{ route('kindergarten.assessment_record.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="student_name" class="form-label">Student Name</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" required>
                </div>
                <div class="mb-3">
                    <label for="assessment_date" class="form-label">Assessment Date</label>
                    <input type="date" class="form-control" id="assessment_date" name="assessment_date" required>
                </div>
                <div class="mb-3">
                    <label for="assessment_score" class="form-label">Assessment Score</label>
                    <input type="number" class="form-control" id="assessment_score" name="assessment_score" required>
                </div>

                <div class="mb-3">
                    <input type="checkbox" id="is_passed" name="is_passed" value="1">
                    <label for="is_passed" class="form-label">Dengan ini saya menyatakan bahwa data siswa di atas sudah
                        benar dan sesuai</label>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>


@endsection
