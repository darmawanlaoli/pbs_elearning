@extends('hsteacher.layout')

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

        <div class="card col-md-8 col-lg-8 mx-auto">
            <div class="card-body">

                <form action="{{ route('hs_teacher.project_formulation.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="control-label col-form-label">Academic Year</label>
                        <input type="text" name="academic_year"
                            class="form-control @error('academic_year') is-invalid @enderror"
                            value="{{ $academicyears->academic_year }}" />
                        @error('academic_year')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="control-label col-form-label">Term</label>
                        <input type="text" name="term" class="form-control @error('term') is-invalid @enderror"
                            value="{{ $academicyears->term }}" />
                        @error('term')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3 position-relative">
                        <label class="control-label col-form-label">Class</label>
                        <div class="input-group">
                            <select name="class" class="form-control @error('class') is-invalid @enderror">
                                <option value="" disabled selected>Select Class</option>
                                @for ($i = 7; $i <= 12; $i++) <option value="{{ 'Y'.$i }}">{{ 'Y'.$i }}</option>
                                    @endfor
                            </select>
                            @error('class')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 position-relative">
                        <label class="control-label col-form-label">Subject</label>
                        <div class="input-group">
                            <select name="subject" class="form-control @error('subject') is-invalid @enderror">
                                <option value="" disabled selected>Select Subject</option>
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->subject }}">{{ $subject->subject }}</option>
                                @endforeach
                            </select>
                            @error('subject')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 position-relative">
                        <label class="control-label col-form-label">Project Formulation</label>
                        <input type="file" name="project_formulation"
                            class="form-control @error('project_formulation') is-invalid @enderror"
                            accept=".pdf,.docx,.doc" required />
                        @error('project_formulation')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>


        </div>
    </div>

    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    @endsection