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

                <form action="{{ route('hs_teacher.lesson_material.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Class Dropdown -->
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

                    <!-- Subject Dropdown -->
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

                    <!-- Subject Dropdown -->
                    <div class="mb-3 position-relative">
                        <label class="control-label col-form-label">Description</label>
                        <div class="input-group">
                            <input type="text" name="description"
                                class="form-control @error('description') is-invalid @enderror" />
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Radio Button -->
                    <div class="mb-3 position-relative">
                        <label class="control-label col-form-label">Type of file</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioLink"
                                value="link">
                            <label class="form-check-label" for="radioLink">Link</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radioDefault" id="radioUpload"
                                value="upload">
                            <label class="form-check-label" for="radioUpload">Upload File</label>
                        </div>
                    </div>

                    <!-- File Upload -->
                    <div class="mb-3 position-relative" id="uploadGroup" style="display: none;">
                        <label class="control-label col-form-label">Upload File</label>
                        <input type="file" name="file_upload"
                            class="form-control @error('file') is-invalid @enderror" />
                        @error('file')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <!-- Paste Link -->
                    <div class="mb-3 position-relative" id="linkGroup" style="display: none;">
                        <label class="control-label col-form-label">Paste Link</label>
                        <input type="text" name="file_link" class="form-control @error('file') is-invalid @enderror" />
                        @error('file')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const radioLink = document.getElementById("radioLink");
            const radioUpload = document.getElementById("radioUpload");
            const linkGroup = document.getElementById("linkGroup");
            const uploadGroup = document.getElementById("uploadGroup");

            function toggleInputType() {
                if (radioLink.checked) {
                    linkGroup.style.display = "block";
                    uploadGroup.style.display = "none";
                } else if (radioUpload.checked) {
                    linkGroup.style.display = "none";
                    uploadGroup.style.display = "block";
                } else {
                    linkGroup.style.display = "none";
                    uploadGroup.style.display = "none";
                }
            }

            radioLink.addEventListener("change", toggleInputType);
            radioUpload.addEventListener("change", toggleInputType);
        });
    </script>

    @endsection