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

    <table class="table table-striped table-bordered">
        <tr class="text-center">
            <th>No</th>
            <th>Class</th>
            <th>Homeroom</th>
            <th>Semester I</th>
            <th>Semester II</th>
        </tr>

        @foreach ($classes as $class)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $class->homeroom_class }}</td>
            <td>{{ $class->name }}</td>
            <td class="text-center">
                <form id="deleteForm-{{ $class->id }}" action="{{ route('admin_primary.accumulate.detail', ['class' => $class->homeroom_class, 'semester' => 1]) }}"
                    method="POST">
                    @csrf
                    @method('POST')
                    <button tabindex="0" data-bs-toggle="tooltip" title="Approve"
                        class="border-0 text-white btn btn-primary"><i class="ti ti-eye"></i> Show</button>
                </form>

            </td>

            <td class="text-center">
                <form id="deleteForm-{{ $class->id }}" action="{{ route('admin_primary.accumulate.detail', ['class' => $class->homeroom_class, 'semester' => 2]) }}" method="POST">
                    @csrf
                    @method('POST')
                    <button tabindex="0" data-bs-toggle="tooltip" title="Approve" class="border-0 text-white btn btn-primary"><i
                            class="ti ti-eye"></i> Show</button>
                </form>

            </td>
        </tr>
        @endforeach
    </table>

</body>

</html>
