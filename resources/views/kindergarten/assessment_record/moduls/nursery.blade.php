<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th class="frozen-col-1" style="min-width: 50px;">Edit</th>
                <th class="frozen-col-2" style="min-width: 180px;">Student Name</th>
                <th>Teacher</th>
                <th>1.Introduce Name</th>
                <th>2.Greet teacher and friend</th>
                <th>6.State willingness</th>
                <th>Repeat Word</th>
                <th>Repeat day, date, month, year</th>
                <th>Sing songs</th>
                <th>Recite rhymes</th>
                <th class="no-t1">Inform gender</th>
                <th class="no-t1">Inform age</th>
                <th class="no-t1">Mention day, date, month, year</th>
                <th class="no-t1">Name body parts</th>
                <th>Listen to teachers</th>
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
                <th>Able to eat independently</th>
                <th>Hold pencil appropriately</th>
                <th class="no-t1">Stroke pencil</th>
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
                <th class="no-t1">Trace horizontal lines</th>
                <th class="no-t1">Recognize sound of i, l, t</th>
                <th class="no-t1">Recognize shape of i, l, t</th>
                <th class="no-t1">Trace alphabets i, l, t</th>
                <th class="no-t1">Trace wiggle lines</th>
                <th class="no-t1">Trace curve lines</th>
                <th class="no-t1">Recognize sound of r, n, m</th>
                <th class="no-t1">Recognize shape of r, n, m</th>
                <th class="no-t1">Trace alphabets r, n, m</th>
                <th class="no-t1">Trace shapes</th>
                <th class="no-t1">Recognize sound of c, a, d</th>
                <th class="no-t1">Recognize shape of c, a, d</th>
                <th class="no-t1">Trace alphabets c, a, d</th>
                <th>Able to match object or picture</th>
                <th>Recognize colors red, yellow, blue</th>
                <th class="no-t1">Recognize shapes circle, triangle, square</th>
                <th class="no-t1">Discriminate big and small</th>
                <th class="no-t1">Understand quantity concept</th>
                <th class="no-t1">Identify number 1-2</th>
                <th class="no-t1">Understand quantity 1-2</th>
                <th class="no-t1">Able to pattern object or picture</th>
                <th class="no-t1">Identify number 3-5</th>
                <th class="no-t1">Understand quantity 3-5</th>
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
                <td class="text-center">{{ $assesment->state_willingness }}</td>
                <td class="text-center">{{ $assesment->report_word }}</td>
                <td class="text-center">{{ $assesment->repeat_day_date_month_year }}</td>
                <td class="text-center">{{ $assesment->sing_song }}</td>
                <td class="text-center">{{ $assesment->recite_rhymes }}</td>
                <td class="text-center no-t1">{{ $assesment->inform_gender }}</td>
                <td class="text-center no-t1">{{ $assesment->inform_age }}</td>
                <td class="text-center no-t1">{{ $assesment->mention_day_date_month_year }}</td>
                <td class="text-center no-t1">{{ $assesment->name_body_parts }}</td>
                <td class="text-center">{{ $assesment->listen_to_teacher }}</td>
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
                <td class="text-center">{{ $assesment->do_given_task_independetly }}</td>
                <td class="text-center">{{ $assesment->finish_task_as_order }}</td>
                <td class="text-center">{{ $assesment->willing_to_perform }}</td>
                <td class="text-center">{{ $assesment->willing_to_take_turn }}</td>
                <td class="text-center">{{ $assesment->dress_neatly }}</td>
                <td class="text-center">{{ $assesment->neaten_belonging }}</td>
                <td class="text-center">{{ $assesment->take_care_of_school_property }}</td>
                <td class="text-center">{{ $assesment->keep_clean }}</td>
                <td class="text-center">{{ $assesment->enjoy_doing_art_works }}</td>
                <td class="text-center">{{ $assesment->able_to_eat_independetly }}</td>
                <td class="text-center">{{ $assesment->hold_pencil_appropriately }}</td>
                <td class="text-center no-t1">{{ $assesment->stroke_pencil }}</td>
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
                <td class="text-center no-t1">{{ $assesment->trace_horizontal_lines }}</td>
                <td class="text-center no-t1">{{ $assesment->recognize_sound_of_i_l_t }}</td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center">{{ $assesment->able_to_match_object }}</td>
                <td class="text-center">{{ $assesment->recognize_colors_red_yellow_blue }}</td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center no-t1"></td>
                <td class="text-center">{{ $assesment->additional_program_1 }}</td>
                <td class="text-center">{{ $assesment->additional_program_1_score }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
