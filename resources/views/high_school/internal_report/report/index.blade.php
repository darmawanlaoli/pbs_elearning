<!--  Required Meta Tag -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="handheldfriendly" content="true" />
<meta name="MobileOptimized" content="width" />
<meta name="description" content="Mordenize" />
<meta name="author" content="" />
<meta name="keywords" content="Mordenize" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logo_sm.png') }}" />
<!-- Owl Carousel  -->
<link rel="stylesheet" href="{{ asset('assets/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />

<!-- Core Css -->
<link id="themeColors" rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}" />
<link id="themeColors" rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- select2 --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

<style>
    @font-face {
        font-family: 'FontKustomKu';
        src: url('/assets/font/arialroundedmtbold.ttf') format('truetype');
    }

    /* --- 1. Reset Global --- */
    * {
        box-sizing: border-box !important;
        color: black !important;
    }

    html,
    body {
        margin: 0;
        padding: 0;
        background: #ccc;
        color: black;
    }

    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
    }

    /* --- 2. Kontainer Halaman Layar Monitor --- */
    .page {
        width: 210mm;
        height: 297mm;
        margin: 18px auto 30px auto;
        background: white;
        padding: 12mm;
        position: relative;
        overflow: hidden;

        background-image: url('https://elearning.peachblossomsschool.sch.id/assets/images/logos/bg-rapor.png');
        background-repeat: no-repeat;
        background-position: center;
        background-size: 650px;

        /* Garis bingkai oranye presisi di dalam */
        box-shadow: inset 0 0 0 6px rgb(247, 134, 3);
        counter-increment: page-counter;
    }

    .report-container {
        font-family: 'FontKustomKu';
        counter-reset: page-counter;
    }

    /* --- 3. Elemen Tabel --- */
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 15px;
    }

    table,
    td,
    th {
        border: 2px solid black;
        padding: 2px 5px;
        font-family: 'FontKustomKu';
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    table tr .subject {
        width: 45%;
    }

    tr td .nilai {
        padding-top: 13px;
        padding-bottom: 13px;
        background-color: red !important;
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

    .li {
        list-style-type: disc;
        margin-left: 20px;
    }

    li {
        line-height: 17px;
    }

    /* --- 4. Footer --- */
    .footer {
        position: absolute;
        bottom: 3mm;
        left: 0;
        width: 100%;
        font-size: 11px;
        display: flex;
        justify-content: space-between;
        padding: 0 13mm;
    }

    .footer .right::after {
        content: "Page " counter(page-counter);
    }

    /* --- 5. Fix Khusus Cetak (Print Simetris Atas-Bawah-Kiri-Kanan) --- */
    @media print {
        @page {
            size: A4 portrait;
            margin: 0;
            /* Menghilangkan margin fisik kertas */
        }

        html,
        body {
            width: 210mm !important;
            height: 297mm !important;
            margin: 0 !important;
            padding: 0 !important;
            background: white !important;
            display: block !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        .filter-card {
            display: none !important;
        }

        .page {
            /* Menyesuaikan sedikit skala internal agar tidak meluap akibat margin printer */
            width: 200mm !important;
            height: 285mm !important;
            margin: 6mm auto !important;
            /* Memberikan jarak seimbang atas dan bawah */
            padding: 10mm !important;
            position: relative !important;

            box-shadow: inset 0 0 0 6px rgb(247, 134, 3) !important;
            outline: none !important;

            page-break-after: always;
            page-break-inside: avoid;
        }
    }
</style>

<?php $grade = Str::substr(session('homeroom_class'), 0, 2); ?>

<div class="container-fluid">

    <div class="widget-content searchable-container list">

        <div class="card mb-3 col-md-6 col-lg-6 mx-auto mt-3 filter-card">
            <div class="card-header font-weight-bold">Print Rapor {{ $current_term }}</div>
            <div class="card-body">
                <p class="text-center">Sebelum print rapor, pastikan sudah membaca <a target="blank"
                        href="https://drive.google.com/file/d/1mNbFX0zcd4cXMEnI-ZrN6w1w0Tw3Wyje/view?usp=sharing">panduan
                        ini</a></p>

                <form action="" method="GET">
                    @csrf
                    <div class="input-group">
                        <select name="student" id="" class="form-control">
                            <option value="">Select Student</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->name }}"
                                    {{ request('student') == $student->name ? 'selected' : '' }}>
                                    {{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-secondary" type="button" id="button-addon2"><i
                                class="ti ti-eye"></i>
                            Show</button>
                        <button type="submit" onclick="window.print()" name="print" class="btn btn-primary" type="button"
                            id="button-addon2"><i class="ti ti-printer"></i>
                            Print</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="cards">

            <div class="cards-body report-container">

                @if ($murid)

                <?php
                $grade = substr($murid->class, 0, 2)
                ?>

                @if($grade == 'Y7' || $grade == 'Y8' || $grade == 'Y9')
                @include('high_school.internal_report.report.jhs')
                @else
                @include('high_school.internal_report.report.shs')
                @endif


                @else
                    <div class="text-center h5"><i>Please select a student</i></div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    function info() {
        Swal.fire({
            icon: "info",
            title: "Info",
            text: "Rapor belum bisa dicetak, karena assesment record belum lengkap"
        });
    }
</script>
