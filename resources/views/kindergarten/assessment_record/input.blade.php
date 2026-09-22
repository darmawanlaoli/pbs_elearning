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

        /* 1. Freeze Header Vertikal (Top) */
        thead th {
        position: sticky;
        top: 0;
        background-color: #f2f2f2;
        z-index: 10;
        white-space: normal;
        word-wrap: break-word;
        text-align: center;
        min-width: 90px;
        }

        /* Biar baris header kedua tetap sticky di bawah baris header pertama */
        thead tr:nth-child(2) th {
            top: 34.5px; /* Sesuaikan angka ini dengan tinggi baris header pertama */
        }

        /* 2. Freeze Kolom ID & Student Name (Gunakan Class khusus) */
        .frozen-col-1 {
            position: sticky !important;
            left: 0 !important;
            z-index: 20 !important;
            background-color: #f9f9f9;
        }

        .frozen-col-2 {
            position: sticky !important;
            left: 50px !important; /* Sesuaikan dengan lebar kolom No */
            z-index: 20 !important;
            background-color: #f9f9f9;
            border-right: 2px solid #bbb !important;
        }

        /* Perpotongan Header Top + Frozen Column (Sudut Kiri Atas) */
        thead th.frozen-col-1,
        thead th.frozen-col-2 {
            z-index: 30 !important;
            background-color: #e2e2e2 !important;
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

        <div class="p-2">
            <a href="{{ route('kindergarten.assessment_record') }}" class="btn btn-success">Back</a>
        </div>

        <div class="container-fluid">
                <small>Pada saat menginput assessment record, pastikan tombol "Save" diklik secara berkala agar data tidak hilang.
                Jika Anda ingin menutup halaman ini, pastikan semua data sudah tersimpan.</small>
            <!-- Pembungkus / Wrapper sangat penting untuk position: sticky -->

        @if($assessments->contains(fn($item) => str_contains($item->class, 'K1')))
        @include('kindergarten.assessment_record.moduls.k1')
        @elseif($assessments->contains(fn($item) => str_contains($item->class, 'K2')))
        @include('kindergarten.assessment_record.moduls.k2')
        @elseif($assessments->contains(fn($item) => str_contains($item->class, 'Pre-K')))
        @include('kindergarten.assessment_record.moduls.prek')
        @elseif($assessments->contains(fn($item) => str_contains($item->class, 'Nursery')))
        @include('kindergarten.assessment_record.moduls.nursery')
        @else
        <div class="alert alert-info mt-5">
            {{ session('name') }}
        </div>
        @endif

        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
