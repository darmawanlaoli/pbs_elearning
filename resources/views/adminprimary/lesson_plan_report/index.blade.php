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

                <form action="{{ route('admin_primary.lp_report_print') }}" method="POST">
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

                    <button type="submit" class="btn btn-primary mt-4">Check</button>
                </form>
            </div>
        </div>
    </div>

    @endsection