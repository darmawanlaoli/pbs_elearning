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

        <form action="{{ route('kindergarten.assessment_record.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="assessment_date" class="form-label">Academic Year</label>
                                <input type="text" class="form-control" id="assessment_date" name="academic_year"
                                    value="{{ $academic_year->academic_year }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="assessment_score" class="form-label">Term</label>
                                <input type="text" class="form-control" value="{{ $academic_year->term }}"
                                    id="assessment_score" name="term" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="class-select" class="form-label">Class</label>
                                <!-- 1. Tambahkan ID class-select & value pada option -->
                                <select name="class" id="class-select" class="form-control" required>
                                    <option value="">-- Select Class --</option>
                                    @foreach($selectedClasses as $class)
                                    <option value="{{ $class }}">{{ $class }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Report Card Distribution</label>
                                <input type="date" class="form-control" name="distribution_date"
                                    value="{{ $academic_year->distribution_date }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center align-middle bg-primary text-white">
                                    <th>Student Name</th>
                                    <th>Reg. Number</th>
                                    <th>Class</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Address</th>
                                    <th>Parents Name</th>
                                    <th>Teachers</th>
                                </tr>
                            </thead>
                            <!-- 2. Tambahkan tbody dengan ID student-table-body -->
                            <tbody id="student-table-body">
                                <tr>
                                    <td colspan="8" class="text-center">Silakan pilih kelas terlebih dahulu.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="checkbox" name="is_confirmed" id="is_confirmed" required>
                        <label for="is_confirmed">Saya sudah memastikan bahwa data tersebut sudah benar</label>
                    </div>

                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </div>
        </form>
    </div>

    <!-- 3. Tambahkan Script JavaScript/Fetch API -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const classSelect = document.getElementById('class-select');
    const tableBody = document.getElementById('student-table-body');

    classSelect.addEventListener('change', function() {
        const selectedClass = this.value;

        if (!selectedClass) {
            tableBody.innerHTML = '<tr><td colspan="8" class="text-center">Silakan pilih kelas terlebih dahulu.</td></tr>';
            return;
        }

        // Tampilkan status loading
        tableBody.innerHTML = '<tr><td colspan="8" class="text-center">Memuat data siswa...</td></tr>';

        // Panggil endpoint backend
        fetch(`{{ route('kindergarten.students.by_class') }}?class=${encodeURIComponent(selectedClass)}`)
            .then(response => response.json())
            .then(data => {
                tableBody.innerHTML = '';

                if (data.length === 0) {
                    tableBody.innerHTML = '<tr><td colspan="8" class="text-center">Tidak ada siswa di kelas ini.</td></tr>';
                    return;
                }

                data.forEach(student => {
                    const row = `
                        <tr>
                            <input type="hidden" name="student_ids[]" value="${student.id}">
                            <td>${student.name ?? '-'}</td>
                            <td>${student.registration_number ?? '-'}</td>
                            <td>${student.class ?? '-'}</td>
                            <td>${student.gender ?? '-'}</td>
                            <td>${student.dob ?? '-'}</td>
                            <td>${student.address ?? '-'}</td>
                            <td>${student.name_of_parents ?? '-'}</td>
                            <td>${student.teachers ?? '-'}</td>
                        </tr>
                    `;
                    tableBody.innerHTML += row;
                });
            })
            .catch(error => {
                console.error('Error fetching students:', error);
                tableBody.innerHTML = '<tr><td colspan="8" class="text-center text-danger">Gagal memuat data siswa.</td></tr>';
            });
    });
});
    </script>

    @endsection
