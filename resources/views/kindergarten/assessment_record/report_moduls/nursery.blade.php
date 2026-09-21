<div class="page">

    <div class="row mb-5 mt-5">


        <h1 class="text-center fw-bold"> <img class="logo"
                src="https://elearning.peachblossomsschool.sch.id/assets/images/logos/logo.png" alt="">
            Student Data</h1>
    </div>

    <table class="cover-table">
        <thead>
            <tr class="tr">
                <td class="td" style="width: 210px">Registration Number</td>
                <td class="td" style="width: 5px">:</td>
                <td class="td">{{ $report->registration_number }}</td>
            </tr>

            <tr>
                <td>Name</td>
                <td>:</td>
                <td>{{ $report->name }}</td>
            </tr>

            <tr>
                <td>Gender</td>
                <td>:</td>
                <td>{{ $report->gender }}</td>
            </tr>

            <tr>
                <td>Date of Birth</td>
                <td>:</td>
                <td>{{ $report->date_of_birth }}</td>
            </tr>

            <tr>
                <td>Address</td>
                <td>:</td>
                <td>{{ $report->address }}</td>
            </tr>

            <tr>
                <td>Name of Parents</td>
                <td>:</td>
                <td>{{ $report->name_of_parents }}</td>
            </tr>
        </thead>
    </table>

    <table class="cover-table" style="margin-top: 100px; width: 100%; text-align: center;">
        <thead>
            <tr>
                <td style="width: 50%"></td>
                <td style="width: 50%">
                    <p style="margin-bottom: 100px;">Bekasi, {{ date('d F Y',
                        strtotime($report->first_day_of_school)) }}</p>
                    <b>Ambar Noviyanti, S.Pd</b>
                    <p>Principal</p>
                </td>
            </tr>
        </thead>
    </table>
</div>

