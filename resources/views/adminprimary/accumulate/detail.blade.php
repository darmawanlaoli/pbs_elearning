<!DOCTYPE html>
<html>

<head>
    <title>Student Recap</title>

    <style>
        *{
            font-family: calibri;
        }
        .table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        .th,
        .td {
            border: 1px solid #000;
            padding: 10px;
        }

        .th {
            background: #f2f2f2;
        }

        .btn-excel {
            background-color: #107c41;
            border: none;
            color: white;
            padding: 8px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .mb-2{
            margin-bottom: 10px;
        }

        .mt-2{
        margin-top: 10px;
        }
    </style>`
</head>

<body>

    <h2>Student Assessment Recap</h2>

    <table style="text-align: left">
        <tr>
            <th>Semester</th>
            <th>: {{ $semester }}</th>
        </tr>

        <tr>
            <th>Class</th>
            <th>: {{ $class }}</th>
        </tr>
    </table>

    <form
        action="{{ route('admin_primary.accumulate.download', ['class' => $class, 'semester' => $semester]) }}"
        method="POST">
        @csrf
        @method('POST')
        <button class="btn-excel mt-2 mb-2" tabindex="0" data-bs-toggle="tooltip" title="Approve" class="border-0 text-white btn btn-primary"><i
                class="ti ti-eye"></i> Download Excel</button>
    </form>

    <table border="1" class="table" cellpadding="8">

        <thead>

            <tr>

                <th class="th" rowspan="3">NO</th>
                <th class="th" rowspan="3">NAMA</th>

                @foreach($subjects as $subject => $components)

                <th class="th" colspan="{{ count($components) * 3 }}">

                    {{ $subject }}

                </th>

                @endforeach

            </tr>



            <!-- ROW 2 -->

            <tr>

                @foreach($subjects as $subject => $components)

                @foreach($components as $label => $field)

                <th class="th" colspan="3">

                    {{ $label }}

                </th>

                @endforeach

                @endforeach

            </tr>



            <!-- ROW 3 -->

            <tr>

                @foreach($subjects as $subject => $components)

                @foreach($components as $label => $field)
                @if ($semester == 1)
                    <th class="th">T1</th>
                    <th class="th">T2</th>
                @else
                    <th class="th">T3</th>
                    <th class="th">T4</th>
                @endif

                <th class="th">AVG</th>

                @endforeach

                @endforeach

            </tr>

        </thead>



        <tbody>

            @foreach($students as $student)

            <tr>

                <td class="td">{{ $loop->iteration }}</td>

                <td class="td">{{ $student['name'] }}</td>



                @foreach($subjects as $subject => $components)

                @foreach($components as $label => $field)

                @if ($semester == 1)
                    <td>
                        {{ $student[$subject][$label]['TERM 1'] ?? '-' }}
                    </td>

                    <td>
                        {{ $student[$subject][$label]['TERM 2'] ?? '-' }}
                    </td>
                @else
                    <td>
                        {{ $student[$subject][$label]['TERM 3'] ?? '-' }}
                    </td>

                    <td>
                        {{ $student[$subject][$label]['TERM 4'] ?? '-' }}
                    </td>
                @endif



                <td>
                    {{ $student[$subject][$label]['AVG'] ?? '-' }}
                </td>

                @endforeach

                @endforeach

            </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>
