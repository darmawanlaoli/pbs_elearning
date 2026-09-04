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

    <form action="{{ route('kindergarten.report_data.store') }}" method="POST">
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
                                <input type="text" class="form-control" value="{{ $academic_year->term }}" id="assessment_score"
                                    name="term" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Report Card Distribution</label>
                                <input type="date" class="form-control" name="report_card_distribution" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </div>
            </div>

        </div>

    </form>

</div>


@endsection
