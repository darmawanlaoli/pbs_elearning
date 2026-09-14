<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        * {
            box-sizing: border-box;
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
            padding: 8px 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
            background-color: #fff;
        }

        /* 1. Freeze Header (Arah Vertikal / Top) */
        thead th {
            position: sticky;
            top: 0;
            background-color: #f2f2f2;
            z-index: 10;
            white-space: normal;
            word-wrap: break-word;
            text-align: center;
            /* Sesuaikan lebar agar teks punya ruang untuk turun ke bawah */
            min-width: 90px;
        }

        /* 2. Freeze Kolom ID & Student Name (Arah Horizontal / Left) */

        /* Kolom 1 (ID) */
        th:nth-child(1),
        td:nth-child(1) {
            position: sticky;
            left: 0;
            z-index: 20;
            background-color: #f9f9f9;
        }

        /* Kolom 2 (Student Name) - Geser sejauh lebar Kolom 1 (~50px) */
        th:nth-child(2),
        td:nth-child(2) {
            position: sticky;
            left: 50px;
            /* Adjust sesuai lebar riil kolom ID */
            z-index: 20;
            background-color: #f9f9f9;
            border-right: 2px solid #bbb;
            /* Memberi pembatas visual tegas */
        }

        /* Sudut kiri atas (Pertemuan Header + Frozen Column) butuh z-index lebih tinggi */
        thead th:nth-child(1),
        thead th:nth-child(2) {
            z-index: 30;
            background-color: #e2e2e2;
        }

        .text-center {
            text-align: center;
        }

        .no-t1 {
            background-color: #A6A6A6;
            color: white;
            pointer-events:none;
        }

        .no-t1 select {
            background-color: #A6A6A6;
        }
    </style>
</head>

<body>

    <form action="{{ route('kindergarten.assessment_record.input_action') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="p-2">
            <a href="{{ route('kindergarten.assessment_record') }}" class="btn btn-success">Back</a>
            <button type="submit" class="btn btn-primary"><i class="ti ti-device-floppy"></i> Simpan</button>
        </div>
        <div class="container-fluid">
                <small>Pada saat menginput assessment record, pastikan tombol "Save" diklik secara berkala agar data tidak hilang.
                Jika Anda ingin menutup halaman ini, pastikan semua data sudah tersimpan.</small>
            <!-- Pembungkus / Wrapper sangat penting untuk position: sticky -->

        @if($assessments->contains(fn($item) => str_contains($item->class, 'K1')))
        @include('kindergarten.assessment_record.moduls.k1')
        @elseif($assessments->contains(fn($item) => str_contains($item->class, 'K2')))
        @include('kindergarten.assessment_record.moduls.k2')
        @else
        <div class="alert alert-info mt-5">
            Form untuk kelas yang Anda pilih belum tersedia, silahkan coba beberapa saat lagi.
        </div>
        @endif

        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
