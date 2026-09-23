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
        src: url('/assets/font/arialroundedmtbold.ttf')format('truetype');
    }

    .report-container {
        font-family: 'FontKustomKu';
        counter-reset: page-counter;
    }

    table tr .subject {
        width: 45%;
    }

    tr td .nilai {
        padding-top: 13px;
        padding-bottom: 13px;
        background-color: red !important;
    }

    table,
    td,
    th {
        border: 2px solid black;
        padding-left: 10px;
        padding-right: 10px;
        font-family: 'FontKustomKu';
    }

    table {
        border-collapse: collapse;
        /* table-layout: fixed; */
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
        outline: 6px solid rgb(247, 134, 3);
        outline-offset: -8mm;
        /* geser ke dalam */
        counter-increment: page-counter;
    }

    .footer .right::after {
        content: "Page " counter(page-counter);
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
</style>

<?php $grade = Str::substr(session('homeroom_class'), 0, 2); ?>

<div class="container-fluid">

    <div class="widget-content searchable-container list">

        <div class="card mb-3 col-md-6 col-lg-6 mx-auto mt-3">
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
                        <button type="submit" name="print" class="btn btn-primary" type="button"
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
