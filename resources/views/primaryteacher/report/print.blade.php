<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>{{ session('homeroom_class') . ' - '. $siswa }}</title>

<style>
    .report-container {
    }

    table,
    td,
    th {
        border: 2px solid black;
        padding-left: 10px;
        padding-right: 10px;
         padding-top: 0px;
        padding-bottom: 0px;
    }

    table {
        border-collapse: collapse;
        table-layout: fixed;
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
        margin: 0px auto;
        background: white;
        padding: 12mm 18mm 12mm 15mm;
        box-sizing: border-box;
        overflow: hidden;
        position: relative;
        margin-bottom: 30px;
        /* background-image: url('https://elearning.peachblossomsschool.sch.id/assets/images/logos/logo.png'); */
        background-repeat: no-repeat;
        background-position: center;
    }

    body {
        margin: 0;
        padding: 0;
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
        padding: 0 15mm;
        /* sejajar dengan padding isi */
        box-sizing: border-box;
    }

    @page {
        size: A4;
        }

    @media print {
        body {
            background: white !important;
            /* jangan ikut tercetak abu-abu */
        }

        .page {
            box-shadow: none !important;
            margin: 0 auto;
            position: relative;
        }

        .page::before {
            content: "";
            position: absolute;
            top: 8mm;
            /* jarak dari atas */
            left: 6mm;
            /* jarak dari kiri */
            right: 8mm;
            /* jarak dari kanan */
            bottom: 6mm;
            /* jarak dari bawah */
            border: 6px solid black;
            pointer-events: none;
            /* biar nggak ganggu isi */
        }
    }
</style>

<?php 
    if(session('role') == 'primaryadmin') {
        $grade = Str::substr($class_admin, 0, 2);
    }else{
        $grade = Str::substr(session('homeroom_class'), 0, 2);
    }
?>

