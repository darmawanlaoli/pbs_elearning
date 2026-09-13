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

    <form action="{{ route('kindergarten.assessment_record.input_action') }}" method="POST">
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
                            <th>1.Introduce Name</th>
                            <th>2.Greet teacher and friend</th>
                            <th>3.Answer questions</th>
                            <th>4.Ask questions</th>
                            <th>5.Involve in conversation</th>
                            <th>6.State willingness</th>
                            <th>7.Pronounce word</th>
                            <th>8.Inform calendar</th>
                            <th>9.Sing songs</th>
                            <th>10.Recite rhymes</th>
                            <th>11.Listen to teacher</th>
                            <th>Listen to classmates</th>
                            <th>Follow instruction</th>
                            <th>Respond to questions</th>
                            <th>Respect teachers</th>
                            <th>Respect friends</th>
                            <th>Speak politely to others</th>
                            <th>Care to others</th>
                            <th>Share with others</th>
                            <th>Help others</th>
                            <th>Obey teachers</th>
                            <th>Get along with classmates</th>
                            <th>Give attention to the lesson</th>
                            <th>Do given task independently</th>
                            <th>Finish task as order</th>
                            <th>Willing to perform</th>
                            <th>Willing to take turn</th>
                            <th>Dress neatly</th>
                            <th>Neaten belonging</th>
                            <th>Take care of school property</th>
                            <th>Keep clean</th>
                            <th>Enjoy doing art works</th>
                            <th>Able to eat using utensils</th>
                            <th>Color picture in designated area</th>
                            <th>Use paint brush</th>
                            <th>Paste paper</th>
                            <th>Draw shape</th>
                            <th>Fold paper</th>
                            <th>Cut paper using scissors</th>
                            <th>Able to catch</th>
                            <th>Able to throw</th>
                            <th>Able to hop</th>
                            <th>Able to walk with bean bag</th>
                            <th>Able to balance while running</th>
                            <th>Able to balance on plank</th>
                            <th>Able to follow movements</th>
                            <th>Participate in games</th>
                            <th>Trace alphabets</th>
                            <th>Copy alphabets</th>
                            <th>Recognize sound of the alphabets</th>
                            <th>Recognize shapes of the alphabets</th>
                            <th>Identify shapes</th>
                            <th>Master quantity 0-10</th>
                            <th>Recognize shapes of the numbers</th>
                            <th>Sequence numbers</th>
                            <th>Compare small sizes</th>
                            <th>Compare big sizes</th>
                            <th>Description</th>
                            <th>Score</th>
                            <th>Description</th>
                            <th>Score</th>
                            <th>Description</th>
                            <th>Score</th>
                            <th>阅读 Reading</th>
                            <th>书写 Writing</th>
                            <th>听力 Listening</th>
                            <th>说话 Speaking</th>
                            <th>测验 Test</th>
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
                                <select name="assessments[{{ $assesment->id }}][introduce_name]">
                                    @foreach(['I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.introduce_name",
                                        $assesment->introduce_name ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][greet_teacher]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.greet_teacher",
                                        $assesment->greet_teacher ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][answer_question]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.answer_question",
                                        $assesment->answer_question ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][ask_question]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.ask_question",
                                        $assesment->ask_question ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][involve_in_conversation]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.involve_in_conversation",
                                        $assesment->involve_in_conversation ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][state_willingness]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.state_willingness",
                                        $assesment->state_willingness ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][pronounce_word]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.pronounce_word",
                                        $assesment->pronounce_word ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][inform_calendar]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.inform_calendar",
                                        $assesment->inform_calendar ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][sing_songs]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.sing_songs",
                                        $assesment->sing_songs ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][recite_rhymes]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recite_rhymes",
                                        $assesment->recite_rhymes ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][listen_to_teacher]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.listen_to_teacher",
                                        $assesment->listen_to_teacher ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][listen_to_classmates]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.listen_to_classmates",
                                        $assesment->listen_to_classmates ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][follow_instruction]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.follow_instruction",
                                        $assesment->follow_instruction ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][respond_to_questions]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.respond_to_questions",
                                        $assesment->respond_to_questions ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][respect_teachers]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.respect_teachers",
                                        $assesment->respect_teachers ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][respect_friends]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.respect_friends",
                                        $assesment->respect_friends ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][speak_politely_to_others]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.speak_politely_to_others",
                                        $assesment->speak_politely_to_others ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][care_to_others]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.care_to_others",
                                        $assesment->care_to_others ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][share_with_others]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.share_with_others",
                                        $assesment->share_with_others ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][help_others]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.help_others",
                                        $assesment->help_others ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][obey_teachers]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.obey_teachers",
                                        $assesment->obey_teachers ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][get_along_with_classmates]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.get_along_with_classmates",
                                        $assesment->get_along_with_classmates ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][give_attention_to_the_lesson]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.give_attention_to_the_lesson",
                                        $assesment->give_attention_to_the_lesson ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][do_given_task_independently]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.do_given_task_independently",
                                        $assesment->do_given_task_independently ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][finish_task_as_order]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.finish_task_as_order",
                                        $assesment->finish_task_as_order ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][willing_to_perform]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.willing_to_perform",
                                        $assesment->willing_to_perform ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][willing_to_take_turn]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.willing_to_take_turn",
                                        $assesment->willing_to_take_turn ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>


                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][dress_neatly]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.dress_neatly",
                                        $assesment->dress_neatly ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][neaten_belonging]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.neaten_belonging",
                                        $assesment->neaten_belonging ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][take_care_of_school_property]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.take_care_of_school_property",
                                        $assesment->take_care_of_school_property ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][keep_clean]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.keep_clean",
                                        $assesment->keep_clean ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][enjoy_doing_art_works]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.enjoy_doing_art_works",
                                        $assesment->enjoy_doing_art_works ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            {{-- test --}}
                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][able_to_eat_using_utensils]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_eat_using_utensils",
                                        $assesment->able_to_eat_using_utensils ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][color_picture_in_designated_area]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.color_picture_in_designated_area",
                                        $assesment->color_picture_in_designated_area ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][use_paint_brush]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.use_paint_brush",
                                        $assesment->use_paint_brush ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][paste_paper]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.paste_paper",
                                        $assesment->paste_paper ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][draw_shape]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.draw_shape",
                                        $assesment->draw_shape ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][fold_paper]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.fold_paper",
                                        $assesment->fold_paper ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][cut_paper_using_scissors]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.cut_paper_using_scissors",
                                        $assesment->cut_paper_using_scissors ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][able_to_catch]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_catch",
                                        $assesment->able_to_catch ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][able_to_throw]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_throw",
                                        $assesment->able_to_throw ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][able_to_hop]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_hop",
                                        $assesment->able_to_hop ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            {{-- test --}}

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][able_to_walk_with_bean_bag]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_walk_with_bean_bag",
                                        $assesment->able_to_walk_with_bean_bag ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][able_to_balance_while_running]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_balance_while_running",
                                        $assesment->able_to_balance_while_running ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][able_to_balance_on_plank]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_balance_on_plank",
                                        $assesment->able_to_balance_on_plank ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][able_to_follow_movements]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_follow_movements",
                                        $assesment->able_to_follow_movements ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][participate_in_games]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.participate_in_games",
                                        $assesment->participate_in_games ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][trace_alphabets]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.trace_alphabets",
                                        $assesment->trace_alphabets ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][copy_alphabets]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.copy_alphabets",
                                        $assesment->copy_alphabets ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][recognize_sound_of_the_alphabets]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_sound_of_the_alphabets",
                                        $assesment->recognize_sound_of_the_alphabets ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][recognize_shapes_of_the_alphabets]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_shapes_of_the_alphabets",
                                        $assesment->recognize_shapes_of_the_alphabets ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][identify_shapes]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.identify_shapes",
                                        $assesment->identify_shapes ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            {{-- test --}}
                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][master_quantity_0_10]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.master_quantity_0_10",
                                        $assesment->master_quantity_0_10 ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][recognize_shapes_of_the_numbers]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_shapes_of_the_numbers",
                                        $assesment->recognize_shapes_of_the_numbers ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][sequence_numbers]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.sequence_numbers",
                                        $assesment->sequence_numbers ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][compare_small_sizes]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.compare_small_sizes",
                                        $assesment->compare_small_sizes ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                            <td class="text-center">
                                <select name="assessments[{{ $assesment->id }}][compare_big_sizes]">
                                    @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                    <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.compare_big_sizes",
                                        $assesment->compare_big_sizes ?? '') == $option)>
                                        {{ $option }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>


                            <!-- Lanjutkan untuk kolom-kolom lainnya... -->

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
