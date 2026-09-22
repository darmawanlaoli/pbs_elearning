<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th class="frozen-col-1" style="min-width: 50px;">Edit</th>
                <th class="frozen-col-2" style="min-width: 180px;">Student Name</th>
                <th>Teacher</th>
                <th>1.Introduce Name</th>
                <th>2.Greet teacher and friend</th>
                <th>3.Answer questions</th>
                <th>6.State willingness</th>
                <th>5.Involve in conversation</th>
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
                <th>Finish Task</th>
                <th>Willing to perform</th>
                <th>Willing to take turn</th>
                <th>Dress neatly</th>
                <th>Neaten belonging</th>
                <th>Take care of school property</th>
                <th>Keep clean</th>
                <th>Enjoy doing art works</th>
                <th>Able to eat using utensils</th>
                <th>Hold pencil appropriately</th>
                <th>Stroke pencil</th>
                <th>Color picture</th>
                <th>Use paint brush</th>
                <th>Use of glue</th>
                <th>Paste paper</th>
                <th>Able to catch with both hands</th>
                <th>Able to throw</th>
                <th>Able to jump</th>
                <th>Able to balance while running</th>
                <th>Able to balance on plank</th>
                <th>Able to follow movements</th>
                <th>Participate in games</th>
                <th>Trace vertical lines</th>
                <th>Trace horizontal lines</th>
                <th>Trace diagonal lines</th>
                <th>Trace curve lines</th>
                <th>Trace shapes</th>
                <th>Recognize sound of i, l, t, f, k</th>
                <th>Recognize shape of i, l, t, f, k</th>
                <th>Trace alphabets: i, l, t, f, k</th>
                <th>Recognize sound of r, n, m, c, a, d, g</th>
                <th>Recognize shape of r, n, m, c, a, d, g</th>
                <th>Trace alphabets: r, n, m, c, a, d, g</th>
                <th>Recognize sound of h, b, p, e, o, q, s</th>
                <th>Recognize shape of h, b, p, e, o, q, s</th>
                <th>Trace alphabets: h, b, p, e, o, q, s</th>
                <th>Recognize sound of u, y, j, v, w, x, z</th>
                <th>Recognize shape of u, y, j, v, w, x, z</th>
                <th>Trace alphabets: u, y, j, v, w, x, z</th>
                <th>Identify colors: red, blue, yellow</th>
                <th>Recognize colors: green, orange, purple</th>
                <th>Identify number 0-5</th>
                <th>Understand quantity 0-5</th>
                <th>Identify shapes: square, circle, triangle</th>
                <th>Discriminate long and short</th>
                <th>Identify number 6-9</th>
                <th>Understand quantity 6-9</th>
                <th>Recognize shapes: rectangle, diamond, oval</th>
                <th>Identify number 10-12</th>
                <th>Understand quantity 10-12</th>
                <th>Recognize colors: black, white, brown, pink</th>
                <th>Identify number 13-15</th>
                <th>Understand quantity 13-15</th>
                <th>Additional Program</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assessments as $assesment)
            <tr>
                <td class="frozen-col-1">
                    <a href="{{ route('kindergarten.assessment_record_details.edit', $assesment->id) }}" class="btn btn-primary"><i
                            class="ti ti-pencil"></i> Edit</a>
                </td>
                <td class="frozen-col-2">{{ $assesment->name }}</td>
                <td>{{ $assesment->teachers }}</td>

                <td class="text-center">{{ $assesment->introduce_name }}</td>
                <td class="text-center">{{ $assesment->greet_teacher }}</td>
                <td class="text-center">{{ $assesment->answer_question }}</td>
                <td class="text-center">{{ $assesment->state_willingness }}</td>
                <td class="text-center">{{ $assesment->involve_in_conversation }}</td>
                <td class="text-center">{{ $assesment->pronounce_word }}</td>
                <td class="text-center">{{ $assesment->inform_calendar }}</td>
                <td class="text-center">{{ $assesment->sing_songs }}</td>
                <td class="text-center">{{ $assesment->recite_rhymes }}</td>
                <td class="text-center">{{ $assesment->listen_to_teacher }}</td>
                <td class="text-center">{{ $assesment->listen_to_classmates }}</td>
                <td class="text-center">{{ $assesment->follow_instruction }}</td>
                <td class="text-center">{{ $assesment->respond_to_questions }}</td>
                <td class="text-center">{{ $assesment->respect_teachers }}</td>
                <td class="text-center">{{ $assesment->respect_friends }}</td>
                <td class="text-center">{{ $assesment->speak_politely_to_others }}</td>
                <td class="text-center">{{ $assesment->care_to_others }}</td>
                <td class="text-center">{{ $assesment->share_with_others }}</td>
                <td class="text-center">{{ $assesment->help_others }}</td>
                <td class="text-center">{{ $assesment->obey_teachers }}</td>
                <td class="text-center">{{ $assesment->get_along_with_classmates }}</td>
                <td class="text-center">{{ $assesment->give_attention_to_the_lesson }}</td>
                <td class="text-center">{{ $assesment->finish_task_as_order }}</td>
                <td class="text-center">{{ $assesment->willing_to_perform }}</td>
                <td class="text-center">{{ $assesment->willing_to_take_turn }}</td>
                <td class="text-center">{{ $assesment->dress_neatly }}</td>
                <td class="text-center">{{ $assesment->neaten_belonging }}</td>
                <td class="text-center">{{ $assesment->take_care_of_school_property }}</td>
                <td class="text-center">{{ $assesment->keep_clean }}</td>
                <td class="text-center">{{ $assesment->enjoy_doing_art_works }}</td>
                <td class="text-center">{{ $assesment->able_to_eat_using_utensils }}</td>
                <td class="text-center">{{ $assesment->hold_pencil_appropriately }}</td>
                <td class="text-center">{{ $assesment->stroke_pencil }}</td>
                <td class="text-center">{{ $assesment->color_picture }}</td>
                <td class="text-center">{{ $assesment->use_paint_brush }}</td>
                <td class="text-center">{{ $assesment->use_of_glue }}</td>
                <td class="text-center">{{ $assesment->paste_paper }}</td>
                <td class="text-center">{{ $assesment->able_to_catch }}</td>
                <td class="text-center">{{ $assesment->able_to_throw }}</td>
                <td class="text-center">{{ $assesment->able_to_jump }}</td>
                <td class="text-center">{{ $assesment->able_to_balance_while_running }}</td>
                <td class="text-center">{{ $assesment->able_to_balance_on_plank }}</td>
                <td class="text-center">{{ $assesment->able_to_follow_movements }}</td>
                <td class="text-center">{{ $assesment->participate_in_games }}</td>
                <td class="text-center">{{ $assesment->trace_vertical_lines }}</td>
                <td class="text-center">{{ $assesment->trace_horizontal_lines }}</td>
                <td class="text-center">{{ $assesment->trace_diagonal_lines }}</td>
                <td class="text-center">{{ $assesment->trace_curve_lines }}</td>
                <td class="text-center">{{ $assesment->trace_shapes }}</td>
                <td class="text-center">{{ $assesment->recognize_sound_of_i_l_t_f_k }}</td>
                <td class="text-center">{{ $assesment->recognize_shape_of_i_l_t_f_k }}</td>
                <td class="text-center">{{ $assesment->trace_alphabets_of_i_l_t_f_k }}</td>
                <td class="text-center no-t1">{{ $assesment->recognize_sound_of_r_n_m_c_a_d_g }}</td>
                <td class="text-center no-t1">{{ $assesment->recognize_shape_of_r_n_m_c_a_d_g }}</td>
                <td class="text-center no-t1">{{ $assesment->trace_alphabets_r_n_m_c_a_d_g }}</td>
                <td class="text-center no-t1">{{ $assesment->recognize_sound_of_h_b_p_e_o_q_s }}</td>
                <td class="text-center no-t1">{{ $assesment->recognize_shape_of_h_b_p_e_o_q_s }}</td>
                <td class="text-center no-t1">{{ $assesment->trace_alphabets_h_b_p_e_o_q_s }}</td>
                <td class="text-center no-t1">{{ $assesment->recognize_sound_of_u_y_j_v_w_x_z }}</td>
                <td class="text-center no-t1">{{ $assesment->recognize_shape_of_u_y_j_v_w_x_z }}</td>
                <td class="text-center no-t1">{{ $assesment->trace_alphabets_u_y_j_v_w_x_z }}</td>
                <td class="text-center">{{ $assesment->identify_colors_red_blue_yellow }}</td>
                <td class="text-center">{{ $assesment->recognize_colors_green_orange_purple }}</td>
                <td class="text-center">{{ $assesment->identify_number_0_5 }}</td>
                <td class="text-center">{{ $assesment->understand_quantity_0_5 }}</td>
                <td class="text-center no-t1">{{ $assesment->identify_shapes_square_circle_triangle }}</td>
                <td class="text-center no-t1">{{ $assesment->discriminate_long_and_short }}</td>
                <td class="text-center no-t1">{{ $assesment->identify_number_6_9 }}</td>
                <td class="text-center no-t1">{{ $assesment->understand_quantity_6_9 }}</td>
                <td class="text-center no-t1">{{ $assesment->recognize_shapes_rectangle_diamond_oval }}</td>
                <td class="text-center no-t1">{{ $assesment->identify_number_10_12 }}</td>
                <td class="text-center no-t1">{{ $assesment->understand_quantity_10_12 }}</td>
                <td class="text-center no-t1">{{ $assesment->recognize_colors_black_white_brown_pink }}</td>
                <td class="text-center no-t1">{{ $assesment->identify_number_13_15 }}</td>
                <td class="text-center no-t1">{{ $assesment->understand_quantity_13_15 }}</td>
                <td class="text-center">{{ $assesment->additional_program_1 }}</td>
                <td class="text-center">{{ $assesment->additional_program_1_score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
