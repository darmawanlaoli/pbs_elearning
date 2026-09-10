<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css"
        integrity="sha512-QeR2VH+lsBE5LSAe1Q5EnTBbe7XTBubt8dG93Y7gidSgdMCr8nVqKcfKAMyN96SV8KDbZVTDXChatu5G2KQGzg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        * {
            box-sizing: border-box;
        }

        .total {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        /* Container dengan scroll internal agar sticky berfungsi */
        .table-container {
            max-width: 100%;
            max-height: 80vh;
            /* Tinggi maksimum tabel sebelum scroll muncul */
            overflow: auto;
            /* Mengaktifkan scroll horizontal & vertikal */
            border: 1px solid #ccc;
        }

        table {
            border-collapse: separate;
            /* Ubah dari collapse agar posisi border sticky tidak glitch */
            border-spacing: 0;
            width: 100%;
            white-space: nowrap;
            font-size: 12px;
        }

        th,
        td {
            padding: 2px 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
            background-color: #fff;
        }

        th {
            text-align: center;
            background-color: #0182cd;
            color: white;
        }

        .text-center {
            text-align: center;
        }

        .score-input {
            width: 50px;
        }

        /* =========================================
           PENGATURAN STICKY HEADER (ATAS)
        ========================================= */
        /* Baris ke-1 Header (Judul Kolom Utama) */
        thead tr:nth-child(1) th {
            position: sticky;
            top: 0;
            height: 35px;
            /* Mengunci tinggi baris pertama */
            z-index: 10;
            background-clip: padding-box;
            /* Mencegah border bocor saat scroll */
        }

        /* Baris ke-2 Header (Sub-kategori: 1, 2, 3, AVG, dll) */
        thead tr:nth-child(2) th {
            position: sticky;
            top: 35px;
            /* Harus sama dengan 'height' baris pertama di atas */
            z-index: 10;
            background-clip: padding-box;
        }

        /* =========================================
           PENGATURAN STICKY COLUMNS (KIRI)
        ========================================= */
        /* Kolom 1: No */
        thead tr:first-child th:nth-child(1),
        tbody td:nth-child(1) {
            width: 50px;
            min-width: 50px;
            max-width: 50px;
            position: sticky;
            left: 0;
            background-color: #fff;
            z-index: 5;
        }

        /* Kolom 2: Student Name */
        thead tr:first-child th:nth-child(2),
        tbody td:nth-child(2) {
            width: 180px;
            min-width: 180px;
            position: sticky;
            left: 50px;
            /* Offset posisinya sebesar lebar kolom pertama (50px) */
            background-color: #fff;
            z-index: 5;
        }

        /* =========================================
           INTERSECTION KIRI ATAS (Supaya tidak tertimpa)
        ========================================= */
        /* Memastikan judul "No" dan "Student Name" selalu berada di tumpukan paling atas */
        thead tr:first-child th:nth-child(1),
        thead tr:first-child th:nth-child(2) {
            background-color: #0182cd;
            /* Kembalikan ke warna biru header */
            z-index: 20;
            /* Z-index tertinggi */
        }
    </style>

</head>

<body>

    <div class="container-fluid">
        <!-- 1. FORM SUBMIT DIPINDAH KE ATAS / LUAR (TIDAK TERLIHAT DI LAYOUT) -->
        @if (session('role') == 'hsteacher')
            @if ($reportData->submitted_at == null)
                <form id="form-submit-assessment"
                    action="{{ route('high_school.assessment_record.submit', $reportData->id) }}" method="POST"
                    style="display: none;">
                    @csrf
                    @method('PUT')
                </form>
            @endif
        @endif

        <!-- 2. FORM UTAMA (SAVE) -->
        <form action="{{ route('high_school.assessment_record.input_action') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="m-2 d-flex align-items-center gap-2">
                @include('high_school.assessment_record.moduls.back_btn')

                <button type="submit" class="btn btn-primary">
                    <i class="fa-regular fa-floppy-disk"></i> Save
                </button>


                @if (session('role') == 'hsteacher')


                    <!-- TAMPILAN TOMBOL SUBMIT TETAP DI SINI -->
                    @if ($reportData->submitted_at == null)
                        <!-- Ditambahkan atribut form="form-submit-assessment" -->
                        <button type="submit" form="form-submit-assessment" class="btn btn-success">
                            <i class="fa-solid fa-circle-arrow-right"></i> Submit
                        </button>
                    @else
                        <i>Sudah submit pada {{ $reportData->submitted_at }}</i>
                    @endif
                @elseif (session('role') == 'hsadmin')
                    <i>Disubmit pada {{ $reportData->submitted_at }}</i>
                @endif


                <!-- Teks ini otomatis terdorong ke paling kanan -->
                <span class="ms-auto fw-bold text-primary">{{ $reportData->class }}</span>
            </div>

            <div class="container-fluid">
                <small>
                    Pada saat menginput report data, pastikan tombol "Save" diklik secara berkala
                    agar data tidak hilang.
                    Jika Anda ingin menutup halaman ini, pastikan semua data sudah tersimpan.
                </small>

                @include('high_school.internal_report.moduls.input_report_data')


            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const inputs = document.querySelectorAll('.score-input');

            inputs.forEach(input => {

                input.addEventListener('paste', function(e) {

                    e.preventDefault();

                    const clipboardData = e.clipboardData || window.clipboardData;
                    const text = clipboardData.getData('text');

                    // Ambil data dari clipboard
                    const values = text
                        .split(/\r?\n/)
                        .map(value => value.trim())
                        .filter(value => value !== '');

                    // Cari posisi input yang sedang aktif
                    const currentRow = this.closest('tr');

                    if (!currentRow) {
                        return;
                    }

                    // Cari index kolom input
                    const currentInput = this;

                    // Ambil semua row
                    const rows = Array.from(
                        document.querySelectorAll('tbody tr')
                    );

                    // Posisi row saat ini
                    let rowIndex = rows.indexOf(currentRow);

                    // Untuk setiap value dari clipboard
                    values.forEach(value => {

                        if (rowIndex >= rows.length) {
                            return;
                        }

                        // Cari input dengan posisi kolom yang sama
                        const targetRow = rows[rowIndex];

                        const inputsInRow = Array.from(
                            targetRow.querySelectorAll('.score-input')
                        );

                        const inputsInCurrentRow = Array.from(
                            currentRow.querySelectorAll('.score-input')
                        );

                        const columnIndex = inputsInCurrentRow.indexOf(currentInput);

                        if (
                            columnIndex !== -1 &&
                            inputsInRow[columnIndex]
                        ) {
                            inputsInRow[columnIndex].value = value;

                            // Trigger event input
                            inputsInRow[columnIndex].dispatchEvent(
                                new Event('input', {
                                    bubbles: true
                                })
                            );
                        }

                        rowIndex++;
                    });

                });

            });

        });
    </script>


    {{-- cegah maksimal 5 --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const attInputs = document.querySelectorAll('.att-input');

            attInputs.forEach(input => {

                input.addEventListener('input', function() {

                    let value = parseFloat(this.value);

                    if (isNaN(value)) {
                        return;
                    }

                    // Maksimal 5
                    if (value > 5) {
                        this.value = 5;
                    }

                    // Minimal 0
                    if (value < 0) {
                        this.value = 0;
                    }

                });

            });

        });
    </script>

</body>

</html>
