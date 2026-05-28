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

        <div class="card col-md-8 col-lg-8 mx-auto">
            <div class="card-body">

                <form action="{{ route('admin_primary.student.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="control-label col-form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter student's name" value="{{ old('name') }}" />
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="control-label col-form-label">Username</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            placeholder="Enter username" value="{{ old('username') }}" />
                        @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="mb-3 position-relative">
                        <label class="control-label col-form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter password" />

                            <span class="input-group-text" onclick="togglePassword()" style="cursor: pointer;">
                                <i id="eyeIcon" class="fa fa-eye"></i>
                            </span>

                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 position-relative">
                        <label class="control-label col-form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                placeholder="Comfirm password" />

                            <span class="input-group-text" onclick="toggleConfirmPassword()" style="cursor: pointer;">
                                <i id="eyeIcon1" class="fa fa-eye"></i>
                            </span>
                        </div>

                        @error('password_confirmation')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3 position-relative">
                        <label class="control-label col-form-label">Class</label>
                        <div class="input-group">
                            
                            <select name="class" class="form-control">
                                <option value="P1 Tokyo">P1 Tokyo</option>
                                <option value="P1 Paris">P1 Paris</option>
                                <option value="P1 Berlin">P1 Berlin</option>
                                <option value="P2 Beijing">P2 Beijing</option>
                                <option value="P2 Madrid">P2 Madrid</option>
                                <option value="P2 Rome">P2 Rome</option>
                                <option value="P3 Cairo">P3 Cairo</option>
                                <option value="P3 Brasilia">P3 Brasilia</option>
                                <option value="P4 Wellington">P4 Wellington</option>
                                <option value="P4 Washington">P4 Washington</option>
                                <option value="P5 Ottawa">P5 Ottawa</option>
                                <option value="P5 London">P5 London</option>
                                <option value="P6 Canberra">P6 Canberra</option>
                                <option value="P6 Moscow">P6 Moscow</option>
                            </select>

                            @error('grade')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
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
