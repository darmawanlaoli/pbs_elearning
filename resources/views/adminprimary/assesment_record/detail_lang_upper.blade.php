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

                <a href="{{ route('admin_primary.assesment_record') }}" class="btn btn-primary mb-2"><i
                        class="ti ti-arrow-left"></i> Back</a>

                <div class="table-responsive">
                    <table style="font-size: 11px"
                        class="table table-striped table-bordered search-table align-middle text-nowrap" id="table">
                        <thead class="header-item text-center">
                            <tr class="text-uppercase">
                                <th>NO.</th>
                                <th>NAME OF STUDENT</th>
                                <th>UNDERSTANDING <br> CONCEPT</th>
                                <th>Demonstrates <br> neatness in <br> writing</th>
                                <th>Writes with <br> fluency</th>
                                <th>Reads <br> accurately with <br> understanding</th>
                                <th>Listens with <br> understanding</th>
                                <th>Expresses <br> ideas when <br> speaking</th>
                                <th>TOTAL</th>
                                <th>AVG</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($assesments as $assesment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $assesment->name }}</td>
                                <td style="width: 150px" class="text-center" style="width: 150px">{{ $assesment->concept
                                    }}</td>
                                <td class="text-center" style="width: 150px">{{ $assesment->lang_neatness_in_writing }}
                                </td>

                                <td class="text-center" style="width: 150px">{{ $assesment->lang_writes_with_fluency }}
                                </td>

                                <td class="text-center" style="width: 150px">{{ $assesment->lang_reads_accurately }}
                                </td>

                                <td class="text-center" style="width: 150px">{{
                                    $assesment->lang_listen_with_understanding }}</td>

                                <td class="text-center" style="width: 150px">{{ $assesment->lang_expresses_ideas }}</td>

                                <td class="text-center total-cell" style="width: 150px">
                                    {{ $assesment->concept + $assesment->lang_neatness_in_writing +
                                    $assesment->lang_writes_with_fluency + $assesment->lang_reads_accurately +
                                    $assesment->lang_expresses_ideas +
                                    $assesment->lang_listen_with_understanding }}
                                </td>


                                <td class="text-center avg-cell" style="width: 150px">
                                    {{ round(($assesment->concept + $assesment->lang_neatness_in_writing +
                                    $assesment->lang_writes_with_fluency + $assesment->lang_reads_accurately +
                                    $assesment->lang_expresses_ideas +
                                    $assesment->lang_listen_with_understanding) / 6) }}
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
</div>

@endsection
