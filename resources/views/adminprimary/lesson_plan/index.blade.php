@extends('adminprimary.layout')

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

        <div class="card col-md-6 col-lg-6 mx-auto">
            <div class="card-body">

                <form action="{{ route('admin_primary.weekly_lp.print') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="control-label col-form-label">Term</label>
                        <input type="text" name="term" class="form-control @error('term') is-invalid @enderror"
                            value="{{ $academicyears->term }}" />
                        @error('term')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3 position-relative">
                        <label class="control-label col-form-label">Week</label>
                        <div class="input-group">
                            <select name="week" class="form-control @error('week') is-invalid @enderror">
                                <option value="" disabled selected>Select Week</option>
                                @for ($i = 1; $i <= 10; $i++) <option value="{{ 'Week '.$i }}">{{ 'Week '.$i }}</option>
                                    @endfor
                            </select>

                            @error('week')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 position-relative">
                        <label class="control-label col-form-label">Class</label>
                        <div class="input-group">
                            <select name="class" class="form-control @error('class') is-invalid @enderror">
                                <option value="" disabled selected>Select Class</option>
                                @for ($i = 1; $i <= 6; $i++) <option value="{{ 'P'.$i }}">{{ 'P'.$i }}</option>
                                    @endfor
                            </select>
                            @error('class')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3 position-relative">
                                <label class="control-label col-form-label">Start Date</label>
                                <div class="input-group">
                                    <input type="date" name="start_date"
                                        class="form-control @error('start_date') is-invalid @enderror"
                                        value="{{ old('start_date') }}" />
                                    @error('start_date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3 position-relative">
                                <label class="control-label col-form-label">End Date</label>
                                <div class="input-group">
                                    <input type="date" name="end_date"
                                        class="form-control @error('end_date') is-invalid @enderror"
                                        value="{{ old('end_date') }}" />
                                    @error('end_date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Print</button>
                </form>
            </div>


        </div>
    </div>

    <script>
        function togglePassword() {
                const passwordInput = document.getElementById('password');
                const eyeIcon = document.getElementById('eyeIcon');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.remove('fa-eye');
                    eyeIcon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('fa-eye-slash');
                    eyeIcon.classList.add('fa-eye');
                }
            }

            function toggleConfirmPassword() {
            const passwordInput = document.getElementById('password_confirmation');
            const eyeIcon = document.getElementById('eyeIcon1');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
                } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
                }
            }
    </script>

    @endsection