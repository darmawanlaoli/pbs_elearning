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
    </style>
</head>

<body>

    <form action="{{ route('kindergarten.assessment_record.store_report_data') }}" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <div class="container-fluid">
                <small>Pada saat menginput assessment record, pastikan tombol "Save" diklik secara berkala agar data tidak hilang.
                Jika Anda ingin menutup halaman ini, pastikan semua data sudah tersimpan.</small>
            <!-- Pembungkus / Wrapper sangat penting untuk position: sticky -->
            <div class="table-container">
                <table>
                    <thead>
                        <tr class="text-center">
                            <th style="min-width: 50px;">ID</th>
                            <th style="min-width: 180px;">Student Name</th>
                            <th>Comment</th>
                            <th>Presence</th>
                            <th>Absence</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($assessments as $assesment)
                        <tr>
                            <td>{{ $assesment->id }}</td>
                            <td>{{ $assesment->name }}</td>

                            <!-- Contoh Penulisan Tag Select & Attribute Name yang Benar untuk Form Submit -->
                            <td class="text-center">

                                <textarea name="assessments[{{ $assesment->id }}][comment]" rows="3" cols="70">{{ old("assessments.{$assesment->id}.comment", $assesment->comment ?? '') }}</textarea>
                            </td>

                            <td class="text-center">
                                <input type="number" name="assessments[{{ $assesment->id }}][presence]" value="{{ old("assessments.{$assesment->id}.presence", $assesment->presence ?? '') }}">
                            </td>

                            <td class="text-center">
                                <input type="number" name="assessments[{{ $assesment->id }}][absence]" value="{{ old("assessments.{$assesment->id}.absence", $assesment->absence ?? '') }}">
                            </td>



                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
