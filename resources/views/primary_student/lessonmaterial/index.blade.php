@extends('primary_student.layout')

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
                <div class="row">
                    @foreach ($subjects as $subject)

                    <div class="col-lg-3 col-md-6">
                        <a href="{{ route('primary_student.lessonmaterial.show', $subject->subject) }}"
                            class="text-decoration-none">
                            <div class="card border-bottom border-primary">
                                <div class="card-body">
                                    <div class="d-flex no-block align-items-center">
                                        <div>
                                            <h2 class="fs-7">
                                                {{ $materialCounts[$subject->subject] ?? 0 }}
                                            </h2>
                                            <h6 class="fw-medium text-primary mb-0">{{ $subject->subject }}</h6>
                                        </div>
                                        <div class="ms-auto">
                                            <span class="text-primary display-6"><i class="ti ti-clipboard"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection