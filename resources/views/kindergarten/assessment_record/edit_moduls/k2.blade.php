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
                        'Ask questions' => 'ask_question',
                        'Involve in conversation' => 'involve_in_conversation',
                        'State willingness' => 'state_willingness',
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
                        'Do given task independently' => 'do_given_task_independently',
                        'Finish task as order' => 'finish_task_as_order',
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
                        'Color picture in designated area' => 'color_picture_in_designated_area',
                        'Use paint brush' => 'use_paint_brush',
                        'Paste paper' => 'paste_paper',
                        'Draw shape' => 'draw_shape',
                        'Fold paper' => 'fold_paper',
                        'Cut paper using scissors' => 'cut_paper_using_scissors',
                        'Able to catch' => 'able_to_catch',
                        'Able to throw' => 'able_to_throw',
                        'Able to hop' => 'able_to_hop',
                        'Able to walk with bean bag' => 'able_to_walk_with_bean_bag',
                        'Able to balance while running' => 'able_to_balance_while_running',
                        'Able to balance on plank' => 'able_to_balance_on_plank',
                        'Able to follow movements' => 'able_to_follow_movements',
                        'Participate in games' => 'participate_in_games',
                        ],

                        'LITERACY' => [
                        'Copy Words' => 'copy_words',
                        'Write 3 letters word' => 'write_3_letters',
                        // 'Write blend consonant word' => 'write_blend_consonant',
                        'Build 3 letters word' => 'build_3_letters',
                        'Read 3 letters word' => 'read_3_letters',
                        'Read 3 letters word phrase' => 'build_3_letters_word_phrase',
                        'Read 3 letters word sentence' => 'build_3_letters_word_sentence',
                        // 'Identify blend consonant sound' => 'identify_blend_consonant',
                        // 'Build blend consonant word' => 'build_blend_consonant',
                        // 'Read blend consonant word' => 'read_blend_consonant_word',
                        // 'Read blend consonant phrase' => 'read_blend_consonant_phrase',
                        // 'Read blend consonant sentence' => 'read_blend_consonant_sentence',
                        ],

                        'MATHEMATICS' => [
                        'Recognize time (o’clock)' => 'recognize_time',
                        'Master quantity 0-10' => 'master_quantity_0_10',
                        'Understand tens' => 'understand_tens',
                        'Understand units and tens' => 'understand_units_and_tens',
                        'Able to add objects' => 'able_to_add_objects',
                        'Sequence numbers' => 'sequence_numbers',
                        // 'Understand odd and even numbers' => 'understand_odd_and_even_numbers',
                        // 'Compare tall height' => 'compare_tall_height',
                        // 'Compare short height' => 'compare_short_height',
                        // 'Able to subtract objects' => 'able_to_subtract_objects',
                        // 'Recognize time (half past)' => 'recognize_time_half_past',
                        // 'Able to add numbers' => 'able_to_add_numbers',
                        // 'Able to subtract numbers' => 'able_to_subtract_numbers',
                        // 'Understand hundreds' => 'understand_hundreds',
                        ],

                        'BAHASA INDONESIA' => [
                        'Writing properly in the line' => 'indo_writing_properly_in_the_line',
                        'Recognizing letters' => 'indo_recognizing_letters',
                        'Recognizing syllables' => 'indo_recognizing_syllables',
                        'Reading words' => 'indo_reading_words',
                        // 'Reading phrase' => 'indo_reading_phrase',
                        // 'Reading sentence' => 'indo_reading_sentence',
                        // 'Reading comprehension story' => 'indo_reading_comprehension_story',
                        ],

                        'MANDARIN' => [
                        '阅读 Reading' => 'mandarin_reading',
                        '书写 Writing' => 'mandarin_writing',
                        '听力 Listening' => 'mandarin_listening',
                        '说话 Speaking' => 'mandarin_speaking',
                        '测验 Test' => 'mandarin_test',
                        ],

                        'ADDITIONAL ASSESSMENT' => [
                        'Audio Reading' => 'audio_reading',
                        'Spelling' => 'spelling',
                        'Computer' => 'computer',
                        'Science' => 'science',
                        ],
                        ];
                        @endphp


                        <table class="table table-bordered">

                            <tr class="bg-primary text-white">
                                <th>Description</th>
                                <th>Score</th>
                            </tr>

                            @foreach($sections as $sectionName => $fields)

                            {{-- Section Header --}}
                            <tr class="bg-success text-white">
                                <th colspan="2">
                                    {{ $sectionName }}
                                </th>
                            </tr>

                            @foreach($fields as $label => $field)

                            <tr>
                                <th>{{ $label }}</th>

                                <td>
                                    <select name="{{ $field }}" class="form-select">
                                        @foreach($options as $option)
                                        <option value="{{ $option }}" @selected( old( $field, $assessment->{$field} ?? ''
                                            ) == $option
                                            )>
                                            {{ $option }}
                                        </option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            @endforeach

                            @endforeach

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
