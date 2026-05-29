<table>

    <thead>

        <tr>

            <th rowspan="3">NO</th>
            <th rowspan="3">NAME</th>

            @foreach($subjects as $subject => $components)

            <th colspan="{{ count($components) * 3 }}">

                {{ $subject }}

            </th>

            @endforeach

        </tr>



        <tr>

            @foreach($subjects as $subject => $components)

            @foreach($components as $component => $fields)

            <th colspan="3">

                {{ $component }}

            </th>

            @endforeach

            @endforeach

        </tr>



        <tr>

            @foreach($subjects as $subject => $components)

            @foreach($components as $component => $fields)

            @if($semester == 1)

            <th>T1</th>
            <th>T2</th>

            @else

            <th>T3</th>
            <th>T4</th>

            @endif

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

            @foreach($components as $component => $fields)

            @if($semester == 1)

            <td>
                {{ $student[$subject][$component]['TERM 1'] ?? '-' }}
            </td>

            <td>
                {{ $student[$subject][$component]['TERM 2'] ?? '-' }}
            </td>

            @else

            <td>
                {{ $student[$subject][$component]['TERM 3'] ?? '-' }}
            </td>

            <td>
                {{ $student[$subject][$component]['TERM 4'] ?? '-' }}
            </td>

            @endif



            <td>
                {{ $student[$subject][$component]['AVG'] ?? '-' }}
            </td>

            @endforeach

            @endforeach

        </tr>

        @endforeach

    </tbody>

</table>
