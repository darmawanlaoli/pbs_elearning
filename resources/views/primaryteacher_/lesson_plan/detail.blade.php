@extends('primaryteacher.layout')

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
                <table class="table">
                    <tr>
                        <th>Academic Year</th>
                        <td>{{ $lessonplan->academic_year }}</td>
                    </tr>
                    <tr>
                        <th>Term</th>
                        <td>{{ $lessonplan->term }}</td>
                    </tr>
                    <tr>
                        <th>Week</th>
                        <td>{{ $lessonplan->week }}</td>
                    </tr>
                    <tr>
                        <th>Teacher</th>
                        <td>{{ $lessonplan->teacher }}</td>
                    </tr>
                    <tr>
                        <th>Activities</th>
                        <td>{!! $lessonplan->activities !!}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>

@endsection