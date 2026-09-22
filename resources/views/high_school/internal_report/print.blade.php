@extends('layout.' . strtolower(session('role')))

@section('content')

    <style>
        @font-face {
            font-family: 'FontKustomKu';
            src: url('/assets/font/arialroundedmtbold.ttf')format('truetype');
        }

        .report-container {
            font-family: 'FontKustomKu';
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

            <div class="card mb-3 col-md-8 col-lg-8 mx-auto">
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

                        {{-- halaman 1 --}}
                        <div class="page">

                            <div
                                style=" display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px">

                                <div class="logo">
                                    <img style="margin: auto; display: block; width: 100px"
                                        src="https://peachblossomsschool.sch.id/images/logo_imyc.webp" alt="">
                                </div>

                                <div class="judul">
                                    <h4 class="text-center mt-2 mb-3"><b>STUDENT PROGRESS REPORT CARD <br> PEACHBLOSSOMS
                                            HIGH
                                            SCHOOL</b>
                                    </h4>
                                </div>

                                <div class="logo">
                                    <img style="margin: auto; display: block; width: 100px"
                                        src="https://elearning.peachblossomsschool.sch.id/assets/images/logos/logo.png"
                                        alt="">
                                </div>

                            </div>

                            <table style="font-weight: bold; margin-top: 50px; margin-bottom: 50px">

                                <tr>
                                    <td>STUDENT</td>
                                    <td>{{ $murid->name }}</td>
                                </tr>

                                <tr>
                                    <td>STUDENT NUMBER</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>GRADE</td>
                                    <td>{{ $murid->class }}</td>
                                </tr>

                                <tr>
                                    <td>TERM/SEMESTER</td>
                                    <td>{{ '1 / I' }}</td>
                                </tr>

                                <tr>
                                    <td>ACADEMIC YEAR</td>
                                    <td>{{ '2026 / 2027' }}</td>
                                </tr>
                            </table>




                            {{-- Religious --}}
                            <table class="mt-2" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th>RELIGIOUS EDUCATION</th>
                                    <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
                                    <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
                                </tr>

                                <tr>
                                    <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                </tr>

                                <tr>
                                    <td>{{ $religious->ku_total ?? 0 }}</td>
                                    <td>{{ round($meanReligious->mean_religious_ku) }}</td>
                                    <td>{{ $religious->dk_total ?? 0 }}</td>
                                    <td>{{ round($meanReligious->mean_religious_dk) }}</td>
                                </tr>

                                <tr>
                                    <td rowspan="3">LEARNING BEHAVIOURS</td>
                                    <td colspan="3">Personal Management Skill</td>
                                    <td>{{ $religious->management_skill ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Active Participation In Learning</td>
                                    <td>{{ $religious->active_participation ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Social Responsibility</td>
                                    <td>{{ $religious->social_responsibility ?? 0 }}</td>
                                </tr>
                            </table>

                            {{-- PKN --}}
                            <table class="mt-5" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th>PENDIDIKAN KEWARGANEGARAAN</th>
                                    <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
                                    <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
                                </tr>

                                <tr>
                                    <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                </tr>

                                <tr>
                                    <td>{{ $pkn->ku_total ?? '' }}</td>
                                    <td>{{ round($meanPKn->mean_ku) }}</td>
                                    <td>{{ $pkn->dk_total ?? '' }}</td>
                                    <td>{{ round($meanPKn->mean_dk) }}</td>
                                </tr>

                                <tr>
                                    <td rowspan="3">LEARNING BEHAVIOURS</td>
                                    <td colspan="3">Personal Management Skill</td>
                                    <td>{{ $pkn->management_skill ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Active Participation In Learning</td>
                                    <td>{{ $pkn->active_participation ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Social Responsibility</td>
                                    <td>{{ $pkn->social_responsibility ?? 0 }}</td>
                                </tr>
                            </table>


                            {{-- B. INDO --}}
                            <table class="mt-5" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th>BAHASA INDONESIA</th>
                                    <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
                                    <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
                                </tr>

                                <tr>
                                    <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                </tr>

                                <tr>
                                    <td>{{ $indonesia->lang_total_ku ?? '' }}</td>
                                    <td>{{ round($meanIndonesia->mean_lang_ku) }}</td>
                                    <td>{{ $indonesia->lang_total_dk ?? '' }}</td>
                                    <td>{{ round($meanIndonesia->mean_lang_dk) }}</td>
                                </tr>

                                <tr>
                                    <td rowspan="3">LEARNING BEHAVIOURS</td>
                                    <td colspan="3">Personal Management Skill</td>
                                    <td>{{ $indonesia->management_skill ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Active Participation In Learning</td>
                                    <td>{{ $indonesia->management_skill ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Social Responsibility</td>
                                    <td>{{ $indonesia->management_skill ?? 0 }}</td>
                                </tr>
                            </table>

                            <div class="footer">
                                <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
                                <span class="right">Page 1</span>
                            </div>
                        </div>


                        {{-- halaman 2 --}}
                        <div class="page">

                            {{-- IPA --}}
                            <table class="mt-2" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th>ILMU PENGETAHUAN ALAM</th>
                                    <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
                                    <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
                                </tr>

                                <tr>
                                    <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                </tr>

                                <tr>
                                    <td>{{ $ipa->ku_total ?? 0 }}</td>
                                    <td>{{ round($meanIPA->mean_ku) }}</td>
                                    <td>{{ $ipa->dk_total ?? 0 }}</td>
                                    <td>{{ round($meanIPA->mean_dk) }}</td>
                                </tr>

                                <tr>
                                    <td rowspan="3">LEARNING BEHAVIOURS</td>
                                    <td colspan="3">Personal Management Skill</td>
                                    <td>{{ $ipa->management_skill ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Active Participation In Learning</td>
                                    <td>{{ $ipa->active_participation ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Social Responsibility</td>
                                    <td>{{ $ipa->social_responsibility ?? 0 }}</td>
                                </tr>
                            </table>

                            {{-- IPS --}}
                            <table class="mt-5" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th>ILMU PENGETAHUAN SOSIAL</th>
                                    <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
                                    <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
                                </tr>

                                <tr>
                                    <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                </tr>

                                <tr>
                                    <td>{{ $ips->ku_total ?? '' }}</td>
                                    <td>{{ round($meanIPS->mean_ku) }}</td>
                                    <td>{{ $ips->dk_total ?? '' }}</td>
                                    <td>{{ round($meanIPS->mean_dk) }}</td>
                                </tr>

                                <tr>
                                    <td rowspan="3">LEARNING BEHAVIOURS</td>
                                    <td colspan="3">Personal Management Skill</td>
                                    <td>{{ $ips->management_skill ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Active Participation In Learning</td>
                                    <td>{{ $ips->active_participation ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Social Responsibility</td>
                                    <td>{{ $ips->social_responsibility ?? 0 }}</td>
                                </tr>
                            </table>


                            {{-- Math --}}
                            <table class="mt-5" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th>MATHEMATIC</th>
                                    <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
                                    <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
                                </tr>

                                <tr>
                                    <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                </tr>

                                <tr>
                                    <td>{{ $ips->ku_total ?? '' }}</td>
                                    <td>{{ round($meanIPS->mean_ku) }}</td>
                                    <td>{{ $ips->dk_total ?? '' }}</td>
                                    <td>{{ round($meanIPS->mean_dk) }}</td>
                                </tr>

                                <tr>
                                    <td rowspan="3">LEARNING BEHAVIOURS</td>
                                    <td colspan="3">Personal Management Skill</td>
                                    <td>{{ $ips->management_skill ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Active Participation In Learning</td>
                                    <td>{{ $ips->active_participation ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Social Responsibility</td>
                                    <td>{{ $ips->social_responsibility ?? 0 }}</td>
                                </tr>
                            </table>

                            {{-- B. INDO --}}
                            <table class="mt-5" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th>ENGLISH</th>
                                    <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
                                    <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
                                </tr>

                                <tr>
                                    <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                </tr>

                                <tr>
                                    <td>{{ $english->lang_total_ku ?? '' }}</td>
                                    <td>{{ round($meanEnglish->mean_lang_ku) }}</td>
                                    <td>{{ $english->lang_total_dk ?? '' }}</td>
                                    <td>{{ round($meanEnglish->mean_lang_dk) }}</td>
                                </tr>

                                <tr>
                                    <td rowspan="3">LEARNING BEHAVIOURS</td>
                                    <td colspan="3">Personal Management Skill</td>
                                    <td>{{ $english->management_skill ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Active Participation In Learning</td>
                                    <td>{{ $english->management_skill ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Social Responsibility</td>
                                    <td>{{ $english->management_skill ?? 0 }}</td>
                                </tr>
                            </table>



                            <div class="footer">
                                <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
                                <span class="right">Page 2</span>
                            </div>
                        </div>


                        {{-- halaman 3 --}}
                        <div class="page">

                            {{-- DT --}}
                            <table class="mt-2" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th>DESIGN AND TECHNOLOGY</th>
                                    <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
                                    <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
                                </tr>

                                <tr>
                                    <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                </tr>

                                <tr>
                                    <td>{{ $dt->ku_total ?? 0 }}</td>
                                    <td>{{ round($meanDT->mean_ku) }}</td>
                                    <td>{{ $dt->dk_total ?? 0 }}</td>
                                    <td>{{ round($meanDT->mean_dk) }}</td>
                                </tr>

                                <tr>
                                    <td rowspan="3">LEARNING BEHAVIOURS</td>
                                    <td colspan="3">Personal Management Skill</td>
                                    <td>{{ $dt->management_skill ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Active Participation In Learning</td>
                                    <td>{{ $dt->active_participation ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Social Responsibility</td>
                                    <td>{{ $dt->social_responsibility ?? 0 }}</td>
                                </tr>
                            </table>

                            {{-- Visual Art --}}
                            <table class="mt-5" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th>VISUAL ART</th>
                                    <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
                                    <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
                                </tr>

                                <tr>
                                    <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                </tr>

                                <tr>
                                    <td>{{ $art->ku_total ?? '' }}</td>
                                    <td>{{ round($meanArt->mean_ku) }}</td>
                                    <td>{{ $art->dk_total ?? '' }}</td>
                                    <td>{{ round($meanArt->mean_dk) }}</td>
                                </tr>

                                <tr>
                                    <td rowspan="3">LEARNING BEHAVIOURS</td>
                                    <td colspan="3">Personal Management Skill</td>
                                    <td>{{ $art->management_skill ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Active Participation In Learning</td>
                                    <td>{{ $art->active_participation ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Social Responsibility</td>
                                    <td>{{ $art->social_responsibility ?? 0 }}</td>
                                </tr>
                            </table>

                            {{-- PE --}}
                            <table class="mt-5" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th>PHYSICAL EDUCATION</th>
                                    <th style="width: 180px" colspan="2">Knowledge and Understanding</th>
                                    <th style="width: 180px" colspan="2">Demonstrate The Knowledge of Subject Matter</th>
                                </tr>

                                <tr>
                                    <th rowspan="2">ACADEMIC ACHIEVEMENT</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                    <th>SCORE</th>
                                    <th>MEAN</th>
                                </tr>

                                <tr>
                                    <td>{{ $pe->ku_total ?? '' }}</td>
                                    <td>{{ round($meanPE->mean_ku) }}</td>
                                    <td>{{ $pe->dk_total ?? '' }}</td>
                                    <td>{{ round($meanPE->mean_dk) }}</td>
                                </tr>

                                <tr>
                                    <td rowspan="3">LEARNING BEHAVIOURS</td>
                                    <td colspan="3">Personal Management Skill</td>
                                    <td>{{ $pe->management_skill ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Active Participation In Learning</td>
                                    <td>{{ $pe->active_participation ?? 0 }}</td>
                                </tr>

                                <tr>
                                    <td colspan="3">Social Responsibility</td>
                                    <td>{{ $pe->social_responsibility ?? 0 }}</td>
                                </tr>
                            </table>


                            <div class="footer">
                                <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
                                <span class="right">Page 2</span>
                            </div>
                        </div>

                        {{-- halaman 4 --}}
                        <div class="page">

                            {{-- IMYC --}}
                            <table class="mt-2" style="font-weight: bold; text-align: center; font-size: 12px">
                                <tr>
                                    <th colspan="6">IMYC ASSESSMENT FOR LEARNING</th>
                                </tr>

                                <tr>
                                    <th style="width: 100px" rowspan="2">SUBJECT AND LEARNING GOAL</th>
                                    <th rowspan="2">STAGE</th>
                                    <th style="width: 12px" rowspan="2">SCORE</th>
                                    <th colspan="3">LEARNING BEHAVIOURS</th>
                                </tr>

                                <tr>
                                    <th style="width: 15px">Personal Management Skill</th>
                                    <th style="width: 15px">Active Participation In Learning</th>
                                    <th style="width: 15px">Social Responsibility</th>
                                </tr>

                                {{-- Language Arts --}}
                                @if($imyc->imyc_lang != null)
                                <tr>
                                    <th>LANGUAGE ARTS</th>
                                    <th>MASTERING</th>
                                    <th rowspan="2">{{ $imyc->imyc_lang_total }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_lang_management_skill }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_lang_active_participation }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_lang_social_responsibility }}</th>
                                </tr>
                                <tr>
                                    <th>LA</th>
                                    <th>LA</th>
                                </tr>
                                @endif

                                @if($imyc->imyc_science != null)
                                {{-- Science --}}
                                <tr>
                                    <th>SCIENCE</th>
                                    <th>MASTERING</th>
                                    <th rowspan="2">{{ $imyc->imyc_science_total }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_science_management_skill }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_science_active_participation }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_science_social_responsibility }}</th>
                                </tr>
                                <tr>
                                    <th>LA</th>
                                    <th>LA</th>
                                </tr>
                                @endif


                                {{-- Geo --}}
                                @if($imyc->imyc_geo != null)
                                <?php
                                    if($imyc->imyc_geo_total >= 81) {
                                        $geo_stage = $murid->name . ' ' .$imyc_stage->mastering_geo;
                                        $geo_level = 'MASTERING';
                                    }elseif($imyc->imyc_geo_total >= 61) {
                                        $geo_stage = $murid->name . ' ' .$imyc_stage->developing_geo;
                                        $geo_level = 'DEVELOPING';
                                    }else {
                                        $geo_stage = $murid->name . ' ' .$imyc_stage->beginning_geo;
                                        $geo_level = 'BEGINNING';
                                    }
                                ?>
                                <tr>
                                    <th>GEOGRAPHY</th>
                                    <th>{{ $geo_level }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_geo_total }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_geo_management_skill }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_geo_active_participation }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_geo_social_responsibility }}</th>
                                </tr>
                                <tr>
                                    <th>{{ $imyc_stage->goal_geo }}</th>
                                    <th style="text-align: left">{!! $geo_stage !!}</th>
                                </tr>
                                @endif

                                {{-- History --}}
                                @if($imyc->imyc_history != null)
                                <tr>
                                    <th>HISTORY</th>
                                    <th>MASTERING</th>
                                    <th rowspan="2">{{ $imyc->imyc_history_total }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_history_management_skill }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_history_active_participation }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_history_social_responsibility }}</th>
                                </tr>
                                <tr>
                                    <th>LA</th>
                                    <th>LA</th>
                                </tr>
                                @endif

                                {{-- Tech --}}
                                @if($imyc->imyc_tech != null)
                                <tr>
                                    <th>TECHNOLOGY</th>
                                    <th>MASTERING</th>
                                    <th rowspan="2">{{ $imyc->imyc_tech_total }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_tech_management_skill }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_tech_active_participation }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_tech_social_responsibility }}</th>
                                </tr>
                                <tr>
                                    <th>LA</th>
                                    <th>LA</th>
                                </tr>
                                @endif

                                {{-- Art --}}
                                @if($imyc->imyc_art != null)
                                <tr>
                                    <th>ART</th>
                                    <th>MASTERING</th>
                                    <th rowspan="2">{{ $imyc->imyc_art_total }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_art_management_skill }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_art_active_participation }}</th>
                                    <th rowspan="2">{{ $imyc->imyc_art_social_responsibility }}</th>
                                </tr>
                                <tr>
                                    <th>LA</th>
                                    <th>LA</th>
                                </tr>
                                @endif

                            </table>


                            <div class="footer">
                                <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
                                <span class="right">Page 4</span>
                            </div>
                        </div>

                        {{-- halaman 5 --}}
                        <div class="page">


                            <table class="mt-2" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th colspan="2">LEARNING BEHAVIOURS</th>
                                </tr>
                                <tr>
                                    <th>Personal Management Skill</th>
                                    <th>Uses class time effectively; works independently; completes homework and assignments on time</th>
                                </tr>
                                <tr>
                                    <th>Active Participation In Learning</th>
                                    <th>Participates in class activities; self assesses; sets learning goals</th>
                                </tr>
                                <tr>
                                    <th>Social Responsibility</th>
                                    <th>Works well with others; resolves conflicts appropriately; respects self, others and the environment; contributes in a
                                    positive way to communities</th>
                                </tr>

                            </table>

                            <table class="mt-2" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th colspan="2">SCALE</th>
                                </tr>
                                <tr>
                                    <th>A</th>
                                    <th>Consistently</th>
                                    <th>Almost all or all of the time</th>
                                </tr>
                                <tr>
                                    <th>B</th>
                                    <th>Usually</th>
                                    <th>More than half of the time</th>
                                </tr>
                                <tr>
                                    <th>C</th>
                                    <th>Sometimes</th>
                                    <th>Less than half of the time</th>
                                </tr>
                                <tr>
                                    <th>D</th>
                                    <th>Rarely</th>
                                    <th>Almost never or never</th>
                                </tr>

                            </table>

                            <div class="row">
                                <div class="col-8">
                                    <table class="mt-2" style="font-weight: bold; text-align: center">
                                        <tr>
                                            <th>EXTRACURRICULAR</th>
                                            <th>GRADE LEVEL</th>
                                        </tr>
                                        <tr>
                                            <th>0</th>
                                            <th>0</th>
                                        </tr>
                                    </table>
                                </div>

                                <div class="col-4">
                                    <table class="mt-2" style="font-weight: bold; text-align: center">
                                        <tr>
                                            <th>SCALE:</th>
                                        </tr>
                                        <tr style="text-align: left">
                                            <th>E = Excellent</th>
                                        </tr>
                                        <tr style="text-align: left">
                                            <th>G = Good</th>
                                        </tr>
                                        <tr style="text-align: left">
                                            <th>S = Satisfactory</th>
                                        </tr>
                                        <tr style="text-align: left">
                                            <th>N = Need Improvement</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <table class="mt-2" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th rowspan="2">ATTENDANCE</th>
                                    <th>PRESENT</th>
                                    <th>EXCUSED</th>
                                    <th>UNEXCUSED</th>
                                    <th>TARDY</th>
                                </tr>
                                <tr>
                                    <th>0</th>
                                    <th>0</th>
                                    <th>0</th>
                                    <th>0</th>
                                </tr>
                            </table>

                            <table class="mt-2" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th style="text-align: left">COMMENT</th>
                                </tr>

                                <tr>
                                    <th style="text-align: justify">COMMENT</th>
                                </tr>
                            </table>

                            <p class="mt-5 text-center">Acknowledged by :</p>
                            <table class="mt-2" style="font-weight: bold; text-align: center">
                                <tr>
                                    <th style="width: 25%">DATE ISSUED</th>
                                    <th style="width: 25%">HOMEROOM <br> TEACHER</th>
                                    <th style="width: 25%">PRINCIPAL</th>
                                    <th style="width: 25%">PARENT</th>
                                </tr>

                                <tr>
                                    <th style="height: 130px;">25-Sep-2026</th>
                                    <th></th>
                                    <th style="vertical-align: bottom">Ancilla Dewi Respati</th>
                                    <th></th>
                                </tr>
                            </table>







                            <div class="footer">
                                <span class="left">{{ $murid->name .'/'.$murid->class.'/2026-2027' }}</span>
                                <span class="right">Page 5</span>
                            </div>
                        </div>


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

@endsection
