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

        <div class="card col-md-12 col-lg-12 mx-auto">
            <div class="card-body">

                <b class="text-danger mb-5">Keterangan</b>
                <ol>
                    <li>Setelah REPORT disetujui (Approve), homeroom dapat mencetak rapor. Pada saat yang sama, akses
                        assessment record di akun teacher
                        akan terkunci.</li>
                    <li>Jika ingin membuka kembali akses assessment record untuk teacher, klik UNDO.</li>
                </ol>
                <table class="table table-striped table-bordered">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Class</th>
                        <th>Homeroom</th>
                        <th>Approval</th>
                    </tr>

                    @foreach ($classes as $class)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $class->homeroom_class }}</td>
                        <td>{{ $class->name }}</td>
                        <td class="text-center">
                            @if ($class->is_allow_print_report == 0)
                            <form id="deleteForm-{{ $class->id }}"
                                action="{{ route('admin_primary.report.approve', $class->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button tabindex="0" data-bs-toggle="tooltip" title="Approve"
                                    class="border-0 text-white btn btn-primary"><i
                                        class="ti ti-check"></i>Approve</button>
                            </form>
                            @else
                            <form id="deleteForm-{{ $class->id }}"
                                action="{{ route('admin_primary.report.undo', $class->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                <button tabindex="0" data-bs-toggle="tooltip" title="Approve"
                                    class="border-0 text-white btn btn-danger"><i
                                        class="ti ti-arrow-left"></i>Undo</button>
                            </form>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>


        </div>
    </div>

    @endsection