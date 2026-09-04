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


        <div class="card card-custome">

            <div class="card-body">
                <a href="{{ route('high_school.assessment_record.create') }}" class="btn btn-primary mb-2"><i
                        class="ti ti-plus"></i> New</a>

                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                            <th>No.</th>
                            <th>Academic Year</th>
                            <th>Term</th>
                            <th>Class</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($assesments as $assesment)
                            <tr class="bg-danger">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $assesment->academic_year }}</td>
                                <td>{{ $assesment->term }}</td>
                                <td>{{ $assesment->class }}</td>
                                <td>{{ $assesment->subject }}</td>

                                @if($academicyears['term'] == $assesment->term)
                                <td class="d-flex">

                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                     <form id="deleteForm-{{ $assesment->id }}"
                                         action="{{ route('high_school.assessment_record.destroy', $assesment->id) }}" method="POST">
                                           @csrf
                                          @method('DELETE')
                                           <button tabindex="0" data-bs-toggle="tooltip" title="Delete"
                                                class="btn btn-danger btn-sm m-1"><i
                                                   class="ti ti-trash"></i></button>
                                        </form>
                                    </div>

                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                        <form action="{{ route('high_school.assessment_record.generate', $assesment->id) }}" method="POST">
                                            @csrf
                                            <button tabindex="0" data-bs-toggle="tooltip" title="Generate Students" class="btn btn-sm btn-primary m-1"><i
                                                    class="ti ti-pencil"></i> Generate</button>
                                        </form>
                                    </div>

                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                        <form action="{{ route('high_school.assessment_record.input', $assesment->id) }}" method="POST">
                                            @csrf
                                            <button tabindex="0" data-bs-toggle="tooltip" title="Generate Students" class="btn btn-sm btn-success m-1"><i
                                                    class="ti ti-pencil"></i> Input</button>
                                        </form>
                                    </div>

                                </td>
                                @else
                                <td class="text-center"><span class="btn btn-sm btn-danger"><i class="ti ti-lock"></i></span></td>
                                <td class="text-center"><span class="btn btn-sm btn-danger"><i class="ti ti-lock"></i></span></td>
                                @endif
                            <tr>

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
