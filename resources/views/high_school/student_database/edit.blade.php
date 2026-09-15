@extends('layout.' . strtolower(session('role')))

@section('content')
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

    <!-- Tambahkan Form di sini -->
    <form action="{{ route('high_school.database.students.bulk-update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="card card-body">
            <div class="d-flex justify-content-end mb-3">
                <button type="submit" class="btn btn-primary">Update All</button>
            </div>

            <div class="table-responsive">
                <table class="table search-table align-middle text-nowrap">
                    <thead class="header-item">
                        <tr>
                            <th>No.</th>
                            <th>Reg. Number</th>
                            <th>Name</th>
                            <th>Religion</th>
                            <th>Grade</th>
                            <th>Class</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <!-- Reg Number -->
                            <td>
                                <input type="text" name="students[{{ $student->id }}][reg_number]" value="{{ old("
                                    students.{$student->id}.reg_number", $student->reg_number) }}"
                                class="form-control">
                            </td>

                            <!-- Name -->
                            <td>
                                <input type="text" name="students[{{ $student->id }}][name]" value="{{ old("
                                    students.{$student->id}.name", $student->name) }}"
                                class="form-control">
                            </td>

                            <!-- Religion -->
                            <td>
                                <select name="students[{{ $student->id }}][religion]" class="form-control">
                                    <option value="">-- Select Religion --</option>
                                    @php $religions = ['Christian', 'Islam', 'Catholic', 'Hindu', 'Buddha']; @endphp
                                    @foreach($religions as $religion)
                                    <option value="{{ $religion }}" @selected(old("students.{$student->id}.religion",
                                        $student->religion) == $religion)>
                                        {{ $religion }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <!-- Grade -->
                            <td>
                                <select name="students[{{ $student->id }}][grade]" class="form-control">
                                    <option value="">-- Select Grade --</option>
                                    @php $grades = ['Y7', 'Y8', 'Y9', 'Y10', 'Y11', 'Y12']; @endphp
                                    @foreach($grades as $grade)
                                    <option value="{{ $grade }}" @selected(old("students.{$student->id}.grade",
                                        $student->grade) == $grade)>
                                        {{ $grade }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <!-- Class -->
                            <td>
                                <select name="students[{{ $student->id }}][class]" class="form-control">
                                    <option value="">-- Select Class --</option>
                                    @foreach($classes as $class)
                                    <option value="{{ $class->class }}" @selected(old("students.{$student->id}.class",
                                        $student->class) == $class->class)>
                                        {{ $class->class }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No data available</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
@endsection
