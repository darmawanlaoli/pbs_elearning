<div class="table-container">
    <table>
        <thead>
            <tr>
                <th rowspan="2" class="frozen-col-1" style="min-width: 50px;">Edit</th>
                <th rowspan="2" class="frozen-col-2" style="min-width: 180px;">Student Name</th>
                <th rowspan="2">Teacher</th>
                <th colspan="14">LANGUAGE SKILL</th>
                <th colspan="7">MANNERS AND COURTESY</th>
                <th colspan="12">DAILY PERFORMANCE</th>
                <th colspan="14">MOTOR SKILL</th>
                <th colspan="12">LITERACY</th>
                <th colspan="14">MATHEMATICS</th>
                <th colspan="7">BAHASA INDONESIA</th>
                <th colspan="5">MANDARIN</th>
                <th rowspan="2">Audio Reading</th>
                <th rowspan="2">Spelling</th>
                <th rowspan="2">Computer</th>
                <th rowspan="2">Science</th>
            </tr>
            <tr class="text-center">
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
                <th>Copy Words</th>
                <th>Write 3 letters word</th>
                <th class="no-t1">Write blend consonant word</th>
                <th>Build 3 letters word</th>
                <th>Read 3 letters word</th>
                <th>Read 3 letters word phrase</th>
                <th>Read 3 letters word sentence</th>
                <th class="no-t1">Identify blend consonant sound</th>
                <th class="no-t1">Build blend consonant word</th>
                <th class="no-t1">Read blend consonant word</th>
                <th class="no-t1">Read blend consonant phrase</th>
                <th class="no-t1">Read blend consonant sentence</th>
                <th>Recognize time (o’clock)</th>
                <th>Master quantity 0-10</th>
                <th>Understand tens</th>
                <th>Understand units and tens</th>
                <th>Able to add objects</th>
                <th>Sequence numbers</th>
                <th class="no-t1">Understand odd and even numbers</th>
                <th class="no-t1">Compare tall height</th>
                <th class="no-t1">Compare short height</th>
                <th class="no-t1">Able to subtract objects</th>
                <th class="no-t1">Recognize time (half past)</th>
                <th class="no-t1">Able to add numbers</th>
                <th class="no-t1">Able to subtract numbers</th>
                <th class="no-t1">Understand hundreds</th>
                <th>Writing properly in the line</th>
                <th>Recognizing letters</th>
                <th>Recognizing syllables</th>
                <th>Reading words</th>
                <th class="no-t1">Reading phrase</th>
                <th class="no-t1">Reading sentence</th>
                <th class="no-t1">Reading comprehension story</th>
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
                    <a href="{{ route('kindergarten.assessment_record_details.edit', $assesment->id) }}" class="btn btn-primary"><i
                            class="ti ti-pencil"></i> Edit</a>
                </td>
                <td class="frozen-col-2">{{ $assesment->name }}</td>
                <td>{{ $assesment->teachers }}</td>

                <!-- LANGUAGE SKILL -->
                <td class="text-center">{{ $assesment->introduce_name }}</td>
                <td class="text-center">{{ $assesment->greet_teacher }}</td>
                <td class="text-center">{{ $assesment->answer_question }}</td>
                <td class="text-center">{{ $assesment->ask_question }}</td>
                <td class="text-center">{{ $assesment->involve_in_conversation }}</td>
                <td class="text-center">{{ $assesment->state_willingness }}</td>
                <td class="text-center">{{ $assesment->pronounce_word }}</td>
                <td class="text-center">{{ $assesment->inform_calendar }}</td>
                <td class="text-center">{{ $assesment->sing_songs }}</td>
                <td class="text-center">{{ $assesment->recite_rhymes }}</td>
                <td class="text-center">{{ $assesment->listen_to_teacher }}</td>
                <td class="text-center">{{ $assesment->listen_to_classmates }}</td>
                <td class="text-center">{{ $assesment->follow_instruction }}</td>
                <td class="text-center">{{ $assesment->respond_to_questions }}</td>

                <!-- MANNERS AND COURTESY -->
                <td class="text-center">{{ $assesment->respect_teachers }}</td>
                <td class="text-center">{{ $assesment->respect_friends }}</td>
                <td class="text-center">{{ $assesment->speak_politely_to_others }}</td>
                <td class="text-center">{{ $assesment->care_to_others }}</td>
                <td class="text-center">{{ $assesment->share_with_others }}</td>
                <td class="text-center">{{ $assesment->help_others }}</td>
                <td class="text-center">{{ $assesment->obey_teachers }}</td>

                <!-- DAILY PERFORMANCE -->
                <td class="text-center">{{ $assesment->get_along_with_classmates }}</td>
                <td class="text-center">{{ $assesment->give_attention_to_the_lesson }}</td>
                <td class="text-center">{{ $assesment->do_given_task_independently }}</td>
                <td class="text-center">{{ $assesment->finish_task_as_order }}</td>
                <td class="text-center">{{ $assesment->willing_to_perform }}</td>
                <td class="text-center">{{ $assesment->willing_to_take_turn }}</td>
                <td class="text-center">{{ $assesment->dress_neatly }}</td>
                <td class="text-center">{{ $assesment->neaten_belonging }}</td>
                <td class="text-center">{{ $assesment->take_care_of_school_property }}</td>
                <td class="text-center">{{ $assesment->keep_clean }}</td>
                <td class="text-center">{{ $assesment->enjoy_doing_art_works }}</td>
                <td class="text-center">{{ $assesment->able_to_eat_using_utensils }}</td>

                <!-- MOTOR SKILL -->
                <td class="text-center">{{ $assesment->color_picture_in_designated_area }}</td>
                <td class="text-center">{{ $assesment->use_paint_brush }}</td>
                <td class="text-center">{{ $assesment->paste_paper }}</td>
                <td class="text-center">{{ $assesment->draw_shape }}</td>
                <td class="text-center">{{ $assesment->fold_paper }}</td>
                <td class="text-center">{{ $assesment->cut_paper_using_scissors }}</td>
                <td class="text-center">{{ $assesment->able_to_catch }}</td>
                <td class="text-center">{{ $assesment->able_to_throw }}</td>
                <td class="text-center">{{ $assesment->able_to_hop }}</td>
                <td class="text-center">{{ $assesment->able_to_walk_with_bean_bag }}</td>
                <td class="text-center">{{ $assesment->able_to_balance_while_running }}</td>
                <td class="text-center">{{ $assesment->able_to_balance_on_plank }}</td>
                <td class="text-center">{{ $assesment->able_to_follow_movements }}</td>
                <td class="text-center">{{ $assesment->participate_in_games }}</td>

                <!-- LITERACY -->
                <td class="text-center">{{ $assesment->copy_words }}</td>
                <td class="text-center">{{ $assesment->write_3_letters }}</td>
                <td class="text-center no-t1">{{ $assesment->write_blend_consonant }}</td>
                <td class="text-center">{{ $assesment->build_3_letters }}</td>
                <td class="text-center">{{ $assesment->read_3_letters }}</td>
                <td class="text-center">{{ $assesment->build_3_letters_word_phrase }}</td>
                <td class="text-center">{{ $assesment->build_3_letters_word_sentence }}</td>
                <td class="text-center no-t1">{{ $assesment->identify_blend_consonant }}</td>
                <td class="text-center no-t1">{{ $assesment->build_blend_consonant }}</td>
                <td class="text-center no-t1">{{ $assesment->read_blend_consonant_word }}</td>
                <td class="text-center no-t1">{{ $assesment->read_blend_consonant_phrase }}</td>
                <td class="text-center no-t1">{{ $assesment->read_blend_consonant_sentence }}</td>

                <!-- MATHEMATICS -->
                <td class="text-center">{{ $assesment->recognize_time }}</td>
                <td class="text-center">{{ $assesment->master_quantity_0_10 }}</td>
                <td class="text-center">{{ $assesment->understand_tens }}</td>
                <td class="text-center">{{ $assesment->understand_units_and_tens }}</td>
                <td class="text-center">{{ $assesment->able_to_add_objects }}</td>
                <td class="text-center">{{ $assesment->sequence_numbers }}</td>
                <td class="text-center no-t1">{{ $assesment->understand_odd_and_even_numbers }}</td>
                <td class="text-center no-t1">{{ $assesment->compare_tall_height }}</td>
                <td class="text-center no-t1">{{ $assesment->compare_short_height }}</td>
                <td class="text-center no-t1">{{ $assesment->able_to_subtract_objects }}</td>
                <td class="text-center no-t1">{{ $assesment->recognize_time_half_past }}</td>
                <td class="text-center no-t1">{{ $assesment->able_to_add_numbers }}</td>
                <td class="text-center no-t1">{{ $assesment->able_to_subtract_numbers }}</td>
                <td class="text-center no-t1">{{ $assesment->understand_hundreds }}</td>

                <!-- BAHASA INDONESIA -->
                <td class="text-center">{{ $assesment->indo_writing_properly_in_the_line }}</td>
                <td class="text-center">{{ $assesment->indo_recognizing_letters }}</td>
                <td class="text-center">{{ $assesment->indo_recognizing_syllables }}</td>
                <td class="text-center">{{ $assesment->indo_reading_words }}</td>
                <td class="text-center no-t1">{{ $assesment->indo_reading_phrase }}</td>
                <td class="text-center no-t1">{{ $assesment->indo_reading_sentence }}</td>
                <td class="text-center no-t1">{{ $assesment->indo_reading_comprehension_story }}</td>

                <!-- MANDARIN -->
                <td class="text-center">{{ $assesment->mandarin_reading }}</td>
                <td class="text-center">{{ $assesment->mandarin_writing }}</td>
                <td class="text-center">{{ $assesment->mandarin_listening }}</td>
                <td class="text-center">{{ $assesment->mandarin_speaking }}</td>
                <td class="text-center">{{ $assesment->mandarin_test }}</td>

                <!-- ADDITIONAL -->
                <td class="text-center">{{ $assesment->audio_reading }}</td>
                <td class="text-center">{{ $assesment->spelling }}</td>
                <td class="text-center">{{ $assesment->computer }}</td>
                <td class="text-center">{{ $assesment->science }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