<div class="container-fluid">

    <div class="widget-content searchable-container list">

        <div class="card">

            <div class="card-body report-container">

                @if ($assesments)

                <?php
                    // religious
                    $religious_concept = $religious->concept ?? 0;
                    $religious_demonstrate = $religious->demonstrate ?? 0;

                    // civic
                    $civic_concept = $civic->concept ?? 0;
                    $civic_demonstrate = $civic->demonstrate ?? 0;
                    $civic_mean = ($civic_concept + $civic_demonstrate) / 2;

                    // ipas
                    $ipas_concept = $ipas->concept ?? 0;
                    $ipas_demonstrate = $ipas->demonstrate ?? 0;

                    // math
                    $math_concept = $math->concept ?? 0;
                    $math_demonstrate = $math->demonstrate ?? 0;

                    // pe
                    $pe_concept = $pe->concept ?? 0;
                    $pe_understand_rules = $pe->pe_understand_rules ?? 0;
                    $pe_locomotors_movement = $pe->pe_locomotors_movement ?? 0;

                    // art
                    $art_followed_direction = $art->art_followed_direction ?? 0;
                    $art_displayed_neat = $art->art_displayed_neat ?? 0;
                    $art_finished_project = $art->art_finished_project ?? 0;

                    // Mandarin
                    $mandarin_understands_vocabulary = $mandarin->mandarin_understands_vocabulary ?? 0;
                    $mandarin_writes_characters = $mandarin->mandarin_writes_characters ?? 0;
                    $mandarin_neatness = $mandarin->mandarin_neatness ?? 0;
                    $mandarin_correct_intonation = $mandarin->mandarin_correct_intonation ?? 0;
                    $mandarin_reads_fluently = $mandarin->mandarin_reads_fluently ?? 0;
                    $mandarin_able_to_pronounce = $mandarin->mandarin_able_to_pronounce ?? 0;
                    $mandarin_able_to_transfer_the_words = $mandarin->mandarin_able_to_transfer_the_words ?? 0;

                    // ict
                    $ict_concept = $ict->concept ?? 0;
                    $ict_demonstrate = $ict->demonstrate ?? 0;

                    // music
                    $music_concept = $music->concept ?? 0;
                    $music_demonstrate = $music->demonstrate ?? 0;

                    // english
                    $eng_concept = $english->concept ?? 0;
                    $eng_lang_neatness_in_writing = $english->lang_neatness_in_writing ?? 0;
                    $eng_lang_writes_with_fluency = $english->lang_writes_with_fluency ?? 0;
                    $eng_lang_reads_accurately = $english->lang_reads_accurately ?? 0;
                    $eng_lang_expresses_ideas = $english->lang_expresses_ideas ?? 0;
                    $eng_lang_reads_fluency = $english->lang_reads_fluency ?? 0;
                    $eng_lang_listen_with_understanding = $english->lang_listen_with_understanding ?? 0;

                    // bahasa indonesia
                    $indo_concept = $indonesia->concept ?? 0;
                    $indo_lang_neatness_in_writing = $indonesia->lang_neatness_in_writing ?? 0;
                    $indo_lang_writes_with_fluency = $indonesia->lang_writes_with_fluency ?? 0;
                    $indo_lang_reads_fluency = $indonesia->lang_reads_fluency ?? 0;
                    $indo_lang_reads_accurately = $indonesia->lang_reads_accurately ?? 0;
                    $indo_lang_expresses_ideas = $indonesia->lang_expresses_ideas ?? 0;
                    $indo_lang_listen_with_understanding = $indonesia->lang_listen_with_understanding ?? 0;
                ?>

                {{-- halaman 1 --}}
                <div class="page">

                    <img style="margin: auto; display: block; width: 100px; margin-top: 30px; margin-bottom: 15px"
                        src="https://elearning.peachblossomsschool.sch.id/assets/images/logos/logo.png" alt="">

                    <h4 class="text-center mt-2 mb-4"><b>PROGRESS REPORT CARD <br> SEMESTER II <br> ACADEMIC YEAR
                            2025/2026</b>
                    </h4>




                    {{-- Religious --}}
                    <table class="mt-2" style="font-weight: bold">
                        <tr>
                            <th style="width: 450px" rowspan="2" class="subject header">RELIGIOUS EDUCATION
                            </th>
                            <th colspan="2" class="header">TERM 3</th>
                        </tr>

                        <tr>
                            <th class="header">SCORE</th>
                            <th class="header">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">Understands Concept</td>
                            <td class="text-center">{{ $religious_concept }}</td>
                            <td class="text-center">{{ number_format($meanReligious->mean_religious_concept ?? 0, 2) }}
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($religious_concept > 80) M
                                @elseif ($religious_concept > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="2">Demonstrates the knowledge of subject matter</td>
                            <td class="text-center">{{ $religious_demonstrate }}</td>
                            <td class="text-center">{{ number_format($meanReligious->mean_religious_demonstrate ?? 0, 2)
                                }}
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($religious_demonstrate > 80) M
                                @elseif ($religious_demonstrate > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                    </table>


                    {{-- CIVIC --}}
                    <table class="mt-2" style="font-weight: bold">
                        <tr>
                            <th style="width: 450px" rowspan="2" class="subject header">CIVIC</th>
                            <th colspan="2" class="header">TERM 3</th>
                        </tr>

                        <tr>
                            <th class="header">SCORE</th>
                            <th class="header">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">Understands Concept</td>
                            <td class="text-center">{{ $civic_concept }}</td>
                            <td class="text-center">{{ number_format($meanCivic->mean_civic_concept ?? 0, 2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($civic_concept > 80) M
                                @elseif ($civic_concept > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="2">Demonstrates the knowledge of subject matter</td>
                            <td class="text-center">{{ $civic_demonstrate }}</td>
                            <td class="text-center">{{ number_format($meanCivic->mean_civic_demonstrate ?? 0, 2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($civic_demonstrate > 80) M
                                @elseif ($civic_demonstrate > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                    </table>


                    {{-- MATH --}}
                    <table class="mt-2" style="font-weight: bold">
                        <tr>
                            <th style="width: 450px" rowspan="2" class="subject header">MATHEMATIC</th>
                            <th colspan="2" class="header">TERM 3</th>
                        </tr>

                        <tr>
                            <th class="header">SCORE</th>
                            <th class="header">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">Understands Concept</td>
                            <td class="text-center">{{ $math_concept }}</td>
                            <td class="text-center">{{ number_format($meanMath->mean_math_concept ?? 0, 2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($math_concept > 80) M
                                @elseif ($math_concept > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="2">Demonstrates the knowledge of subject matter</td>
                            <td class="text-center">{{ $math_demonstrate }}</td>
                            <td class="text-center">{{ number_format($meanMath->mean_math_demonstrate ?? 0, 2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($math_demonstrate > 80) M
                                @elseif ($math_demonstrate > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                    </table>


                    {{-- HE dan PE --}}
                    <table class="mt-2" style="font-weight: bold">
                        <tr>
                            <th style="width: 450px; padding-top: 8px; padding-bottom: 8px" class="subject header">
                                HEALTH AND PHYSICAL EDUCATION
                            </th>
                            <th colspan="2" class="header">TERM 3</th>
                        </tr>

                        <tr>
                            <th>Health Education</th>
                            <th class="text-center">SCORE</th>
                            <th class="text-center">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">● Understands concept</td>
                            <td class="text-center">{{ $pe_concept }}</td>
                            <td class="text-center">{{ number_format($meanPe->mean_pe_concept ?? 0, 2) }}</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($pe_concept > 80) M
                                @elseif ($pe_concept > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Physical Education</th>
                            <th class="text-center">SCORE</th>
                            <th class="text-center">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">● Understands rules</td>
                            <td class="text-center">{{ $pe_understand_rules }}</td>
                            <td class="text-center">{{ number_format($meanPe->mean_pe_understand_rules ?? 0, 2) }}</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($pe_understand_rules > 80) M
                                @elseif ($pe_understand_rules > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="2">● Use variety of locomotors movement</td>
                            <td class="text-center">{{ $pe_locomotors_movement }}</td>
                            <td class="text-center">{{ number_format($meanPe->mean_pe_locomotors_movement ?? 0, 2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($pe_locomotors_movement > 80) M
                                @elseif ($pe_locomotors_movement > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                    </table>

                    <div class="footer">
                        @if(session('role') == 'primaryadmin')
                        <span class="left">{{ $siswa.'/'.$class_admin.'/2025-2026' }}</span>
                        @else
                        <span class="left">{{ $siswa.'/'.session('homeroom_class').'/2025-2026' }}</span>
                        @endif
                        <span class="right">Page 1</span>
                    </div>
                </div>

                {{-- halaman 2 --}}
                <div class="page">

                    {{-- Bahasa Indonesia --}}
                    <table style="font-weight: bold">
                        <tr>
                            <th style="width: 450px" rowspan="2" class="subject header">BAHASA INDONESIA</th>
                            <th colspan="2" class="header">TERM 3</th>
                        </tr>

                        <tr>
                            <th class="header">SCORE</th>
                            <th class="header">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">Understands Concept</td>
                            <td class="text-center">{{ $indo_concept }}</td>
                            <td class="text-center">{{ number_format($meanIndonesia->mean_indo_concept ?? 0,
                                2) }}
                            </td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($indo_concept > 80) M
                                @elseif ($indo_concept > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Writing</td>
                            <th class="text-center">SCORE</th>
                            <th class="text-center">MEAN</th>
                        </tr>

                        {{-- start --}}
                        <tr>
                            <td rowspan="2">● Demonstrates neatness in writing</td>
                            <td class="text-center">{{ $indo_lang_neatness_in_writing }}</td>
                            <td class="text-center">{{ number_format($meanIndonesia->mean_indo_neatness_in_writing ?? 0,
                                2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($indo_lang_neatness_in_writing > 80) M
                                @elseif ($indo_lang_neatness_in_writing > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        {{-- end --}}

                        {{-- start --}}
                        <tr>
                            <td rowspan="2">● Writes with fluency</td>
                            <td class="text-center">{{ $indo_lang_writes_with_fluency }}</td>
                            <td class="text-center">{{ number_format($meanIndonesia->mean_indo_lang_writes_with_fluency
                                ?? 0,
                                2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($indo_lang_writes_with_fluency > 80) M
                                @elseif ($indo_lang_writes_with_fluency > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        {{-- end --}}

                        <tr>
                            <td>Reading</td>
                            <th class="text-center">SCORE</th>
                            <th class="text-center">MEAN</th>
                        </tr>

                        @if($grade == 'P1' || $grade == 'P2' || $grade == 'P3')

                        {{-- start --}}
                        <tr>
                            <td rowspan="2">● Reads with fluency</td>
                            <td class="text-center">{{ $indo_lang_reads_fluency }}</td>
                            <td class="text-center">{{ number_format($meanIndonesia->mean_indo_reads_fluency ?? 0,
                                2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($indo_lang_reads_fluency > 80) M
                                @elseif ($indo_lang_reads_fluency > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        {{-- end --}}
                        @endif

                        {{-- start --}}
                        <tr>
                            <td rowspan="2">● Reads accurately with understanding</td>
                            <td class="text-center">{{ $indo_lang_reads_accurately }}</td>
                            <td class="text-center">{{ number_format($meanIndonesia->mean_indo_reads_accurately ?? 0,
                                2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($indo_lang_reads_accurately > 80) M
                                @elseif ($indo_lang_reads_accurately > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        {{-- end --}}

                        <tr>
                            <td>Listening and Speaking</td>
                            <th class="text-center">SCORE</th>
                            <th class="text-center">MEAN</th>
                        </tr>

                        {{-- start --}}
                        <tr>
                            <td rowspan="2">● Listens with understanding</td>
                            <td class="text-center">{{ $indo_lang_listen_with_understanding }}</td>
                            <td class="text-center">{{ number_format($meanIndonesia->mean_indo_listen_with_understanding
                                ?? 0,
                                2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($indo_lang_listen_with_understanding > 80) M
                                @elseif ($indo_lang_listen_with_understanding > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        {{-- end --}}

                        {{-- start --}}
                        <tr>
                            <td rowspan="2">● Expresses ideas when speaking</td>
                            <td class="text-center">{{ $indo_lang_expresses_ideas }}</td>
                            <td class="text-center">{{ number_format($meanIndonesia->mean_indo_expresses_ideas ?? 0,
                                2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($indo_lang_expresses_ideas > 80) M
                                @elseif ($indo_lang_expresses_ideas > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        {{-- end --}}


                    </table>

                    {{-- English --}}
                    <table class="mt-1" style="font-weight: bold">
                        <tr>
                            <th style="width: 450px" rowspan="2" class="subject header">ENGLISH</th>
                            <th colspan="2" class="header">TERM 3</th>
                        </tr>

                        <tr>
                            <th class="header">SCORE</th>
                            <th class="header">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">Understands Concept</td>
                            <td class="text-center">{{ $eng_concept }}</td>
                            <td class="text-center">
                                {{ number_format($meanEnglish->mean_english_concept ?? 0,
                                2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($eng_concept > 80) M
                                @elseif ($eng_concept > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Writing</td>
                            <th class="text-center">SCORE</th>
                            <th class="text-center">MEAN</th>
                        </tr>

                        {{-- start --}}
                        <tr>
                            <td rowspan="2">● Demonstrates neatness in writing</td>
                            <td class="text-center">{{ $eng_lang_neatness_in_writing }}</td>
                            <td class="text-center">
                                {{ number_format($meanEnglish->mean_lang_neatness_in_writing ?? 0,
                                2) }}</td>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($eng_lang_neatness_in_writing > 80) M
                                @elseif ($eng_lang_neatness_in_writing > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        {{-- end --}}


                        {{-- start --}}
                        <tr>
                            <td rowspan="2">● Writes with fluency</td>
                            <td class="text-center">{{ $eng_lang_writes_with_fluency }}</td>
                            <td class="text-center">{{ number_format($meanEnglish->mean_lang_writes_with_fluency ?? 0,
                                2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($eng_lang_writes_with_fluency > 80) M
                                @elseif ($eng_lang_writes_with_fluency > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        {{-- end --}}


                        <tr>
                            <td>Reading</td>
                            <th class="text-center">SCORE</th>
                            <th class="text-center">MEAN</th>
                        </tr>

                        @if($grade == 'P1' || $grade == 'P2' || $grade == 'P3')

                        {{-- start --}}
                        <tr>
                            <td rowspan="2">● Reads with fluency and expression </td>
                            <td class="text-center">{{ $eng_lang_reads_fluency }}</td>
                            <td class="text-center">{{ number_format($meanEnglish->mean_lang_reads_fluency ?? 0,
                                2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($eng_lang_reads_fluency > 80) M
                                @elseif ($eng_lang_reads_fluency > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        {{-- end --}}
                        @endif

                        {{-- start --}}
                        <tr>
                            <td rowspan="2">● Reads accurately with understanding</td>
                            <td class="text-center">{{ $eng_lang_reads_accurately }}</td>
                            <td class="text-center">{{ number_format($meanEnglish->mean_lang_reads_accurately ?? 0,
                                2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($eng_lang_reads_accurately > 80) M
                                @elseif ($eng_lang_reads_accurately > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        {{-- end --}}

                        <tr>
                            <td>Listening and Speaking</td>
                            <th class="text-center">SCORE</th>
                            <th class="text-center">MEAN</th>
                        </tr>

                        {{-- start --}}
                        <tr>
                            <td rowspan="2">● Listens with understanding</td>
                            <td class="text-center">{{ $eng_lang_listen_with_understanding }}</td>
                            <td class="text-center">{{ number_format($meanEnglish->mean_lang_listen_with_understanding
                                ?? 0,
                                2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($eng_lang_listen_with_understanding > 80) M
                                @elseif ($eng_lang_listen_with_understanding > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        {{-- end --}}

                        {{-- start --}}
                        <tr>
                            <td rowspan="2">● Expresses ideas when speaking</td>
                            <td class="text-center">{{ $eng_lang_expresses_ideas }}</td>
                            <td class="text-center">{{ number_format($meanEnglish->mean_lang_expresses_ideas ?? 0,
                                2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($eng_lang_expresses_ideas > 80) M
                                @elseif ($eng_lang_expresses_ideas > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        {{-- end --}}


                    </table>

                    @if($grade == 'P3' || $grade == 'P4' || $grade == 'P5' || $grade == 'P6')
                    {{-- ICT --}}
                    <table class="mt-1" style="font-weight: bold">
                        <tr>
                            <th style="width: 450px" rowspan="2" class="subject header">INFORMATION AND COMMUNICATION
                                <br>
                                TECHNOLOGY
                            </th>
                            <th colspan="2" class="header">TERM 3</th>
                        </tr>

                        <tr>
                            <th class="header">SCORE</th>
                            <th class="header">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">Understands Concept</td>
                            <td class="text-center">{{ $ict_concept }}</td>
                            <td class="text-center">{{ number_format($meanIct->mean_ict_concept ?? 0, 2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($ict_concept > 80) M
                                @elseif ($ict_concept > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="2">Demonstrates the knowledge of subject matter</td>
                            <td class="text-center">{{ $ict_demonstrate }}</td>
                            <td class="text-center">{{ number_format($meanIct->mean_ict_demonstrate ?? 0, 2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($ict_demonstrate > 80) M
                                @elseif ($ict_demonstrate > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                    </table>
                    @endif

                    <div class="footer">
                        @if(session('role') == 'primaryadmin')
                        <span class="left">{{ $siswa.'/'.$class_admin.'/2025-2026' }}</span>
                        @else
                        <span class="left">{{ $siswa.'/'.session('homeroom_class').'/2025-2026' }}</span>
                        @endif
                        <span class="right">Page 2</span>
                    </div>
                </div>

                {{-- halaman 3 --}}
                <div class="page">

                    @if($grade == 'P1' || $grade == 'P2')
                    {{-- ICT --}}
                    <table class="mt-2" style="font-weight: bold">
                        <tr>
                            <th style="width: 450px" rowspan="2" class="subject header">INFORMATION AND COMMUNICATION
                                <br>
                                TECHNOLOGY
                            </th>
                            <th colspan="2" class="header">TERM 3</th>
                        </tr>

                        <tr>
                            <th class="header">SCORE</th>
                            <th class="header">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">Understands Concept</td>
                            <td class="text-center">{{ $ict_concept }}</td>
                            <td class="text-center">{{ number_format($meanIct->mean_ict_concept ?? 0, 2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($ict_concept > 80) M
                                @elseif ($ict_concept > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="2">Demonstrates the knowledge of subject matter</td>
                            <td class="text-center">{{ $ict_demonstrate }}</td>
                            <td class="text-center">{{ number_format($meanIct->mean_ict_demonstrate ?? 0, 2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($ict_demonstrate > 80) M
                                @elseif ($ict_demonstrate > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                    </table>
                    @endif

                    {{-- ART --}}
                    <table class="mt-2" style="font-weight: bold">
                        <tr>
                            <th style="width: 450px" rowspan="2" class="subject header">ART AND CRAFT</th>
                            <th colspan="2" class="header">TERM 3</th>
                        </tr>

                        <tr>
                            <th class="header">SCORE</th>
                            <th class="header">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">Followed direction</td>
                            <td class="text-center">{{ $art_followed_direction }}</td>
                            <td class="text-center">{{ number_format($meanArt->mean_art_followed_direction ?? 0, 2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($art_followed_direction > 80) M
                                @elseif ($art_followed_direction > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="2">Displayed neat, tidy work, good craftsmanship</td>
                            <td class="text-center">{{ $art_displayed_neat }}</td>
                            <td class="text-center">{{ number_format($meanArt->mean_art_displayed_neat ?? 0, 2) }}</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($art_displayed_neat > 80) M
                                @elseif ($art_displayed_neat > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="2">Finished project completely</td>
                            <td class="text-center">{{ $art_finished_project }}</td>
                            <td class="text-center">{{ number_format($meanArt->mean_art_finished_project ?? 0, 2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($art_finished_project > 80) M
                                @elseif ($art_finished_project > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                    </table>


                    {{-- MANDARIN --}}
                    <table class="mt-2" style="font-weight: bold">
                        <tr>
                            <th style="width: 450px; padding-top: 8px; padding-bottom: 8px" class="subject header">
                                MANDARIN
                            </th>
                            <th colspan="2" class="header">TERM 3</th>
                        </tr>

                        <tr>
                            <th>Understands Concept 概念理解</th>
                            <th class="text-center">SCORE</th>
                            <th class="text-center">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">● Understands vocabulary and grammar</td>
                            <td class="text-center">{{ $mandarin_understands_vocabulary }}</td>
                            <td class="text-center">{{ number_format($meanMandarin->mean_mandarin_understands_vocabulary
                                ??
                                0, 2) }}</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($mandarin_understands_vocabulary > 80) M
                                @elseif ($mandarin_understands_vocabulary > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Writing 写作</th>
                            <th class="text-center">SCORE</th>
                            <th class="text-center">MEAN</th>
                        </tr>
                        <tr>
                            <td rowspan="2">● Writes characters with correct stroke</td>
                            <td class="text-center">{{ $mandarin_writes_characters }}</td>
                            <td class="text-center">{{ number_format($meanMandarin->mean_mandarin_writes_characters ??
                                0, 2) }}</td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($mandarin_writes_characters > 80) M
                                @elseif ($mandarin_writes_characters > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="2">● Neatness and cleanliness</td>
                            <td class="text-center">{{ $mandarin_neatness }}</td>
                            <td class="text-center">{{ number_format($meanMandarin->mean_mandarin_neatness ?? 0, 2) }}
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2">
                                @if ($mandarin_neatness > 80) M
                                @elseif ($mandarin_neatness > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>


                        <div class="">
                            <tr>
                                <th>Reading 读</th>
                                <th class="text-center">SCORE</th>
                                <th class="text-center">MEAN</th>
                            </tr>
                            <tr>
                                <td rowspan="2">● Correct intonation and pronunciation</td>
                                <td class="text-center">{{ $mandarin_correct_intonation }}</td>
                                <td class="text-center">{{ number_format($meanMandarin->mean_mandarin_correct_intonation
                                    ?? 0, 2) }}</td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="2">
                                    @if ($mandarin_correct_intonation > 80) M
                                    @elseif ($mandarin_correct_intonation > 60) D
                                    @else B
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">● Reads fluently</td>
                                <td class="text-center">{{ $mandarin_reads_fluently }}</td>
                                <td class="text-center">{{ number_format($meanMandarin->mean_mandarin_reads_fluently ??
                                    0, 2) }}</td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="2">
                                    @if ($mandarin_reads_fluently > 80) M
                                    @elseif ($mandarin_reads_fluently > 60) D
                                    @else B
                                    @endif
                                </td>
                            </tr>
                        </div>

                        {{-- listening mandarin --}}
                        <div class="">
                            <tr>
                                <th>Listening and Speaking 听力和口语</th>
                                <th class="text-center">SCORE</th>
                                <th class="text-center">MEAN</th>
                            </tr>
                            <tr>
                                <td rowspan="2">● Is able to transfer the words listened into written form</td>
                                <td class="text-center">{{ $mandarin_able_to_transfer_the_words }}</td>
                                <td class="text-center">{{
                                    number_format($meanMandarin->mean_mandarin_able_to_transfer_the_words ?? 0, 2) }}
                                </td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="2">
                                    @if ($mandarin_able_to_transfer_the_words > 80) M
                                    @elseif ($mandarin_able_to_transfer_the_words > 60) D
                                    @else B
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td rowspan="2">● Is able to pronounce word properly</td>
                                <td class="text-center">{{ $mandarin_able_to_pronounce }}</td>
                                <td class="text-center">{{ number_format($meanMandarin->mean_mandarin_able_to_pronounce
                                    ?? 0, 2) }}</td>
                            </tr>
                            <tr class="text-center">
                                <td colspan="2">
                                    @if ($mandarin_able_to_pronounce > 80) M
                                    @elseif ($mandarin_able_to_pronounce > 60) D
                                    @else B
                                    @endif
                                </td>
                            </tr>
                        </div>

                    </table>

                    @if($grade == 'P3' || $grade == 'P4' || $grade == 'P5' || $grade == 'P6')

                    {{-- IPAS --}}
                    <table class="mt-2" style="font-weight: bold">
                        <tr>
                            <th style="width: 450px" rowspan="2" class="subject header">SCIENCE AND SOCIAL STUDY</th>
                            <th colspan="2" class="header">TERM 3</th>
                        </tr>

                        <tr>
                            <th class="header">SCORE</th>
                            <th class="header">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">Understands Concept</td>
                            <td class="text-center">{{ $ipas_concept }}</td>
                            <td class="text-center">{{ number_format($meanIpas->mean_ipas_concept ?? 0, 2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($ipas_concept > 80) M
                                @elseif ($ipas_concept > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="2">Demonstrates the knowledge of subject matter</td>
                            <td class="text-center">{{ $ipas_demonstrate }}</td>
                            <td class="text-center">{{ number_format($meanIpas->mean_ipas_demonstrate ?? 0, 2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($ipas_demonstrate > 80) M
                                @elseif ($ipas_demonstrate > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                    </table>
                    @endif


                    {{-- MUSIC --}}
                    <table class="mt-2" style="font-weight: bold">
                        <tr>
                            <th style="width: 450px" rowspan="2" class="subject header">MUSIC</th>
                            <th colspan="2" class="header">TERM 3</th>
                        </tr>

                        <tr>
                            <th class="header">SCORE</th>
                            <th class="header">MEAN</th>
                        </tr>

                        <tr>
                            <td rowspan="2">Technical Skills</td>
                            <td class="text-center">{{ $music_concept }}</td>
                            <td class="text-center">{{ number_format($meanMusic->mean_music_concept ?? 0, 2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($music_concept > 80) M
                                @elseif ($music_concept > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="2">Music Expressions</td>
                            <td class="text-center">{{ $music_demonstrate }}</td>
                            <td class="text-center">{{ number_format($meanMusic->mean_music_demonstrate ?? 0, 2) }}</td>
                        </tr>

                        <tr class="text-center">
                            <td colspan="2">
                                @if ($music_demonstrate > 80) M
                                @elseif ($music_demonstrate > 60) D
                                @else B
                                @endif
                            </td>
                        </tr>
                    </table>

                    <div class="footer">
                        @if(session('role') == 'primaryadmin')
                        <span class="left">{{ $siswa.'/'.$class_admin.'/2025-2026' }}</span>
                        @else
                        <span class="left">{{ $siswa.'/'.session('homeroom_class').'/2025-2026' }}</span>
                        @endif
                        <span class="right">Page 3</span>
                    </div>
                </div>

                {{-- halaman 4 --}}
                <div class="page">
                    <p class="text-center"><b>E = Excellent &emsp; G = Good &emsp; S = Satisfactory &emsp; N = Need
                            Improvement</b></p>

                    <table>
                        <tr class="text-center" style="font-weight: bolder;">
                            <td colspan="2" class="header">
                                <h2>LEARNING SKILLS AND WORK HABIT</h2>
                            </td>
                        </tr>

                        {{-- RESPONSIBILITY --}}
                        <tr class="text-center" style="font-weight: bolder;">
                            <td rowspan="2">RESPONSIBILITY</td>
                            <td>TERM 3</td>
                        </tr>

                        <tr class="text-center" style="font-weight: bolder;">
                            <td>{{ $reportData->skills_responsibility ?? 0 }}</td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <ul class="li">
                                    <li>Fulfills responsibilities and commitments within the learning environment</li>
                                    <li>Completes and submits class work, homework, and assignments according to
                                        agreed-upon
                                        timelines.</li>
                                    <li>Takes responsibility for and manages own behavior.</li>
                                </ul>
                            </td>
                        </tr>


                        {{-- ORGANIZATION --}}
                        <tr class="text-center" style="font-weight: bolder;">
                            <td rowspan="2">ORGANIZATION</td>
                            <td>TERM 3</td>
                        </tr>

                        <tr class="text-center" style="font-weight: bolder;">
                            <td>{{ $reportData->skills_organization ?? 0 }}</td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <ul class="li">
                                    <li>Devises and follows a plan and process for completing work and tasks.</li>
                                    <li>Establishes priorities and manages time to complete tasks and achieve goals.
                                    </li>
                                    <li>Identifies, gathers, evaluates, and uses information, technology, and resources
                                        to complete tasks.</li>
                                </ul>
                            </td>
                        </tr>


                        {{-- INDEPENDENT WORK --}}
                        <tr class="text-center" style="font-weight: bolder;">
                            <td rowspan="2">INDEPENDENT WORK</td>
                            <td>TERM 3</td>
                        </tr>

                        <tr class="text-center" style="font-weight: bolder;">
                            <td>{{ $reportData->skills_independent_work ?? 0 }}</td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <ul class="li">
                                    <li>Independently monitors, assesses, and revises plans to complete and meet goals.
                                    </li>
                                    <li>Uses class time appropriately to complete tasks.</li>
                                    <li>Follows instructions with minimal supervision.</li>
                                </ul>
                            </td>
                        </tr>


                        {{-- COLLABORATION --}}
                        <tr class="text-center" style="font-weight: bolder;">
                            <td rowspan="2">COLLABORATION</td>
                            <td>TERM 3</td>
                        </tr>

                        <tr class="text-center" style="font-weight: bolder;">
                            <td>{{ $reportData->skills_collaboration ?? 0 }}</td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <ul class="li">
                                    <li>Accepts various roles and an equitable share of work in group.</li>
                                    <li>Responds positively to the ideas, opinions, values, and traditions of others.
                                    </li>
                                    <li>Builds healthy peer-to-peer relationship in person and through personal and
                                        media-assisted interaction.</li>
                                    <li>Works with others to resolve conflicts and build consensus to achieve group
                                        goals.</li>
                                    <li>Works with others to resolve conflicts and build consensus to achieve group
                                        goals.</li>
                                    <li>Share information, resources, and expertise, and promotes critical thinking to
                                        solve problem and make decision.</li>

                                </ul>
                            </td>
                        </tr>


                        {{-- INITIATIVE --}}
                        <tr class="text-center" style="font-weight: bolder;">
                            <td rowspan="2">INITIATIVE</td>
                            <td>TERM 3</td>
                        </tr>

                        <tr class="text-center" style="font-weight: bolder;">
                            <td>{{ $reportData->skills_innitiative ?? 0 }}</td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <ul class="li">
                                    <li>Looks for and acts on new ideas and opportunities for learning.</li>
                                    <li>Demonstrates the capacity for innovation and a willingness to take risks.</li>
                                    <li>Demonstrates curiosity and interest in learning.</li>
                                    <li>Approaches new tasks with positive attitude.</li>
                                    <li>Recognizes and advocates appropriately for the rights of self and others.</li>

                                </ul>
                            </td>
                        </tr>

                        {{-- SELF-REGULATION --}}
                        <tr class="text-center" style="font-weight: bolder;">
                            <td rowspan="2">SELF-REGULATION</td>
                            <td>TERM 3</td>
                        </tr>

                        <tr class="text-center" style="font-weight: bolder;">
                            <td>{{ $reportData->skills_self_regulation ?? 0 }}</td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <ul class="li">
                                    <li>Sets own individual goals and monitors progress towards achieving them.</li>
                                    <li>Assesses and reflects critically on own strengths, needs, and interests.</li>
                                    <li>Identifies learning opportunities, choices, and strategies to meet personal
                                        needs and achieve goals.</li>
                                    <li>Perseveres and makes and effort when responding to challenges.</li>
                                </ul>
                            </td>
                        </tr>
                    </table>

                    <div class="footer">
                        @if(session('role') == 'primaryadmin')
                        <span class="left">{{ $siswa.'/'.$class_admin.'/2025-2026' }}</span>
                        @else
                        <span class="left">{{ $siswa.'/'.session('homeroom_class').'/2025-2026' }}</span>
                        @endif
                        <span class="right">Page 4</span>
                    </div>

                </div>


                {{-- halaman 5 --}}
                <div class="page">

                    <h4 class="text-center mb-2"><b>EXTRACURRICULAR</b></h4>
                    <p class="text-center"><b>E = Excellent &emsp; G = Good &emsp; S = Satisfactory &emsp; N = Need
                            Improvement</b></p>

                    {{-- eskul --}}
                    <table style="margin-bottom: 40px" style="table-layout: fixed; width: 100%;">
                        <tr class="text-center header">
                            <th width="50px">NO</th>
                            <th width="350px">NAME OF ACTIVITY</th>
                            <th class="text-center">E</th>
                            <th>G</th>
                            <th>S</th>
                            <th>N</th>
                        </tr>

                        {{-- eskul 1 --}}
                        <tr>
                            <th>1</th>
                            <th>{{ $reportData->extra_1 ?? '-' }}</th>
                            <td class="text-center">
                                @if (($reportData?->extra_1_score ?? '') == 'E')
                                &#10004;
                                @endif
                            </td>

                            <td class="text-center">
                                @if (($reportData?->extra_1_score ?? '') == 'G')
                                &#10004;
                                @endif
                            </td>

                            <td class="text-center">
                                @if (($reportData?->extra_1_score ?? '') == 'S')
                                &#10004;
                                @endif
                            </td>

                            <td class="text-center">
                                @if (($reportData?->extra_1_score ?? '') == 'N')
                                &#10004;
                                @endif
                            </td>
                        </tr>

                        {{-- eskul 2 --}}
                        @if($reportData?->extra_2)
                        <tr>
                            <th>2</th>
                            <th>{{ $reportData?->extra_2 }}</th>
                            <td class="text-center">
                                @if ($reportData?->extra_2_score === 'E')
                                &#10004;
                                @endif
                            </td>
                        </tr>
                        @endif
                    </table>

                    {{-- attendance --}}
                    <div class="row" style="margin-bottom: 40px">
                        <div class="col-md-5">
                            <table style="text-align: center;">
                                <tr class="header">
                                    <th>ATTENDANCE</th>
                                    <th>TERM 3</th>
                                </tr>

                                <tr>
                                    <th>Present</th>
                                    <th>{{ $reportData->att_present ?? '-'}}</th>
                                </tr>

                                <tr>
                                    <th>Excused</th>
                                    <th>{{ $reportData->att_excused ?? '-'}}</th>
                                </tr>

                                <tr>
                                    <th>Unexcused</th>
                                    <th>{{ $reportData->att_unexcused ?? '-'}}</th>
                                </tr>

                                <tr>
                                    <th>Tardy</th>
                                    <th>{{ $reportData->att_tardy ?? '-'}}</th>
                                </tr>
                            </table>
                        </div>
                        
                        <div class="col-md-1"></div>

                        <div class="col-md-6">
                            <table style="table-layout: fixed; width: 100%; text-align: center">
                                <tr>
                                    <th class="header" colspan="3" style="padding: 4px">GRADING SYSTEM</th>
                                </tr>

                                <tr>
                                    <th style="padding: 4px">0 - 60</th>
                                    <th>B</th>
                                    <th style="padding-left: 4px; white-space: nowrap";>BEGINNING</th>
                                </tr>

                                <tr>
                                    <th style="padding: 4px">61 – 80</th>
                                    <th>D</th>
                                    <th style="padding-left: 4px; padding-right: 4px; white-space: nowrap";>DEVELOPING</th>
                                </tr>

                                <tr>
                                    <th style="padding: 4px">81 - 100</th>
                                    <th>M</th>
                                    <th style="padding-left: 4px; white-space: nowrap";>MASTERING</th>
                                </tr>
                            </table>
                        </div>
                    </div>

                    {{-- Comment --}}
                    <table class="mb-4">
                        <tr>
                            <th rowspan="2" style="
                                            width: 35px;
                                            white-space: nowrap;
                                            transform: rotate(-90deg);
                                            vertical-align: middle;
                                            text-align: center;
                                            ">
                                <div style="
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        height: 100%;
                                    ">
                                    COMMENT
                                </div>
                            </th>
                            <th
                                style="text-align: justify; vertical-align: top; padding-top: 22px; padding-bottom: 22px">
                                {{
                                $reportData->comment ?? 'Comment belum diinput' }}</th>
                        </tr>
                    </table>

                    <p class="text-center" style="margin-bottom: 0px"><b>Acknowledged by,</b></p>

                    <table style="table-layout: fixed; width: 100%;">
                        <tr class="header">
                            <th rowspan="2" style="
                                width: 35px;
                                white-space: nowrap;
                                transform: rotate(-90deg);
                                vertical-align: middle;
                                text-align: center;
                                ">
                                <div style="
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    height: 100%;
                                ">
                                    Term 3
                                </div>
                            </th>
                            <th style="width: 160px">DATE</th>
                            <th>HOMEROOM <br> TEACHER</th>
                            <th>PRINCIPAL</th>
                            <th>PARENT</th>
                        </tr>

                        <tr style="font-size: 15px">

                            <th style="height: 140px; text-align: center; width: 170px">11 April 2026</th>
                            @if(session('role') == 'primaryadmin')
                            <th style="vertical-align: bottom; text-align: center">({{ $homeroom->name }})</th>
                            @else
                            <th style="vertical-align: bottom; text-align: center">({{ session('name') }})</th>
                            @endif
                            
                            <th style="vertical-align: bottom; text-align: center">(Agus R. Wibowo)</th>
                            
                            <th></th>
                        </tr>
                    </table>

                    <div class="footer">
                        @if(session('role') == 'primaryadmin')
                        <span class="left">{{ $siswa.'/'.$class_admin.'/2025-2026' }}</span>
                        @else
                        <span class="left">{{ $siswa.'/'.session('homeroom_class').'/2025-2026' }}</span>
                        @endif
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
    window.onafterprint = function() {
        @if(session('role') == 'primaryadmin')
        window.location.href = "{{ route('admin_primary.report') }}"; // ganti dengan route tujuan
        @else
        window.location.href = "{{ route('primary_teacher.report') }}"; // ganti dengan route tujuan
        @endif
    };
    window.print();
</script>