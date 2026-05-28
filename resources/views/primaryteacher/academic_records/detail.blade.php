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

                <table class="mb-5" style="width:100%">
                    <tr>
                        <th>Subject</th>
                        <th>: {{ $subject->subject }}</th>

                        <th>Academic Year</th>
                        <th>: {{ $subject->academic_year }}</th>
                    </tr>

                    <tr>
                        <th>Class</th>
                        <th>: {{ $subject->class }}</th>

                        <th>Term</th>
                        <th>: {{ $subject->term }}</th>
                    </tr>


                </table>

                <a href="{{ route('primary_teacher.academic_records') }}" class="btn btn-primary mb-2"><i
                        class="ti ti-arrow-left"></i>
                    Back</a>

                <table class="table table-bordered table-striped search-table align-middle text-nowrap" id="table">
                    <thead class="header-item text-center">
                        <tr>
                            <th>NO.</th>
                            <th>NAME OF STUDENT</th>
                            <th>UNDERSTANDING CONCEPT</th>
                            <th>DEMONSTRATE KNOWLEDGE</th>
                            <th>TOTAL</th>
                            <th>AVG</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($assesments as $assesment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $assesment->name }}</td>
                            <td style="width: 150px" class="text-center">{{ $assesment->concept }}</td>
                            <td class="text-center" style="width: 150px">{{ $assesment->demonstrate }}
                            </td>
                            <td class="text-center total-cell" style="width: 150px">
                                {{ $assesment->concept + $assesment->demonstrate }}
                            </td>
                            <td class="text-center avg-cell fw-bolder" style="width: 150px">
                                {{ round(($assesment->concept + $assesment->demonstrate) / 2) }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection