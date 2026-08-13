@extends('hsstudent.layout')

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

                <form action="{{ route('hsstudent.assignment.submit', $assignments->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table">
                        <tr>
                            <th style="width: 50%">Subject</th>
                            <th>{{ $assignments->subject }}</th>
                        </tr>

                        <tr>
                            <th>Class</th>
                            <th>{{ $assignments->class }}</th>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <th>{{ $assignments->description }}</th>
                        </tr>

                        <tr>
                            <th>
                                <input type="file" name="response" class="form-control">
                            </th>
                            <th>
                                <button type="submit" class="btn btn-primary">Upload</button>

                                @if($assignments->response != '')
                                <a tabindex="0" data-bs-toggle="tooltip" title="Download" class="btn btn-primary"
                                    href="{{'/assignment_response/'.$assignments->response}}"><i class="ti ti-arrow-down"></i>
                                    Download</a>
                                @endif
                            </th>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
