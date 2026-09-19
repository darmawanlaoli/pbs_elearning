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
                    <select name="assessments[{{ $assesment->id }}][hold_pencil_appropriately]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.hold_pencil_appropriately",
                            $assesment->hold_pencil_appropriately ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
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

                {{-- test --}}

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

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][trace_horizontal_lines]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.trace_horizontal_lines",
                            $assesment->trace_horizontal_lines ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][trace_diagonal_lines]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.trace_diagonal_lines",
                            $assesment->trace_diagonal_lines ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][trace_curve_lines]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.trace_curve_lines",
                            $assesment->trace_curve_lines ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][trace_shapes]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.trace_shapes",
                            $assesment->trace_shapes ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                {{-- test --}}
                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][recognize_sound_of_i_l_t_f_k]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_sound_of_i_l_t_f_k",
                            $assesment->recognize_sound_of_i_l_t_f_k ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][recognize_shape_of_i_l_t_f_k]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_shape_of_i_l_t_f_k",
                            $assesment->recognize_shape_of_i_l_t_f_k ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][trace_alphabets_of_i_l_t_f_k]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.trace_alphabets_of_i_l_t_f_k",
                            $assesment->trace_alphabets_of_i_l_t_f_k ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][recognize_sound_of_r_n_m_c_a_d_g]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_sound_of_r_n_m_c_a_d_g",
                            $assesment->recognize_sound_of_r_n_m_c_a_d_g ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][recognize_shape_of_r_n_m_c_a_d_g]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_shape_of_r_n_m_c_a_d_g",
                            $assesment->recognize_shape_of_r_n_m_c_a_d_g ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][trace_alphabets_r_n_m_c_a_d_g]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.trace_alphabets_r_n_m_c_a_d_g",
                            $assesment->trace_alphabets_r_n_m_c_a_d_g ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>


                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][recognize_sound_of_h_b_p_e_o_q_s]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_sound_of_h_b_p_e_o_q_s",
                            $assesment->recognize_sound_of_h_b_p_e_o_q_s ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][recognize_shape_of_h_b_p_e_o_q_s]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_shape_of_h_b_p_e_o_q_s",
                            $assesment->recognize_shape_of_h_b_p_e_o_q_s ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][trace_alphabets_h_b_p_e_o_q_s]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.trace_alphabets_h_b_p_e_o_q_s",
                            $assesment->trace_alphabets_h_b_p_e_o_q_s ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][recognize_sound_of_u_y_j_v_w_x_z]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_sound_of_u_y_j_v_w_x_z",
                            $assesment->recognize_sound_of_u_y_j_v_w_x_z ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][recognize_shape_of_u_y_j_v_w_x_z]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_shape_of_u_y_j_v_w_x_z",
                            $assesment->recognize_shape_of_u_y_j_v_w_x_z ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][trace_alphabets_u_y_j_v_w_x_z]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.trace_alphabets_u_y_j_v_w_x_z",
                            $assesment->trace_alphabets_u_y_j_v_w_x_z ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][identify_colors_red_blue_yellow]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.identify_colors_red_blue_yellow",
                            $assesment->identify_colors_red_blue_yellow ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][recognize_colors_green_orange_purple]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_colors_green_orange_purple",
                            $assesment->recognize_colors_green_orange_purple ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][identify_number_0_5]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.identify_number_0_5",
                            $assesment->identify_number_0_5 ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center">
                    <select name="assessments[{{ $assesment->id }}][understand_quantity_0_5]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.understand_quantity_0_5",
                            $assesment->understand_quantity_0_5 ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][identify_shapes_square_circle_triangle]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.identify_shapes_square_circle_triangle",
                            $assesment->identify_shapes_square_circle_triangle ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][discriminate_long_and_short]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.discriminate_long_and_short",
                            $assesment->discriminate_long_and_short ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][identify_number_6_9]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.identify_number_6_9",
                            $assesment->identify_number_6_9 ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][understand_quantity_6_9]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.understand_quantity_6_9",
                            $assesment->understand_quantity_6_9 ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][recognize_shapes_rectangle_diamond_oval]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_shapes_rectangle_diamond_oval",
                            $assesment->recognize_shapes_rectangle_diamond_oval ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][identify_number_10_12]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.identify_number_10_12",
                            $assesment->identify_number_10_12 ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][understand_quantity_10_12]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.understand_quantity_10_12",
                            $assesment->understand_quantity_10_12 ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][recognize_colors_black_white_brown_pink]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.recognize_colors_black_white_brown_pink",
                            $assesment->recognize_colors_black_white_brown_pink ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][identify_number_13_15]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.identify_number_13_15",
                            $assesment->identify_number_13_15 ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
                </td>

                <td class="text-center no-t1">
                    <select name="assessments[{{ $assesment->id }}][understand_quantity_13_15]">
                        @foreach(['', 'I', 'G', 'S', 'E'] as $option)
                        <option value="{{ $option }}" @selected(old("assessments.{$assesment->id}.understand_quantity_13_15",
                            $assesment->understand_quantity_13_15 ?? '') == $option)>
                            {{ $option }}
                        </option>
                        @endforeach
                    </select>
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
