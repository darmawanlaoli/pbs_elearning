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

                        @php
                        $options = ['', 'I', 'G', 'S', 'E'];

                        $sections = [
                        'LANGUAGE SKILL' => [
                        'Introduce Name' => 'introduce_name',
                        'Greet teacher and friend' => 'greet_teacher',
                        'State willingness' => 'state_willingness',
                        'Repeat Word' => 'report_word',
                        'Repeat day, date, month, year' => 'repeat_day_date_month_year',
                        'Sing songs' => 'sing_song',
                        'Recite rhymes' => 'recite_rhymes',
                        'Listen to teachers' => 'listen_to_teacher',
                        'Follow instruction' => 'follow_instruction',
                        'Respond to questions' => 'respond_to_questions',
                        ],

                        'MANNERS AND COURTESY' => [
                        'Respect teachers' => 'respect_teachers',
                        'Respect friends' => 'respect_friends',
                        'Speak politely to others' => 'speak_politely_to_others',
                        'Care to others' => 'care_to_others',
                        'Share with others' => 'share_with_others',
                        'Help others' => 'help_others',
                        'Obey teachers' => 'obey_teachers',
                        ],

                        'DAILY PERFORMANCE' => [
                        'Get along with classmates' => 'get_along_with_classmates',
                        'Give attention to the lesson' => 'give_attention_to_the_lesson',
                        'Do given task independently' => 'do_given_task_independetly',
                        'Finish task as order' => 'finish_task_as_order',
                        'Willing to perform' => 'willing_to_perform',
                        'Willing to take turn' => 'willing_to_take_turn',
                        'Dress neatly' => 'dress_neatly',
                        'Neaten belonging' => 'neaten_belonging',
                        'Take care of school property' => 'take_care_of_school_property',
                        'Keep clean' => 'keep_clean',
                        'Enjoy doing art works' => 'enjoy_doing_art_works',
                        'Able to eat independently' => 'able_to_eat_independetly',
                        ],

                        'MOTOR SKILL' => [
                        'Hold pencil appropriately' => 'hold_pencil_appropriately',
                        'Color picture' => 'color_picture',
                        'Use paint brush' => 'use_paint_brush',
                        'Use of glue' => 'use_of_glue',
                        'Paste paper' => 'paste_paper',
                        'Able to catch with both hands' => 'able_to_catch',
                        'Able to throw' => 'able_to_throw',
                        'Able to jump' => 'able_to_jump',
                        'Able to balance while running' => 'able_to_balance_while_running',
                        'Able to balance on plank' => 'able_to_balance_on_plank',
                        'Able to follow movements' => 'able_to_follow_movements',
                        'Participate in games' => 'participate_in_games',
                        ],

                        'LITERACY' => [
                        'Trace vertical lines' => 'trace_vertical_lines',
                        'Able to match object or picture' => 'able_to_match_object',
                        ],

                        'MATHEMATICS' => [
                        'Recognize colors red, yellow, blue' => 'recognize_colors_red_yellow_blue',
                        ],
                        ];
                        @endphp

                        <table class="table table-bordered">

                            <tr class="bg-primary text-white">
                                <th>Description</th>
                                <th>Score</th>
                            </tr>

                            @foreach($sections as $sectionName => $fields)

                            <tr class="bg-light">
                                <th colspan="2">{{ $sectionName }}</th>
                            </tr>

                            @foreach($fields as $label => $field)
                            <tr>
                                <th>{{ $label }}</th>
                                <td>
                                    <select name="{{ $field }}" class="form-select">
                                        @foreach($options as $option)
                                        <option value="{{ $option }}" @selected( old( $field, $assessment->{$field} ?? ''
                                            ) == $option
                                            )
                                            >
                                            {{ $option }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            @endforeach

                            @endforeach

                            {{-- Additional Program --}}
                            <tr class="bg-light">
                                <th colspan="2">ADDITIONAL PROGRAM</th>
                            </tr>

                            <tr>
                                <th>Additional Program</th>
                                <td>
                                    <input type="text" name="additional_program_1" class="form-control" value="{{ old(
                                            'additional_program_1',
                                            $assessment->additional_program_1 ?? ''
                                        ) }}">
                                </td>
                            </tr>

                            <tr>
                                <th>Score</th>
                                <td>
                                    <select name="additional_program_1_score" class="form-select">
                                        @foreach($options as $option)
                                        <option value="{{ $option }}" @selected( old( 'additional_program_1_score' , $assessment->
                                            additional_program_1_score ?? ''
                                            ) == $option
                                            )
                                            >
                                            {{ $option }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                        </table>


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
