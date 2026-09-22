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
            </tr>
        </thead>
        <tbody>
            @foreach($assessments as $assesment)
            <tr>
                <td class="frozen-col-1">
                    <a href="{{ route('kindergarten.assessment_record_details.edit', $assesment->id) }}" class="btn btn-primary"><i class="ti ti-pencil"></i> Edit</a>
                </td>
                <td class="frozen-col-2">{{ $assesment->name }}</td>
                <td>{{ $assesment->teachers }}</td>

                <td class="text-center">
                    {{ $assesment->introduce_name }}
                </td>

                <td class="text-center">
                    {{ $assesment->greet_teacher }}
                </td>

                <td class="text-center">
                    {{ $assesment->answer_question }}
                </td>

                <td class="text-center">
                    {{ $assesment->ask_question }}
                </td>

                <td class="text-center">
                    {{ $assesment->involve_in_conversation }}
                </td>

                <td class="text-center">
                    {{ $assesment->state_willingness }}
                </td>

                <td class="text-center">
                    {{ $assesment->pronounce_word }}
                </td>

                <td class="text-center">
                    {{ $assesment->inform_calendar }}
                </td>

                <td class="text-center">
                    {{ $assesment->sing_songs }}
                </td>

                <td class="text-center">
                    {{ $assesment->recite_rhymes }}
                </td>

                <td class="text-center">
                    {{ $assesment->listen_to_teacher }}
                </td>

                <td class="text-center">
                    {{ $assesment->listen_to_classmates }}
                </td>

                <td class="text-center">
                    {{ $assesment->follow_instruction }}
                </td>

                <td class="text-center">
                    {{ $assesment->respond_to_questions }}
                </td>

                <td class="text-center">
                    {{ $assesment->respect_teachers }}
                </td>

                <td class="text-center">
                    {{ $assesment->respect_friends }}
                </td>

                <td class="text-center">
                    {{ $assesment->speak_politely_to_others }}
                </td>

                <td class="text-center">
                    {{ $assesment->care_to_others }}
                </td>

                <td class="text-center">
                    {{ $assesment->share_with_others }}
                </td>

                <td class="text-center">
                    {{ $assesment->help_others }}
                </td>

                <td class="text-center">
                    {{ $assesment->obey_teachers }}
                </td>

                <td class="text-center">
                    {{ $assesment->get_along_with_classmates }}
                </td>

                <td class="text-center">
                    {{ $assesment->give_attention_to_the_lesson }}
                </td>

                <td class="text-center">
                    {{ $assesment->do_given_task_independently }}
                </td>

                <td class="text-center">
                    {{ $assesment->finish_task_as_order }}
                </td>

                <td class="text-center">
                    {{ $assesment->willing_to_perform }}
                </td>

                <td class="text-center">
                    {{ $assesment->willing_to_take_turn }}
                </td>

                <td class="text-center">
                    {{ $assesment->dress_neatly }}
                </td>

                <td class="text-center">
                    {{ $assesment->neaten_belonging }}
                </td>

                <td class="text-center">
                    {{ $assesment->take_care_of_school_property }}
                </td>

                <td class="text-center">
                    {{ $assesment->keep_clean }}
                </td>

                <td class="text-center">
                    {{ $assesment->enjoy_doing_art_works }}
                </td>

                <td class="text-center">
                    {{ $assesment->able_to_eat_using_utensils }}
                </td>

                <td class="text-center">
                    {{ $assesment->color_picture_in_designated_area }}
                </td>

                <td class="text-center">
                    {{ $assesment->use_paint_brush }}
                </td>

                <td class="text-center">
                    {{ $assesment->paste_paper }}
                </td>

                <td class="text-center">
                    {{ $assesment->draw_shape }}
                </td>

                <td class="text-center">
                    {{ $assesment->fold_paper }}
                </td>

                <td class="text-center">
                    {{ $assesment->cut_paper_using_scissors }}
                </td>

                <td class="text-center">
                    {{ $assesment->able_to_catch }}
                </td>

                <td class="text-center">
                    {{ $assesment->able_to_throw }}
                </td>

                <td class="text-center">
                    {{ $assesment->able_to_hop }}
                </td>

                <td class="text-center">
                    {{ $assesment->able_to_walk_with_bean_bag }}
                </td>

                <td class="text-center">
                    {{ $assesment->able_to_balance_while_running }}
                </td>

                <td class="text-center">
                    {{ $assesment->able_to_balance_on_plank }}
                </td>

                <td class="text-center">
                    {{ $assesment->able_to_follow_movements }}
                </td>

                <td class="text-center">
                    {{ $assesment->participate_in_games }}
                </td>

                <td class="text-center">
                    {{ $assesment->trace_alphabets }}
                </td>

                <td class="text-center">
                    {{ $assesment->copy_alphabets }}
                </td>

                <td class="text-center">
                    {{ $assesment->recognize_sound_of_the_alphabets }}
                </td>

                <td class="text-center">
                    {{ $assesment->recognize_shapes_of_the_alphabets }}
                </td>

                <td class="text-center">
                    {{ $assesment->identify_shapes }}
                </td>

                <td class="text-center">
                    {{ $assesment->master_quantity_0_10 }}
                </td>

                <td class="text-center">
                    {{ $assesment->recognize_shapes_of_the_numbers }}
                </td>

                <td class="text-center">
                    {{ $assesment->sequence_numbers }}
                </td>

                <td class="text-center">
                    {{ $assesment->compare_small_sizes }}
                </td>

                <td class="text-center">
                    {{ $assesment->compare_big_sizes }}
                </td>

                <td class="text-center">
                    {{ $assesment->additional_program_1 }}
                </td>

                <td class="text-center">
                    {{ $assesment->additional_program_1_score }}
                </td>

                <td class="text-center">
                    {{ $assesment->additional_program_2 }}
                </td>

                <td class="text-center">
                    {{ $assesment->additional_program_2_score }}
                </td>

                <td class="text-center">
                    {{ $assesment->additional_program_3 }}
                </td>

                <td class="text-center">
                    {{ $assesment->additional_program_3_score }}
                </td>

                <td class="text-center">
                    {{ $assesment->mandarin_reading }}
                </td>

                <td class="text-center">
                    {{ $assesment->mandarin_writing }}
                </td>

                <td class="text-center">
                    {{ $assesment->mandarin_listening }}
                </td>

                <td class="text-center">
                    {{ $assesment->mandarin_speaking }}
                </td>

                <td class="text-center">
                    {{ $assesment->mandarin_test }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
