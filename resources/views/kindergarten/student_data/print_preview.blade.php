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

        @page {
            size: A4 portrait;
            margin: 0;
        }

        body {
            background: #e0e0e0;
            margin: 0;
            padding: 20px;
            justify-content: center;
        }

        .page {
            width: 210mm;
            height: 297mm;
            background: white;
            padding: 20mm;
            box-sizing: border-box;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            margin: auto;
        }

        /* Hilangkan bayangan saat dicetak */
        @media print {
            body {
                background: white;
                padding: 0;
            }
            .page {
                box-shadow: none;
                margin: 0;
            }

            .no-print {
                display: none !important;
            }

            .footer {
                position: absolute;
                bottom: 8mm;
                /* jarak dari bawah kertas */
                left: 0;
                width: 100%;
                font-size: 14px;

                display: flex !important;
                justify-content: space-between;
                /* kiri dan kanan */
                padding: 0 15mm;
                /* sejajar dengan padding isi */
                box-sizing: border-box;
            }
        }

        .title{
            text-transform: uppercase;
        }

        /* Container dengan scroll internal agar sticky berfungsi */
        .table-container {
            max-width: 100%;
            max-height: 80vh;
            /* Tinggi maksimum tabel sebelum scroll muncul */
            overflow: auto;
            /* Mengaktifkan scroll horizontal & vertikal */
            border: 1px solid #0e0d0d;
        }

        .table {
            border-collapse: separate;
            /* Ubah dari collapse agar posisi border sticky tidak glitch */
            border-spacing: 0;
            width: 100%;
            white-space: nowrap;
            font-size: 12px;
        }

        .table th,
        .table td {
            padding: 3px 12px;
            text-align: left;
            border: 1px solid #000000;
            background-color: #fff;
        }
        .cover-table td {
            padding: 10px 12px;
        }

        .table .th-header {
            background-color: #2f75b5;
            color: white;
            text-align: center;
        }

        /* 1. Freeze Header (Arah Vertikal / Top) */
        .table thead th {
            white-space: normal;
            word-wrap: break-word;
            text-align: center;
        }


        .text-center {
            text-align: center;
        }

        .logo {
            display: block;
            margin: auto;
            width: 120px;
        }

        .header{
            text-align: center;
        }

        .disabled {
            background-color: #a6a6a6;
            color: white;
        }

        .th-desc {
            width: 370px;
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


    </style>

</head>

<body>

    @php
        $isDisabledT1 = $assessment->term === 'Term 1' ? 'disabled' : '';
    @endphp

    <div class="card mb-3 col-md-8 mx-auto no-print">
        <div class="card-body">

            <form action="{{ route('kindergarten.assessment_record.print_preview', $assessment->id) }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-9">
                        <select name="student_name" class="form-select" id="inlineFormSelectPref">
                            <option selected>Choose Student</option>
                            @foreach ($assessments as $ass)
                            <option value="{{ $ass->name }}">{{ $ass->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-3">
                        <button onclick="window.print()" class="btn btn-primary">Print</button>
                        <button type="submit" class="btn btn-primary">Preview</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    @if($student == null)

    <p class="text-center fst-italic">Silahkan pilih nama siswa dari dropdown, lalu click print atau preview</p>

    @else

    {{-- Cover --}}

    <div class="page">
        <img class="logo" src="https://elearning.peachblossomsschool.sch.id/assets/images/logos/logo.png" alt="">

        <h1 class="text-center mb-5">Student Data</h1>

        <table class="cover-table">
            <tr>
                <td style="width: 210px">Registration Number</td>
                <td style="width: 5px">:</td>
                <td>{{ $report->registration_number }}</td>
            </tr>

            <tr>
                <td>Name</td>
                <td>:</td>
                <td>{{ $report->name }}</td>
            </tr>

            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>{{ $report->gender }}</td>
            </tr>

            <tr>
                <td>Date of Birth</td>
                <td>:</td>
                <td>{{ $report->date_of_birth }}</td>
            </tr>

            <tr>
                <td>Address</td>
                <td>:</td>
                <td>{{ $report->address }}</td>
            </tr>

            <tr>
                <td>Name of Parents</td>
                <td>:</td>
                <td>{{ $report->name_of_parents }}</td>
            </tr>
        </table>

        <table class="cover-table" style="margin-top: 100px; width: 100%; text-align: center;">
            <tr>
                <td style="width: 50%"></td>
                <td style="width: 50%">
                    <p style="margin-bottom: 100px;">Bandung, {{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                    <p>Ambar Noviyanti, S.Pd</p>
                    <p>Principal</p>
                </td>
            </tr>
        </table>
    </div>

    {{-- Page 1 --}}
    <div class="page">

        <div class="header">
            <img class="logo" src="https://elearning.peachblossomsschool.sch.id/assets/images/logos/logo.png" alt="">

            <p class="title">
                NATIONAL PLUS SCHOOL <br>
                <b>PROGRESS REPORT CARD - {{ $assessment->term }}</b> <br>
                <b>ACADEMIC YEAR {{ $assessment->academic_year }}</b>
            </p>
        </div>
        <table class="mb-3 table">
            <thead>
                <tr>
                    <th colspan="5" class="th-header">LANGUAGE SKILL</th>
                </tr>
                <tr>
                    <th rowspan="2">DESCRIPTION</th>
                    <th colspan="4">{{ $assessment->term }}</th>
                </tr>
                <tr class="text-center">
                    <th>I</th>
                    <th>G</th>
                    <th>S</th>
                    <th>E</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <th colspan="5">EXPRESSIVE</th>
                </tr>

                <tr>
                    <td class="th-desc">● Introduce Self</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->introduce_name == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Greet teacher and friend</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->greet_teacher == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Answer questions</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->answer_question == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Ask questions</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->ask_question == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Involve in conversation</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->involve_in_conversation == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● State willingness</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->state_willingness == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Pronounce word</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->pronounce_word == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Inform calendar</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->inform_calendar == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Sing songs</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->sing_songs == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Recite rhymes</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->recite_rhymes == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <th colspan="5">RECEPTIVE</th>
                </tr>

                <tr>
                    <td>● Listen to teacher</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->listen_to_teacher == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Listen to classmates</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->listen_to_classmates == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Follow instruction</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->follow_instruction == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Respond to questions</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->respond_to_questions == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

            </tbody>
        </table>

        <table class="mb-3 table">
            <thead>
                <tr>
                    <th colspan="5" class="th-header">MANNERS AND COURTESY</th>
                </tr>
                <tr>
                    <th rowspan="2">DESCRIPTION</th>
                    <th colspan="4">{{ $assessment->term }}</th>
                </tr>
                <tr class="text-center">
                    <th>I</th>
                    <th>G</th>
                    <th>S</th>
                    <th>E</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="th-desc">● Respect teachers</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->respect_teachers == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Respect friends</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->respect_friends == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Speak politely to others</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->speak_politely_to_others == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Care to others</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->care_to_others == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Share with others</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->share_with_others == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Help others</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->help_others == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Obey teachers</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->obey_teachers == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

            </tbody>

            <div class="footer" style="display: none">
                <span class="left">Page | 1</span>

                <span class="right">{{ $ass->name .' | '. $assessment->class }}</span>
            </div>
        </table>

    </div>


    {{-- Page 2 --}}
    <div class="page">
        <table class="mb-3 table">
            <thead>
                <tr>
                    <th colspan="5" class="th-header">DAILY PERFORMANCE</th>
                </tr>
                <tr>
                    <th rowspan="2">DESCRIPTION</th>
                    <th colspan="4">{{ $assessment->term }}</th>
                </tr>
                <tr class="text-center">
                    <th>I</th>
                    <th>G</th>
                    <th>S</th>
                    <th>E</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td class="th-desc">● Get along with classmates</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->get_along_with_classmates == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Give attention to the lesson</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->give_attention_to_the_lesson == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Do given task independently</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->do_given_task_independently == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Finish task as order</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->finish_task_as_order == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Willing to perform</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->willing_to_perform == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Willing to take turn</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->willing_to_take_turn == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Dress neatly</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->dress_neatly == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Neaten belonging</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->neaten_belonging == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Take care of school property</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->take_care_of_school_property == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Keep clean</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->keep_clean == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Enjoy doing art works</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->enjoy_doing_art_works == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Able to eat using utensils</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->able_to_eat_using_utensils == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

            </tbody>
        </table>

        <table class="mb-3 table">
            <thead>
                <tr>
                    <th colspan="5" class="th-header">MOTOR SKILL</th>
                </tr>
                <tr>
                    <th rowspan="2">DESCRIPTION</th>
                    <th colspan="4">{{ $assessment->term }}</th>
                </tr>
                <tr class="text-center">
                    <th>I</th>
                    <th>G</th>
                    <th>S</th>
                    <th>E</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <th colspan="5">FINE MOTOR</th>
                </tr>
                <tr>
                    <td class="th-desc">● Color picture in designated area</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->color_picture_in_designated_area == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Use paint brush</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->use_paint_brush == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Paste paper</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->paste_paper == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Draw shape</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->draw_shape == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Fold paper</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->fold_paper == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Cut paper using scissors</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->cut_paper_using_scissors == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <th colspan="5">GROSS MOTOR</th>
                </tr>

                <tr>
                    <td>● Able to catch</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->able_to_catch == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Able to throw</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->able_to_throw == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Able to hop</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->able_to_hop == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Able to walk with bean bag</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->able_to_walk_with_bean_bag == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Able to balance while running</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->able_to_balance_while_running == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Able to balance on plank</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->able_to_balance_on_plank == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Able to follow movements</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->able_to_follow_movements == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Participate in games</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->participate_in_games == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>


            </tbody>

            <div class="footer" style="display: none">
                <span class="left">Page | 2</span>

                <span class="right">{{ $ass->name .' | '. $assessment->class }}</span>
            </div>
        </table>

    </div>


    {{-- Page 3 --}}
    <div class="page">
        <table class="mb-3 table">
            <thead>
                <tr>
                    <th colspan="5" class="th-header">PRE-LITERACY</th>
                </tr>
                <tr>
                    <th rowspan="2">DESCRIPTION</th>
                    <th colspan="4">{{ $assessment->term }}</th>
                </tr>
                <tr class="text-center">
                    <th>I</th>
                    <th>G</th>
                    <th>S</th>
                    <th>E</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <th colspan="5">WRITING</th>
                </tr>

                <tr>
                    <td class="th-desc">● Trace alphabets</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->trace_alphabets == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Copy alphabets</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->copy_alphabets == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Copy words</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->copy_words == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <th colspan="5">READING</th>
                </tr>

                <tr>
                    <td>● Recognize sound of the alphabets</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->recognize_sound_of_the_alphabets == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Recognize shapes of the alphabets</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->recognize_shapes_of_the_alphabets == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Identify first sound of 3 letters word</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->identify_first_sound_of_3_letters_word == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Identify second sound of 3 letters word</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->identify_second_sound_of_3_letters_word == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Identify third sound of 3 letters word</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->identify_third_sound_of_3_letters_word == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Build 3 letters word</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->build_3_letters_word == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Read 3 letters word</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->read_3_letters_word == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Enjoy doing art works</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->enjoy_doing_art_works == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Read 3 letters word phrase</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->read_3_letters_word_phrase == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Read 3 letters word sentence</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center disabled">
                        {{ $report->read_3_letters_word_sentence == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

            </tbody>
        </table>

        <table class="mb-3 table">
            <thead>
                <tr>
                    <th colspan="5" class="th-header">MATHEMATICS</th>
                </tr>
                <tr>
                    <th rowspan="2">DESCRIPTION</th>
                    <th colspan="4">{{ $assessment->term }}</th>
                </tr>
                <tr class="text-center">
                    <th>I</th>
                    <th>G</th>
                    <th>S</th>
                    <th>E</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="th-desc">● Identify shapes</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->identify_shapes == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Master quantity 0-10</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->master_quantity_0_10 == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Recognize shapes of the numbers</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->recognize_shapes_of_the_numbers == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Sequence numbers</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->sequence_numbers == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Compare small sizes</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->compare_small_sizes == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Compare big sizes</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->compare_big_sizes == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Discriminate more and less</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->discriminate_more_and_less == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Understand ones and ten</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->understand_ones_and_ten == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Able to add objects</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->able_to_add_objects == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Compare long lenght</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->compare_long_lenght == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Compare short length</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->compare_short_length == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Understand tens</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->understand_tens == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Recognize time (o’clock)</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center {{ $isDisabledT1 }}">
                        {{ $report->recognize_time == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>
            </tbody>

            <div class="footer" style="display: none">
                <span class="left">Page | 3</span>

                <span class="right">{{ $ass->name .' | '. $assessment->class }}</span>
            </div>
        </table>

    </div>


    {{-- Page 4 --}}
    <div class="page">
        <table class="mb-3 table">
            <thead>
                <tr>
                    <th colspan="5" class="th-header">ADDITIONAL PROGRAM</th>
                </tr>
                <tr>
                    <th rowspan="2">DESCRIPTION</th>
                    <th colspan="4">{{ $assessment->term }}</th>
                </tr>
                <tr class="text-center">
                    <th>I</th>
                    <th>G</th>
                    <th>S</th>
                    <th>E</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <th colspan="5">Mandarin</th>
                </tr>

                <tr>
                    <td class="th-desc">● 阅读(Reading)</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->trace_alphabets == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● 书写(Writing)</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->copy_alphabets == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● 听力(Listening)</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->copy_words == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● 说话(Speaking)</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->recognize_sound_of_the_alphabets == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● 测验(Test)</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->recognize_shapes_of_the_alphabets == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● {{ $report->additional_program_1 }}</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->additional_program_1_score == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● {{ $report->additional_program_2 }}</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->additional_program_2_score == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● {{ $report->additional_program_3 }}</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->additional_program_3_score == $code ? 'X' : '' }}
                    </td>
                    @endforeach
                </tr>

            </tbody>
        </table>

        <table class="mb-3 table">
            <thead>
                <tr>
                    <th colspan="5" class="th-header">ATTENDANCE</th>
                </tr>
                <tr>
                    <th>DESCRIPTION</th>
                    <th colspan="4">{{ $assessment->term }}</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td class="th-desc">● Presence</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->presence }}
                    </td>
                    @endforeach
                </tr>

                <tr>
                    <td>● Absence</td>
                    @foreach(['I', 'G', 'H', 'S'] as $code)
                    <td class="text-center">
                        {{ $report->absence }}
                    </td>
                    @endforeach
                </tr>

                <div class="footer" style="display: none">
                    <span class="left">Page | 3</span>

                    <span class="right">{{ $ass->name .' | '. $assessment->class }}</span>
                </div>
            </tbody>
        </table>

    </div>


    {{-- Page 5 --}}
    <div class="page">
        <table class="mb-3 table">
            <thead>
                <tr>
                    <th colspan="5" class="th-header">{{ $assessment->term }}</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <th colspan="5">Teacher's Comment</th>
                </tr>

                <tr>
                    <td style="text-align: justify; white-space: normal; word-wrap: break-word; overflow-wrap: break-word;">
                        {{ $ass->comment }}
                    </td>
                </tr>
            </tbody>
        </table>


        <div class="signature-row">

            <!-- Kolom 2: Kepala Sekolah (Tengah) -->
            <div class="signature-box">
                <p>Acknowledged by,</p>
                <div class="signature-space"></div>
                <p class="signature-name">Ambar Noviyanti, S.Pd</p>
                <p class="signature-nip">Principal</p>
            </div>

            <!-- Kolom 1: Wali Kelas (Kiri) -->
            <div class="signature-box">
                <p>&nbsp;</p> <!-- Space penyeimbang agar sejajar dengan tanggal -->
                <p></p>
                <div class="signature-space"></div>
                <p class="signature-name">{{ $ass->teacher }}</p>
                <p class="signature-nip">Teacher</p>
            </div>



            <!-- Kolom 3: Orang Tua / Wali (Kanan) -->
            <div class="signature-box">
                <p>Bekasi, 31 Maret 2026</p>
                <div class="signature-space"></div>
                <p class="signature-name">( .................................... )</p>
                <p class="signature-nip">Parent</p>
            </div>

        </div>

    </div>

    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
