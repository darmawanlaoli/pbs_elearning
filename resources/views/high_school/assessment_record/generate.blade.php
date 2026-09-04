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

                <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                        <thead class="header-item">
                            <th>No.</th>
                            <th>Student's Name</th>
                        </thead>
                        <tbody>
                            @forelse ($students as $student)
                            <tr class="bg-danger">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                            <tr>

                                @empty
                            <tr>
                                <td colspan="2">No data available</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                <form action="{{ route('high_school.assessment_record.generate_action', $assessment->id) }}" method="POST">
                    @csrf
                    <div class="mb-3"><input type="checkbox" name="is_confirmed" id="is_confirmed" required>
                        <label for="is_confirmed">Data siswa tersebut sudah benar dan lengkap</label>
                    </div>

                    <button class="btn btn-primary" type="submit">Generate</button>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
