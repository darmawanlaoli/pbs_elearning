@extends('primaryteacher.layout')

@section('content')

<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">{{ $title }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="./index.html">{{ $path }}</a></li>
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
        <div class="card col-md-8 col-lg-8 mx-auto">
            <div class="card-body">

                <form action="{{ route('primary_teacher.assesment_record.import_action') }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <input type="hidden" name="id_assesment" value="{{ $id_assesment }}">
                    <input type="hidden" name="class" value="{{ $class }}">
                    <div class="mb-3">
                        <label class="control-label col-form-label">Academic Year</label>
                        <input type="text" name="academic_year"
                            class="form-control @error('academic_year') is-invalid @enderror"
                            value="{{ $academicyear }}" />
                        @error('academic_year')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="control-label col-form-label">Term</label>
                        <input type="text" name="term" class="form-control @error('term') is-invalid @enderror"
                            value="{{ $term }}" />
                        @error('term')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="control-label col-form-label">Subject</label>
                        <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror"
                            value="{{ $subject }}" />
                        @error('subject')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="control-label col-form-label">File Excel</label>
                        <input type="file" name="file" class="form-control @error('file') is-invalid @enderror" />
                        @error('file')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Import</button>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>


    @endsection
