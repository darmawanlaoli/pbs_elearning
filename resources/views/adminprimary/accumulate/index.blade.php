<!DOCTYPE html>
<html>

<head>
    <title>Student Recap</title>

    <style>
        *{
            font-family: calibri;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 10px;
        }

        th {
            background: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Student Assessment Recap</h2>

    <table border="1" cellpadding="8">

        <thead>

            <!-- ROW 1 -->

            <tr>

                <th rowspan="3">NO</th>
                <th rowspan="3">NAMA</th>

                @foreach($subjects as $subject => $components)

                <th colspan="{{ count($components) * 3 }}">

                    {{ $subject }}

                </th>

                @endforeach

            </tr>



            <!-- ROW 2 -->

            <tr>

                @foreach($subjects as $subject => $components)

                @foreach($components as $label => $field)

                <th colspan="3">

                    {{ $label }}

                </th>

                @endforeach

                @endforeach

            </tr>



            <!-- ROW 3 -->

            <tr>

                @foreach($subjects as $subject => $components)

                @foreach($components as $label => $field)

                <th>T1</th>
                <th>T2</th>
                <th>AVG</th>

                @endforeach

                @endforeach

            </tr>

        </thead>



        <tbody>

            @foreach($students as $student)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $student['name'] }}</td>



                @foreach($subjects as $subject => $components)

                @foreach($components as $label => $field)

                <td>
                    {{ $student[$subject][$label]['TERM 1'] ?? '-' }}
                </td>

                <td>
                    {{ $student[$subject][$label]['TERM 2'] ?? '-' }}
                </td>

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
