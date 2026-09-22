<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

    <div class="container-fluid mt-3">
        <div class="row col-8 mx-auto">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('kindergarten.assessment_record_details.update', $assessment->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="submit" class="btn btn-danger mb-3">Simpan</button>

                        <p>Assessment Record <b>{{ $assessment->name . ' - ' . $assessment->class }}</b></p>

                        <div class="table-responsive">

                            <table class="table table-bordered">
                                <tr class="bg-primary text-white">
                                    <th>Description</th>
                                    <th>Score</th>
                                </tr>

                                <tr>
                                    <td>Introduce Name</td>
                                    <td>
                                        <select name="introduce_name" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('introduce_name', $assessment->introduce_name ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Greet teacher and friend</td>
                                    <td>
                                        <select name="greet_teacher" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('greet_teacher', $assessment->greet_teacher ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Answer questions</td>
                                    <td>
                                        <select name="answer_question" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('answer_question', $assessment->answer_question ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Ask questions</td>
                                    <td>
                                        <select name="ask_question" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('ask_question', $assessment->ask_question ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Involve in conversation</td>
                                    <td>
                                        <select name="involve_in_conversation" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('involve_in_conversation', $assessment->
                                                involve_in_conversation ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>State willingness</td>
                                    <td>
                                        <select name="state_willingness" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('state_willingness', $assessment->state_willingness ?? '')
                                                == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Pronounce word</td>
                                    <td>
                                        <select name="pronounce_word" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('pronounce_word', $assessment->pronounce_word ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Inform calendar</td>
                                    <td>
                                        <select name="inform_calendar" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('inform_calendar', $assessment->inform_calendar ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Sing songs</td>
                                    <td>
                                        <select name="sing_songs" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('sing_songs', $assessment->sing_songs ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Recite rhymes</td>
                                    <td>
                                        <select name="recite_rhymes" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('recite_rhymes', $assessment->recite_rhymes ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Listen to teacher</td>
                                    <td>
                                        <select name="listen_to_teacher" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('listen_to_teacher', $assessment->listen_to_teacher ?? '')
                                                == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Listen to classmates</td>
                                    <td>
                                        <select name="listen_to_classmates" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('listen_to_classmates', $assessment->listen_to_classmates ??
                                                '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Follow instruction</td>
                                    <td>
                                        <select name="follow_instruction" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('follow_instruction', $assessment->follow_instruction ?? '')
                                                == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Respond to questions</td>
                                    <td>
                                        <select name="respond_to_questions" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('respond_to_questions', $assessment->respond_to_questions ??
                                                '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Respect teachers</td>
                                    <td>
                                        <select name="respect_teachers" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('respect_teachers', $assessment->respect_teachers ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Respect friends</td>
                                    <td>
                                        <select name="respect_friends" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('respect_friends', $assessment->respect_friends ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Speak politely to others</td>
                                    <td>
                                        <select name="speak_politely_to_others" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('speak_politely_to_others', $assessment->
                                                speak_politely_to_others ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Care to others</td>
                                    <td>
                                        <select name="care_to_others" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('care_to_others', $assessment->care_to_others ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Share with others</td>
                                    <td>
                                        <select name="share_with_others" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('share_with_others', $assessment->share_with_others ?? '')
                                                == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Help others</td>
                                    <td>
                                        <select name="help_others" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('help_others', $assessment->help_others ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Obey teachers</td>
                                    <td>
                                        <select name="obey_teachers" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('obey_teachers', $assessment->obey_teachers ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Get along with classmates</td>
                                    <td>
                                        <select name="get_along_with_classmates" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('get_along_with_classmates', $assessment->
                                                get_along_with_classmates ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Give attention to the lesson</td>
                                    <td>
                                        <select name="give_attention_to_the_lesson" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('give_attention_to_the_lesson', $assessment->
                                                give_attention_to_the_lesson ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Do given task independently</td>
                                    <td>
                                        <select name="do_given_task_independently" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('do_given_task_independently', $assessment->
                                                do_given_task_independently ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Finish task as order</td>
                                    <td>
                                        <select name="finish_task_as_order" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('finish_task_as_order', $assessment->finish_task_as_order ??
                                                '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Willing to perform</td>
                                    <td>
                                        <select name="willing_to_perform" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('willing_to_perform', $assessment->willing_to_perform ?? '')
                                                == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Willing to take turn</td>
                                    <td>
                                        <select name="willing_to_take_turn" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('willing_to_take_turn', $assessment->willing_to_take_turn ??
                                                '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Dress neatly</td>
                                    <td>
                                        <select name="dress_neatly" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('dress_neatly', $assessment->dress_neatly ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Neaten belonging</td>
                                    <td>
                                        <select name="neaten_belonging" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('neaten_belonging', $assessment->neaten_belonging ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Take care of school property</td>
                                    <td>
                                        <select name="take_care_of_school_property" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('take_care_of_school_property', $assessment->
                                                take_care_of_school_property ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Keep clean</td>
                                    <td>
                                        <select name="keep_clean" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('keep_clean', $assessment->keep_clean ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Enjoy doing art works</td>
                                    <td>
                                        <select name="enjoy_doing_art_works" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('enjoy_doing_art_works', $assessment->enjoy_doing_art_works
                                                ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Able to eat using utensils</td>
                                    <td>
                                        <select name="able_to_eat_using_utensils" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('able_to_eat_using_utensils', $assessment->
                                                able_to_eat_using_utensils ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Color picture in designated area</td>
                                    <td>
                                        <select name="color_picture_in_designated_area" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('color_picture_in_designated_area', $assessment->
                                                color_picture_in_designated_area ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Use paint brush</td>
                                    <td>
                                        <select name="use_paint_brush" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('use_paint_brush', $assessment->use_paint_brush ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Paste paper</td>
                                    <td>
                                        <select name="paste_paper" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('paste_paper', $assessment->paste_paper ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Draw shape</td>
                                    <td>
                                        <select name="draw_shape" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('draw_shape', $assessment->draw_shape ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Fold paper</td>
                                    <td>
                                        <select name="fold_paper" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('fold_paper', $assessment->fold_paper ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Cut paper using scissors</td>
                                    <td>
                                        <select name="cut_paper_using_scissors" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('cut_paper_using_scissors', $assessment->
                                                cut_paper_using_scissors ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Able to catch</td>
                                    <td>
                                        <select name="able_to_catch" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('able_to_catch', $assessment->able_to_catch ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Able to throw</td>
                                    <td>
                                        <select name="able_to_throw" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('able_to_throw', $assessment->able_to_throw ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Able to hop</td>
                                    <td>
                                        <select name="able_to_hop" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('able_to_hop', $assessment->able_to_hop ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Able to walk with bean bag</td>
                                    <td>
                                        <select name="able_to_walk_with_bean_bag" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('able_to_walk_with_bean_bag', $assessment->
                                                able_to_walk_with_bean_bag ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Able to balance while running</td>
                                    <td>
                                        <select name="able_to_balance_while_running" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('able_to_balance_while_running', $assessment->
                                                able_to_balance_while_running ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Able to balance on plank</td>
                                    <td>
                                        <select name="able_to_balance_on_plank" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('able_to_balance_on_plank', $assessment->
                                                able_to_balance_on_plank ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Able to follow movements</td>
                                    <td>
                                        <select name="able_to_follow_movements" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('able_to_follow_movements', $assessment->
                                                able_to_follow_movements ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Participate in games</td>
                                    <td>
                                        <select name="participate_in_games" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('participate_in_games', $assessment->participate_in_games ??
                                                '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Trace alphabets</td>
                                    <td>
                                        <select name="trace_alphabets" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('trace_alphabets', $assessment->trace_alphabets ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Copy alphabets</td>
                                    <td>
                                        <select name="copy_alphabets" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('copy_alphabets', $assessment->copy_alphabets ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Recognize sound of the alphabets</td>
                                    <td>
                                        <select name="recognize_sound_of_the_alphabets" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('recognize_sound_of_the_alphabets', $assessment->
                                                recognize_sound_of_the_alphabets ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Recognize shapes of the alphabets</td>
                                    <td>
                                        <select name="recognize_shapes_of_the_alphabets" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('recognize_shapes_of_the_alphabets', $assessment->
                                                recognize_shapes_of_the_alphabets ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Identify shapes</td>
                                    <td>
                                        <select name="identify_shapes" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('identify_shapes', $assessment->identify_shapes ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Master quantity 0-10</td>
                                    <td>
                                        <select name="master_quantity_0_10" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('master_quantity_0_10', $assessment->master_quantity_0_10 ??
                                                '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Recognize shapes of the numbers</td>
                                    <td>
                                        <select name="recognize_shapes_of_the_numbers" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('recognize_shapes_of_the_numbers', $assessment->
                                                recognize_shapes_of_the_numbers ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Sequence numbers</td>
                                    <td>
                                        <select name="sequence_numbers" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('sequence_numbers', $assessment->sequence_numbers ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Compare small sizes</td>
                                    <td>
                                        <select name="compare_small_sizes" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('compare_small_sizes', $assessment->compare_small_sizes ??
                                                '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Compare big sizes</td>
                                    <td>
                                        <select name="compare_big_sizes" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('compare_big_sizes', $assessment->compare_big_sizes ?? '')
                                                == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                {{-- Additional Programs --}}

                                <tr>
                                    <td>Additional Program 1</td>
                                    <td>
                                        <input type="text" name="additional_program_1" class="form-control"
                                            value="{{ old('additional_program_1', $assessment->additional_program_1 ?? '') }}">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Additional Program 1 Score</td>
                                    <td>
                                        <select name="additional_program_1_score" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('additional_program_1_score', $assessment->
                                                additional_program_1_score ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Additional Program 2</td>
                                    <td>
                                        <input type="text" name="additional_program_2" class="form-control"
                                            value="{{ old('additional_program_2', $assessment->additional_program_2 ?? '') }}">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Additional Program 2 Score</td>
                                    <td>
                                        <select name="additional_program_2_score" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('additional_program_2_score', $assessment->
                                                additional_program_2_score ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Additional Program 3</td>
                                    <td>
                                        <input type="text" name="additional_program_3" class="form-control"
                                            value="{{ old('additional_program_3', $assessment->additional_program_3 ?? '') }}">
                                    </td>
                                </tr>

                                <tr>
                                    <td>Additional Program 3 Score</td>
                                    <td>
                                        <select name="additional_program_3_score" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('additional_program_3_score', $assessment->
                                                additional_program_3_score ?? '') == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                {{-- Mandarin --}}

                                <tr>
                                    <td>阅读 Reading</td>
                                    <td>
                                        <select name="mandarin_reading" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('mandarin_reading', $assessment->mandarin_reading ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>书写 Writing</td>
                                    <td>
                                        <select name="mandarin_writing" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('mandarin_writing', $assessment->mandarin_writing ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>听力 Listening</td>
                                    <td>
                                        <select name="mandarin_listening" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('mandarin_listening', $assessment->mandarin_listening ?? '')
                                                == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>说话 Speaking</td>
                                    <td>
                                        <select name="mandarin_speaking" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('mandarin_speaking', $assessment->mandarin_speaking ?? '')
                                                == $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>测验 Test</td>
                                    <td>
                                        <select name="mandarin_test" class="form-select">
                                            @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                                            <option value="{{ $option }}" @selected(old('mandarin_test', $assessment->mandarin_test ?? '') ==
                                                $option)>
                                                {{ $option }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                            </table>


                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>



</body>

</html>
