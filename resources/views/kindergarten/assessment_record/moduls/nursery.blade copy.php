<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th class="frozen-col-1" style="min-width: 50px;">No</th>
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
                <td class="frozen-col-1">{{ $loop->iteration }}</td>
                <td class="frozen-col-2">{{ $assesment->name }}</td>
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
                    <select name="assessments[{{ $assesment->id }}][report_word]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.report_word",
                            $assesment->report_word ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][repeat_day_date_month_year]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.repeat_day_date_month_year",
                            $assesment->repeat_day_date_month_year ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][sing_song]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.sing_song",
                            $assesment->sing_song ?? '') == $option)>
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

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][inform_gender]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.inform_gender",
                            $assesment->inform_gender ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][inform_age]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.inform_age",
                            $assesment->inform_age ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][mention_day_date_month_year]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.mention_day_date_month_year",
                            $assesment->mention_day_date_month_year ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][name_body_parts]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.name_body_parts",
                            $assesment->name_body_parts ?? '') == $option)>
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
                    <select name="assessments[{{ $assesment->id }}][do_given_task_independetly]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.do_given_task_independetly",
                            $assesment->do_given_task_independetly ?? '') == $option)>
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

                {{-- test --}}
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

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][able_to_eat_independetly]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_eat_independetly",
                            $assesment->able_to_eat_independetly ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][hold_pencil_appropriately]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.hold_pencil_appropriately",
                            $assesment->hold_pencil_appropriately ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][stroke_pencil]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.stroke_pencil",
                            $assesment->stroke_pencil ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][color_picture]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.color_picture",
                            $assesment->color_picture ?? '') == $option)>
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
                    <select name="assessments[{{ $assesment->id }}][use_of_glue]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.use_of_glue",
                            $assesment->use_of_glue ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                {{-- test --}}

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
                    <select name="assessments[{{ $assesment->id }}][able_to_jump]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_jump",
                            $assesment->able_to_jump ?? '') == $option)>
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
                    <select name="assessments[{{ $assesment->id }}][trace_vertical_lines]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.trace_vertical_lines",
                            $assesment->trace_vertical_lines ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][trace_horizontal_lines]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.trace_horizontal_lines",
                            $assesment->trace_horizontal_lines ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                {{-- test --}}
                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][recognize_sound_of_i_l_t]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_sound_of_i_l_t",
                            $assesment->recognize_sound_of_i_l_t ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1 no-t1">
                </td>

                <td class="text-center no-t1 no-t1">
                </td>

                <td class="text-center no-t1">
                </td>


                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                    12
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][able_to_match_object]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.able_to_match_object",
                            $assesment->able_to_match_object ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][recognize_colors_red_yellow_blue]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_colors_red_yellow_blue",
                            $assesment->recognize_colors_red_yellow_blue ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center no-t1">
                </td>

                <td class="text-center">
                    <input type="text" name="assessments[{{ $assesment->id }}][additional_program_1]"
                        value="{{ $assesment->additional_program_1 }}">
                </td>


                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][additional_program_1_score]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.additional_program_1_score",
                            $assesment->additional_program_1_score ?? '') == $option)>
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