{{-- halaman 1 --}}
<div class="page">

    <img style="margin: auto; display: block; width: 100px"
        src="https://elearning.peachblossomsschool.sch.id/assets/images/logos/logo.png" alt="">

    <p class="title">
        NATIONAL PLUS SCHOOL <br>
        <b>PROGRESS REPORT CARD - {{ $assessment->term }}</b> <br>
        <b>ACADEMIC YEAR {{ $assessment->academic_year }}</b>
    </p>

    <table class="mb-3">
        <thead class="thead">
            <tr>
                <td colspan="5" class="th-header">LANGUAGE SKILL</th>
            </tr>
            <tr class="text-center">
                <td rowspan="2" class="th-desc">DESCRIPTION</th>
                <td colspan="4">{{ $assessment->term }}</th>
            </tr>
            <tr class="text-center">
                <td>I</th>
                <td>G</th>
                <td>S</th>
                <td>E</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td class="fw-bold" colspan="5">EXPRESSIVE</td>
            </tr>

            <tr>
                <td class="th-desc">● Introduce name</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->introduce_name == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Greet teacher</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->greet_teacher == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● State willingness</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->state_willingness == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Repeat word</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->report_word == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Repeat day, date, month, year</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->repeat_day_date_month_year == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Sing songs</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->sing_songs == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Recite rhymes</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->recite_rhymes == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Inform gender</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">
                    {{ $report->inform_gender == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Inform age</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">
                    {{ $report->inform_age == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Mention day, date, month, year</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">
                    {{ $report->mention_day_date_month_year == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Name body parts</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">
                    {{ $report->name_body_parts == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td class="fw-bold" colspan="5">RECEPTIVE</td>
            </tr>

            <tr>
                <td>● Listen to teachers</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->listen_to_teacher == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Follow instruction</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->follow_instruction == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Respond to questions</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->respond_to_questions == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

        </tbody>
    </table>


    <table class="mb-3">
        <thead class="thead">
            <tr>
                <td colspan="5" class="th-header">MANNERS AND COURTESY</td>
            </tr>
            <tr class="text-center">
                <td rowspan="2" class="th-desc">DESCRIPTION</td>
                <td colspan="4">{{ $assessment->term }}</td>
            </tr>
            <tr class="text-center">
                <td>I</td>
                <td>G</td>
                <td>S</td>
                <td>E</td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="th-desc">● Respect teachers</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->respect_teachers == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Respect friends</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->respect_friends == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Speak politely to others</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->speak_politely_to_others == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Care to others</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->care_to_others == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Share with others</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->share_with_others == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Help others</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->help_others == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Obey teachers</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->obey_teachers == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

        </tbody>
    </table>

    <div class="footer">
        <span class="left">Page | 1</span>
        <span class="right">{{ $report->name.' - '.$report->class
            }}</span>
    </div>
</div>

{{-- halaman 2 --}}
<div class="page">

    <table class="mb-3">
        <thead class="thead">
            <tr>
                <th colspan="5" class="th-header">DAILY PERFORMANCE</th>
            </tr>
            <tr class="text-center">
                <th rowspan="2">DESCRIPTION</th>
                <th colspan="4">{{ $assessment->term }}</th>
            </tr>
            <tr class="text-center">
                <th>I</th>
                <th>G</th>
                <th>S</th>
                <th>E</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td class="th-desc">● Get along with classmates</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->get_along_with_classmates == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Give attention to the lesson</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->give_attention_to_the_lesson == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Do given task independently</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->do_given_task_independently == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Finish task as order</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->finish_task_as_order == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Willing to perform</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->willing_to_perform == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Willing to take turn</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->willing_to_take_turn == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Dress neatly</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->dress_neatly == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Neaten belonging</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->neaten_belonging == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Take care of school property</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->take_care_of_school_property == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Keep clean</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->keep_clean == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Enjoy doing art works</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->enjoy_doing_art_works == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Able to eat independently</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->able_to_eat_independetly == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

        </tbody>
    </table>

    <table class="mb-3">
        <thead class="thead">
            <tr>
                <th colspan="5" class="th-header">MOTOR SKILL</th>
            </tr>
            <tr class="text-center">
                <th rowspan="2">DESCRIPTION</th>
                <th colspan="4">{{ $assessment->term }}</th>
            </tr>
            <tr class="text-center">
                <th>I</th>
                <th>G</th>
                <th>S</th>
                <th>E</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <th colspan="5">FINE MOTOR</th>
            </tr>
            <tr>
                <td class="th-desc">● Hold pencil appropriately</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->hold_pencil_appropriately == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Stroke pencil</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">
                    {{ $report->stroke_pencil == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Color picture</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->color_picture == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Use paint brush</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->use_paint_brush == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Use of glue</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->use_of_glue == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Paste paper</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->paste_paper == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <th colspan="5">GROSS MOTOR</th>
            </tr>

            <tr>
                <td>● Able to catch with both hands</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->able_to_catch == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Able to throw</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->able_to_throw == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Able to jump</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->able_to_jump == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Able to balance while running</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->able_to_balance_while_running == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Able to balance on plank</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->able_to_balance_on_plank == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Able to follow movements</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->able_to_follow_movements == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Participate in games</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->participate_in_games == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

        </tbody>

    </table>

    <div class="footer">
        <span class="left">Page | 2</span>
        <span class="right">{{ $report->name.' - '.$report->class
            }}</span>
    </div>
</div>

{{-- halaman 3 --}}
<div class="page">

    <table class="mb-3">
        <thead class="thead">
            <tr>
                <th colspan="5" class="th-header">PRE-LITERACY</th>
            </tr>
            <tr class="text-center">
                <th rowspan="2">DESCRIPTION</th>
                <th colspan="4">{{ $assessment->term }}</th>
            </tr>
            <tr class="text-center">
                <th>I</th>
                <th>G</th>
                <th>S</th>
                <th>E</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td class="th-desc">● Trace vertical lines</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->trace_vertical_lines == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Trace horizontal lines</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Recognize sound of i, l, t</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Recognize shape of i, l, t</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Trace alphabets i, l, t</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Trace wiggle lines</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Recognize sound of r, n, m</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Recognize shape of r, n, m</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Trace alphabets r, n, m</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Trace shapes</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Recognize sound of c, a, d</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Recognize shape of c, a, d</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Trace alphabets c, a, d</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

        </tbody>
    </table>

    <table class="mb-3">
        <thead class="thead">
            <tr>
                <th colspan="5" class="th-header">MATHEMATICS</th>
            </tr>
            <tr class="text-center">
                <th rowspan="2">DESCRIPTION</th>
                <th colspan="4">{{ $assessment->term }}</th>
            </tr>
            <tr class="text-center">
                <th>I</th>
                <th>G</th>
                <th>S</th>
                <th>E</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="th-desc">● Able to match object or picture</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->able_to_match_object == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Recognize colors red, yellow, blue</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->recognize_colors_red_yellow_blue == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Recognize shapes circle, triangle, square</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Discriminate big and small</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Understand quantity concept</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Identify number 1-2</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Understand quantity 1-2</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Able to pattern object or picture</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Identify number 3-5</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

            <tr>
                <td>● Understand quantity 3-5</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center {{ $isDisabledT1 }}">

                </td>
                @endforeach
            </tr>

        </tbody>


    </table>

    <div class="footer">
        <span class="left">Page | 3</span>
        <span class="right">{{ $report->name.' - '.$report->class
            }}</span>
    </div>
</div>

{{-- halaman 4 --}}
<div class="page">
    <table class="mb-3">
        <thead class="thead">
            <tr>
                <th colspan="5" class="th-header">ADDITIONAL PROGRAM</th>
            </tr>
            <tr class="text-center">
                <th rowspan="2" class="th-desc">DESCRIPTION</th>
                <th colspan="4">{{ $assessment->term }}</th>
            </tr>
            <tr class="text-center">
                <th>I</th>
                <th>G</th>
                <th>S</th>
                <th>E</th>
            </tr>
        </thead>

        <tbody>



            <tr>
                <td>● {{ $report->additional_program_1 }}</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->additional_program_1_score == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● {{ $report->additional_program_2 }}</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->additional_program_2_score == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

            <tr>
                <td>● {{ $report->additional_program_3 }}</td>
                @foreach(['I', 'G', 'S', 'E'] as $code)
                <td class="text-center">
                    {{ $report->additional_program_3_score == $code ? 'X' : '' }}
                </td>
                @endforeach
            </tr>

        </tbody>
    </table>

    <table class="mb-3">
        <thead>
            <tr>
                <th colspan="5" class="th-header">ATTENDANCE</th>
            </tr>
            <tr>
                <th class="th-desc">DESCRIPTION</th>
                <th colspan="4" class="text-center">{{ $assessment->term }}</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="th-desc">● Presence</td>
                <td class="text-center">
                    {{ $report->presence . ' days' }}
                </td>
            </tr>

            <tr>
                <td>● Absence</td>
                <td class="text-center">
                    {{ $report->absence . ' days' }}
                </td>
            </tr>

        </tbody>
    </table>

    <div class="footer">
        <span class="left">Page | 4</span>
        <span class="right">{{ $report->name.' - '.$report->class
            }}</span>
    </div>

</div>

{{-- halaman 5 --}}
<div class="page">

    <table class="mb-3 table">
        <thead class="thead">
            <tr>
                <th colspan="5" class="th-header">{{ $assessment->term }}</th>
            </tr>

        </thead>

        <tbody>

            <tr>
                <th colspan="5">Teacher's Comment</th>
            </tr>

            <tr>
                <td
                    style="text-align: justify; white-space: normal; word-wrap: break-word; overflow-wrap: break-word;">
                    {{ $report->comment }}
                </td>
            </tr>
        </tbody>
    </table>


    <div class="signature-row">

        <!-- Kolom 2: Kepala Sekolah (Tengah) -->
        <div class="signature-box">
            <p>Acknowledged by,</p>
            <div class="signature-space"></div>
            <p class="signature-name">Ambar Noviyanti, S.Pd</p>
            <p class="signature-nip">Principal</p>
        </div>

        <!-- Kolom 1: Wali Kelas (Kiri) -->
        <div class="signature-box">
            <p>&nbsp;</p> <!-- Space penyeimbang agar sejajar dengan tanggal -->
            <p></p>
            <div class="signature-space"></div>
            <p class="signature-name">{{ $report->teachers }}</p>
            <p class="signature-nip">Teacher</p>
        </div>



        <!-- Kolom 3: Orang Tua / Wali (Kanan) -->
        <div class="signature-box">
            <p>Bekasi, {{ date('d F Y', strtotime($report->distribution_date)) }}</p>
            <div class="signature-space"></div>
            <p class="signature-name">( .................................... )</p>
            <p class="signature-nip">Parent</p>
        </div>

    </div>

    <div class="footer">
        <span class="left">Page | 5</span>
        <span class="right">{{ $report->name.' - '.$report->class
            }}</span>
    </div>
</div>
