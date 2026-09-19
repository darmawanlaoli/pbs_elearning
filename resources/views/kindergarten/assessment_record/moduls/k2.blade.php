<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th style="min-width: 50px;">No</th>
                <th style="min-width: 180px;">Student Name</th>
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

                {{-- <th>Trace alphabets</th> --}}
                <th>Copy Words</th>
                <th>Write 3 letters word</th>
                <th class="no-t1">Write blend consonant word</th>
                <th>Build 3 letters word</th>
                <th>Read 3 letters word</th>
                <th>Read 3 letters word phrase</th>
                <th >Read 3 letters word sentence</th>
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
                <th>Audio Reading</th>
                <th>Spelling</th>
                <th>Computer</th>
                <th>Science</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assessments as $assesment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $assesment->name }}</td>
                <td>{{ $assesment->teachers }}</td>

                <!-- Contoh Penulisan Tag Select & Attribute Name yang Benar untuk Form Submit -->
                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][introduce_name]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
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
                    <select name="assessments[{{ $assesment->id }}][copy_words]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.copy_words",
                            $assesment->copy_words ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][write_3_letters]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.write_3_letters",
                            $assesment->write_3_letters ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][write_blend_consonant]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.write_blend_consonant",
                            $assesment->write_blend_consonant ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][build_3_letters]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.build_3_letters",
                            $assesment->build_3_letters ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][read_3_letters]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.read_3_letters",
                            $assesment->read_3_letters ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                {{-- test --}}
                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][build_3_letters_word_phrase]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.build_3_letters_word_phrase",
                            $assesment->build_3_letters_word_phrase ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][build_3_letters_word_sentence]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.build_3_letters_word_sentence",
                            $assesment->build_3_letters_word_sentence ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][identify_blend_consonant]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.identify_blend_consonant",
                            $assesment->identify_blend_consonant ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][build_blend_consonant]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.build_blend_consonant",
                            $assesment->build_blend_consonant ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][read_blend_consonant_word]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.read_blend_consonant_word",
                            $assesment->read_blend_consonant_word ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][read_blend_consonant_phrase]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.read_blend_consonant_phrase",
                            $assesment->read_blend_consonant_phrase ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>


                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][read_blend_consonant_sentence]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.read_blend_consonant_sentence",
                            $assesment->read_blend_consonant_sentence ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][recognize_time]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_time",
                            $assesment->recognize_time ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

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
                    <select name="assessments[{{ $assesment->id }}][understand_tens]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.understand_tens",
                            $assesment->understand_tens ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][able_to_add_objects]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_add_objects",
                            $assesment->able_to_add_objects ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center ">
                    <select name="assessments[{{ $assesment->id }}][understand_units_and_tens]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.understand_units_and_tens",
                            $assesment->understand_units_and_tens ?? '') == $option)>
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

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][understand_odd_and_even_numbers]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.understand_odd_and_even_numbers",
                            $assesment->understand_odd_and_even_numbers ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][compare_tall_height]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.compare_tall_height",
                            $assesment->compare_tall_height ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][compare_short_height]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.compare_short_height",
                            $assesment->compare_short_height ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][able_to_subtract_objects]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_subtract_objects",
                            $assesment->able_to_subtract_objects ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][recognize_time_half_past]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_time_half_past",
                            $assesment->recognize_time_half_past ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][able_to_add_numbers]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_add_numbers",
                            $assesment->able_to_add_numbers ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][able_to_subtract_numbers]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_subtract_numbers",
                            $assesment->able_to_subtract_numbers ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][understand_hundreds]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.understand_hundreds",
                            $assesment->understand_hundreds ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][indo_writing_properly_in_the_line]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.indo_writing_properly_in_the_line",
                            $assesment->indo_writing_properly_in_the_line ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][indo_recognizing_letters]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.indo_recognizing_letters",
                            $assesment->indo_recognizing_letters ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][indo_recognizing_syllables]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.indo_recognizing_syllables",
                            $assesment->indo_recognizing_syllables ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][indo_reading_words]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.indo_reading_words",
                            $assesment->indo_reading_words ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][indo_reading_phrase]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.indo_reading_phrase",
                            $assesment->indo_reading_phrase ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][indo_reading_sentence]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.indo_reading_sentence",
                            $assesment->indo_reading_sentence ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][indo_reading_comprehension_story]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.indo_reading_comprehension_story",
                            $assesment->indo_reading_comprehension_story ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                {{-- mandarin --}}
                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][mandarin_reading]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.mandarin_reading",
                            $assesment->mandarin_reading ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][mandarin_writing]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.mandarin_writing",
                            $assesment->mandarin_writing ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][mandarin_listening]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.mandarin_listening",
                            $assesment->mandarin_listening ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][mandarin_speaking]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.mandarin_speaking",
                            $assesment->mandarin_speaking ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>


                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][mandarin_test]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.mandarin_test",
                            $assesment->mandarin_test ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                {{-- additional --}}
                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][audio_reading]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.audio_reading",
                            $assesment->audio_reading ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][spelling]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.spelling",
                            $assesment->spelling ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][computer]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.computer",
                            $assesment->computer ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][science]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.science",
                            $assesment->science ?? '') == $option)>
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
