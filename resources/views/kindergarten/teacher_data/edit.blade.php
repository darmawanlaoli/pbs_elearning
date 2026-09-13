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

    <form action="{{ route('kindergarten.teacher_data.update', $teacher->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">

                    <div class="card-body">
                            <div class="mb-3">
                                <label class="control-label col-form-label">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter teacher's name" value="{{ $teacher->name }}" />
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="control-label col-form-label">Username</label>
                                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                                    placeholder="Enter username" value="{{ $teacher->username }}" />
                                @error('username')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-3 position-relative">
                                <label class="control-label col-form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="Enter password" />

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
                                        class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Comfirm password" />

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
                                    <select name="class[]" id="class" class="form-control select2" multiple>

                                        @foreach ($classes as $class)
                                        <option value="{{ $class->class }}" {{ in_array($class->class, $selectedClasses) ? 'selected' : '' }}>
                                            {{ $class->class }}
                                        </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>

                    </div>
                </div>
            </div>

        </div>

    </form>

</div>


@endsection
