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

        <div class="card col-md-8 col-lg-8 mx-auto">
            <div class="card-body">

                <form action="{{ route('primary.hw_ws_schedule.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="control-label col-form-label">Date</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" />
                        @error('tanggal')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="control-label col-form-label">Academic Year</label>
                        <select name="academic_year" class="form-control @error('academic_year') is-invalid @enderror">
                            <option value="">--Select Academic Year--</option>
                            <option value="2026/2027">2026/2027</option>
                            <option value="2027/2028">2027/2028</option>
                            <option value="2028/2029">2028/2029</option>
                            <option value="2029/2030">2029/2030</option>
                        </select>
                        @error('academic_year')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="control-label col-form-label">Term</label>
                        <select name="term" class="form-control @error('term') is-invalid @enderror">
                            <option value="">--Select Term--</option>
                            <option value="1">Term 1</option>
                            <option value="2">Term 2</option>
                            <option value="3">Term 3</option>
                            <option value="4">Term 4</option>
                        </select>
                        @error('term')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3 position-relative">
                        <label class="control-label col-form-label">Class</label>
                        <div class="input-group">
                            <select name="class" class="form-control @error('class') is-invalid @enderror">
                                <option value="" disabled selected>Select Class</option>
                                @foreach ($classes as $class)
                                <option value="{{ $class->class }}">{{ $class->class }}</option>
                                @endforeach
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
                        <label class="control-label col-form-label">HW/WS</label>
                        <div class="input-group">
                            <select name="kind_of_assessment" class="form-control @error('kind_of_assessment') is-invalid @enderror">
                                <option value="" disabled selected>Select HW/WS</option>
                                <option value="HW">HW</option>
                                <option value="WS">WS</option>
                                <option value="Spelling">Spelling</option>
                                <option value="Writing">Writing</option>
                            </select>
                            @error('kind_of_assessment')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>


        </div>
    </div>
</div>

    @endsection
