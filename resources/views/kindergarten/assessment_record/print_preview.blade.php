
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
    @page {
        size: A4 portrait;
        margin: 0; /* Menghilangkan margin bawaan browser saat cetak */
    }
    .report-container {
        font-family: calibri, Cochin, Georgia, Times, 'Times New Roman', serif
    }

    table
    td,
    tbody,
    th {
        border: 2px solid black;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 3px;
        padding-bottom: 3px;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    .subject {
        font-size: 16px;
    }

    .header {
        background-color: #FCD5B4;
        font-weight: bold;
        text-align: center;
        color: black;
    }

    .page {
        width: 210mm;
        height: 297mm;
        margin: 18px auto;
        background: white;
        padding: 12mm;
        box-sizing: border-box;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        position: relative;
        margin-bottom: 30px;
        /* background-image: url('https://elearning.peachblossomsschool.sch.id/assets/images/logos/logo.png'); */
        background-repeat: no-repeat;
        background-position: center;
        background-size: 450px;
        outline: 4px solid #4472C4;
        outline-offset: -8mm;
        /* geser ke dalam */
    }

    body {
        margin: 0;
        padding: 0;
        background: #ccc;
        /* Warna abu-abu agar halaman A4 terlihat menonjol */
    }

    .li {
        list-style-type: disc;
        margin-left: 20px;
    }

    li {
        line-height: 17px;
    }

    .footer {
        position: absolute;
        bottom: 8mm;
        /* jarak dari bawah kertas */
        left: 0;
        width: 100%;
        font-size: 14px;

        display: flex;
        justify-content: space-between;
        /* kiri dan kanan */
        padding: 0 13mm;
        /* sejajar dengan padding isi */
        box-sizing: border-box;
    }

    .logo {
        width: 120px;
    }

    .cover-table {
        font-size: 20px;
    }

    .cover-table tr {
        border: none;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .cover-table td {
        border: none;
        padding-top: 13px;
        padding-bottom: 13px;
    }

    .kotak-foto {
        width: 3cm;
        height: 4cm;
        border: 2px solid black;
    }


    .title {
        text-align: center;
        text-transform: uppercase;
        font-size: 18px;
        line-height: 20px;
        margin-top: 10px;
    }

    table .th-desc {
        width: 370px;
    }

    .header{
        text-align: center;
    }

    .disabled {
        background-color: #a6a6a6;
        color: white;
    }

    thead .th-header {
        text-align: center;
        background-color: #2F75B5;
        color: white;
    }

    .thead tr td {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }

    /* Container utama: 3 kolom sejajar */
    .signature-row {
    display: flex;
    justify-content: space-between;
    align-items: flex-end; /* Memastikan bagian bawah (nama/NIP) rata sejajar */
    margin-top: 30px;
    }

    /* Box masing-masing penandatangan */
    .signature-box {
    text-align: center;
    width: 30%; /* Membagi lebar sama rata */
    }

    .signature-box p {
    margin: 3px 0;
    }

    /* Jarak untuk area tanda tangan basah */
    .signature-space {
    height: 75px;
    }

    .signature-name {
    font-weight: bold;
    text-decoration: underline;
    }

    .signature-row {
    font-size: 10pt;
    }

    @media print {

        html, body {
            width: 210mm;
            height: 297mm;
            background: white !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        .page {
            width: 210mm !important;
            height: 297mm !important;
            margin: 0 !important;
            box-shadow: none !important;
            border: none !important;
            background-color: white !important; /* Hapus background red yang sebelumnya ada */
            page-break-after: always; /* Memastikan setiap .page menjadi 1 halaman utuh */
            page-break-inside: avoid;
        }

        .page {
            box-shadow: none;
            margin: 0;
        }

        .no-print {
            display: none !important;
        }

        .page {
            box-shadow: none !important;
            margin: 0 auto;
            position: relative;
        }
    }
</style>

<?php $grade = Str::substr(session('homeroom_class'), 0, 2) ?>

@php
$isDisabledT1 = $assessment->term === 'Term 1' ? 'disabled' : '';
@endphp

<div class="container-fluid">

    <div class="widget-content searchable-container list">

        <div class="card mb-3 mt-2 col-md-7 col-lg-7 mx-auto no-print">
            <div class="card-body">
                <p class="text-center">Sebelum print rapor, pastikan sudah membaca <a target="blank"
                        href="https://drive.google.com/file/d/1mNbFX0zcd4cXMEnI-ZrN6w1w0Tw3Wyje/view?usp=sharing">panduan
                        ini</a></p>

                <form action="" method="GET">
                    @csrf
                    <div class="input-group">
                        <select name="student_name" id="" class="form-control">
                            <option value="">Select Student</option>
                            @foreach ($assessments as $student)
                            <option value="{{ $student->name }}" {{ request('student_name')==$student->name ? 'selected' : ''
                                }}>
                                {{ $student->name }}
                            </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-secondary" type="button" id="button-addon2"><i
                                class="ti ti-eye"></i>
                            Show</button>
                        <button type="submit" onclick="window.print()" name="print" class="btn btn-primary" type="button" id="button-addon2"><i
                                class="ti ti-printer"></i>
                            Print</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="cardS">

            <div class="card-bodyS report-container">

                @if ($request)
                @if($assessments->contains(fn($item) => str_contains($item->class, 'K1')))
                @include('kindergarten.assessment_record.report_moduls.k1')
                @elseif($assessments->contains(fn($item) => str_contains($item->class, 'K2')))
                @include('kindergarten.assessment_record.report_moduls.k2')
                @elseif($assessments->contains(fn($item) => str_contains($item->class, 'Pre-K')))
                @include('kindergarten.assessment_record.report_moduls.pre-k')
                @elseif($assessments->contains(fn($item) => str_contains($item->class, 'Nursery')))
                @include('kindergarten.assessment_record.report_moduls.nursery')
                @else
                <div class="col-6 mx-auto alert alert-info mt-5">
                    Rapor untuk kelas yang Anda pilih belum tersedia, silahkan coba beberapa saat lagi.
                </div>
                @endif

                @else
                <div class="text-center h5"><i>Please select a student</i></div>
                @endif
            </div>
        </div>
    </div>
</div>



<script>
    function info(){
        Swal.fire({
        icon: "info",
        title: "Info",
        text: "Rapor belum bisa dicetak, karena assesment record belum lengkap"
        });
    }
</script>

