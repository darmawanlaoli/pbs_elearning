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
                <a href="{{ route('primary_teacher.lesson_material.create') }}" class="btn btn-primary mb-2"><i
                        class="ti ti-plus"></i> Upload</a>

                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                            <th>No.</th>
                            <th>Subject</th>
                            <th>Class</th>
                            <th>Description</th>
                            <th>File</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($lessonplans as $lesson)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lesson->subject }}</td>
                                <td>{{ $lesson->class }}</td>
                                <td>{{ $lesson->description }}</td>
                                <td>
                                    @if ($lesson->type === 'upload')
                                    <a tabindex="0" data-bs-toggle="tooltip" title="Download"
                                        class="m-1 badge text-white btn btn-primary"
                                        href="{{'/primary_lesson_material/'.$lesson->file}}"><i class="ti ti-arrow-down"></i>
                                        Download</a>

                                    @else
                                    <a tabindex="0" data-bs-toggle="tooltip" title="Link"
                                        class="m-1 badge text-white btn btn-primary" href="{{ $lesson->file }}"><i
                                            class="ti ti-link"></i> Link</a>
                                    @endif
                                </td>
                                <td class="d-flex">
                                    <div class="d-flex justify-content-center gap-1 flex-wrap">
                                        <form id="deleteForm-{{ $lesson->id }}"
                                            action="{{ route('primary_teacher.lesson_material.destroy', $lesson->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button tabindex="0" data-bs-toggle="tooltip" title="Hapus"
                                                class="m-1 tombol-hapus border-0 badge text-white btn btn-danger"><i
                                                    class="ti ti-trash"></i></button>
                                        </form>

                                    </div>
                                </td>
                            <tr>

                                @empty
                            <tr>
                                <td colspan="4">No data available</td>
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