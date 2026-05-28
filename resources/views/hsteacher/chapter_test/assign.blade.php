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
                
                <table class="table">
                    
                    <tr>
                        <td>Subject</td>
                        <td>: {{ $cts->subject}}</td>
                    </tr>
                    
                    <tr>
                        <td>Class</td>
                        <td>: {{ $cts->class}}</td>
                    </tr>
                </table>

                <form action="{{ route('hs_teacher.ct.assign_action') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    
                    <button type="submit" class="btn btn-primary mt-3">Assign All</button>
                    
                    
                    
                    <table class="table table-bordered mt-3">
                        
                        @forelse ($students as $index => $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                        
                            <td>
                                <input type="text" value="{{ $student->name }}" class="form-control" name="students[{{ $index }}][name]" readonly>
                            </td>
                        
                            <td>
                                <input type="text" value="{{ $cts->class }}" class="form-control" name="students[{{ $index }}][class]" readonly>
                            </td>
                        
                            <td>
                                <input type="hidden" value="{{ $cts->id }}" class="form-control" name="students[{{ $index }}][id]">
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No data available</td>
                        </tr>
                        @endforelse


                    </table>
                    
                    
                    
                    
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