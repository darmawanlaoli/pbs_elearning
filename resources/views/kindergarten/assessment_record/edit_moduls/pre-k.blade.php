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
                        'Answer questions' => 'answer_question',
                        'State willingness' => 'state_willingness',
                        'Involve in conversation' => 'involve_in_conversation',
                        'Pronounce word' => 'pronounce_word',
                        'Inform calendar' => 'inform_calendar',
                        'Sing songs' => 'sing_songs',
                        'Recite rhymes' => 'recite_rhymes',
                        'Listen to teacher' => 'listen_to_teacher',
                        'Listen to classmates' => 'listen_to_classmates',
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
                        'Finish Task' => 'finish_task_as_order',
                        'Willing to perform' => 'willing_to_perform',
                        'Willing to take turn' => 'willing_to_take_turn',
                        'Dress neatly' => 'dress_neatly',
                        'Neaten belonging' => 'neaten_belonging',
                        'Take care of school property' => 'take_care_of_school_property',
                        'Keep clean' => 'keep_clean',
                        'Enjoy doing art works' => 'enjoy_doing_art_works',
                        'Able to eat using utensils' => 'able_to_eat_using_utensils',
                        ],

                        'MOTOR SKILL' => [
                        'Hold pencil appropriately' => 'hold_pencil_appropriately',
                        'Stroke pencil' => 'stroke_pencil',
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
                        'Trace horizontal lines' => 'trace_horizontal_lines',
                        'Trace diagonal lines' => 'trace_diagonal_lines',
                        'Trace curve lines' => 'trace_curve_lines',
                        'Trace shapes' => 'trace_shapes',

                        'Recognize sound of i, l, t, f, k' => 'recognize_sound_of_i_l_t_f_k',
                        'Recognize shape of i, l, t, f, k' => 'recognize_shape_of_i_l_t_f_k',
                        'Trace alphabets: i, l, t, f, k' => 'trace_alphabets_of_i_l_t_f_k',

                        // 'Recognize sound of r, n, m, c, a, d, g' => 'recognize_sound_of_r_n_m_c_a_d_g',
                        // 'Recognize shape of r, n, m, c, a, d, g' => 'recognize_shape_of_r_n_m_c_a_d_g',
                        // 'Trace alphabets: r, n, m, c, a, d, g' => 'trace_alphabets_r_n_m_c_a_d_g',

                        // 'Recognize sound of h, b, p, e, o, q, s' => 'recognize_sound_of_h_b_p_e_o_q_s',
                        // 'Recognize shape of h, b, p, e, o, q, s' => 'recognize_shape_of_h_b_p_e_o_q_s',
                        // 'Trace alphabets: h, b, p, e, o, q, s' => 'trace_alphabets_h_b_p_e_o_q_s',

                        // 'Recognize sound of u, y, j, v, w, x, z' => 'recognize_sound_of_u_y_j_v_w_x_z',
                        // 'Recognize shape of u, y, j, v, w, x, z' => 'recognize_shape_of_u_y_j_v_w_x_z',
                        // 'Trace alphabets: u, y, j, v, w, x, z' => 'trace_alphabets_u_y_j_v_w_x_z',
                        ],

                        'MATHEMATICS' => [
                        'Identify colors: red, blue, yellow' => 'identify_colors_red_blue_yellow',
                        'Recognize colors: green, orange, purple' => 'recognize_colors_green_orange_purple',
                        'Identify number 0-5' => 'identify_number_0_5',
                        'Understand quantity 0-5' => 'understand_quantity_0_5',
                        // 'Identify shapes: square, circle, triangle' => 'identify_shapes_square_circle_triangle',
                        // 'Discriminate long and short' => 'discriminate_long_and_short',
                        // 'Identify number 6-9' => 'identify_number_6_9',
                        // 'Understand quantity 6-9' => 'understand_quantity_6_9',
                        // 'Recognize shapes: rectangle, diamond, oval' => 'recognize_shapes_rectangle_diamond_oval',
                        // 'Identify number 10-12' => 'identify_number_10_12',
                        // 'Understand quantity 10-12' => 'understand_quantity_10_12',
                        // 'Recognize colors: black, white, brown, pink' => 'recognize_colors_black_white_brown_pink',
                        // 'Identify number 13-15' => 'identify_number_13_15',
                        // 'Understand quantity 13-15' => 'understand_quantity_13_15',
                        ],
                        ];
                        @endphp

                        <table class="table table-bordered">
                            <tr class="bg-primary text-white">
                                <th>Description</th>
                                <th>Score</th>
                            </tr>

                            @foreach($sections as $sectionName => $fields)

                            <tr class="bg-success text-white">
                                <th colspan="2">{{ $sectionName }}</th>
                            </tr>

                            @foreach($fields as $label => $field)
                            <tr>
                                <th>{{ $label }}</th>
                                <td>
                                    <select name="{{ $field }}" class="form-select">
                                        @foreach($options as $option)
                                        <option value="{{ $option }}" @selected(old($field, $assessment->{$field} ?? '') == $option)>
                                            {{ $option }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            @endforeach

                            @endforeach

                            {{-- Additional Program --}}
                            <tr class="bg-success text-white">
                                <th colspan="2">ADDITIONAL PROGRAM</th>
                            </tr>

                            <tr>
                                <th>Additional Program</th>
                                <td>
                                    <input type="text" name="additional_program_1" class="form-control"
                                        value="{{ old('additional_program_1', $assessment->additional_program_1 ?? '') }}">
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
                                            )>
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
