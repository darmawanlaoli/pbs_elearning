<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th rowspan="2" style="min-width: 50px;">No</th>
                <th rowspan="2" style="min-width: 200px;">Student Name</th>
                <th rowspan="2" style="min-width: 500px;">Comment</th>
                <th colspan="4">Attendance</th>
                <th colspan="2">Extracurricular 1</th>
                <th colspan="2">Extracurricular 2</th>
                <th colspan="2">Extracurricular 3</th>
                <th colspan="2">Extracurricular 4</th>
            </tr>

            <tr class="text-center">
                {{-- ATTENANCE --}}
                <th>Present</th>
                <th>Excused</th>
                <th>Unexcused</th>
                <th>Tardy</th>

                {{-- club --}}
                <th>Club</th>
                <th>Grade</th>
                <th>Club</th>
                <th>Grade</th>
                <th>Club</th>
                <th>Grade</th>
                <th>Club</th>
                <th>Grade</th>

            </tr>

        </thead>

        <tbody>
            @foreach ($reportDataDetails as $ass)
                <tr data-student-id="{{ $ass->id }}">

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $ass->name }}</td>

                    <td>
                        <textarea style="width: 100%" name="students[{{ $ass->id }}][comment]" class="score-input comment-input"
                            cols="30" rows="5">{{ $ass->comment ?? '' }}</textarea>
                    </td>
                    <td>
                        <input type="number" value="{{ $ass->present ?? '' }}" class="score-input ct-input"
                            name="students[{{ $ass->id }}][present]" min="0" max="100" step="0.01">
                    </td>
                    <td>
                        <input type="number" value="{{ $ass->excused ?? '' }}" class="score-input ct-avg-input"
                            name="students[{{ $ass->id }}][excused]">
                    </td>

                    <td>
                        <input type="number" value="{{ $ass->unexcused ?? '' }}" class="score-input ku-input"
                            name="students[{{ $ass->id }}][unexcused]" min="0" max="100" step="0.01">
                    </td>

                    <td>
                        <input type="number" value="{{ $ass->tardy ?? '' }}" class="score-input ku-input"
                            name="students[{{ $ass->id }}][tardy]" min="0" max="100" step="0.01">
                    </td>

                    <td>
                        <select name="students[{{ $ass->id }}][club1]" class="score-input">
                            <option value="">Club</option>
                            @foreach ($clubs as $club)
                                <option value="{{ $club->name }}"
                                    {{ $ass->club1 == $club->name ? 'selected' : '' }}>{{ $club->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select name="students[{{ $ass->id }}][grade_club1]" class="score-input">
                            <option value="">Grade</option>
                            <option value="E" {{ $ass->grade_club1 == 'E' ? 'selected' : '' }}>E</option>
                            <option value="G" {{ $ass->grade_club1 == 'G' ? 'selected' : '' }}>G</option>
                            <option value="S" {{ $ass->grade_club1 == 'S' ? 'selected' : '' }}>S</option>
                            <option value="N" {{ $ass->grade_club1 == 'N' ? 'selected' : '' }}>N</option>
                        </select>
                    </td>

                    <td>
                        <select name="students[{{ $ass->id }}][club2]" class="score-input">
                            <option value="">Club</option>
                            @foreach ($clubs as $club)
                                <option value="{{ $club->name }}"
                                    {{ $ass->club2 == $club->name ? 'selected' : '' }}>{{ $club->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select name="students[{{ $ass->id }}][grade_club2]" class="score-input">
                            <option value="">Grade</option>
                            <option value="E" {{ $ass->grade_club2 == 'E' ? 'selected' : '' }}>E</option>
                            <option value="G" {{ $ass->grade_club2 == 'G' ? 'selected' : '' }}>G</option>
                            <option value="S" {{ $ass->grade_club2 == 'S' ? 'selected' : '' }}>S</option>
                            <option value="N" {{ $ass->grade_club2 == 'N' ? 'selected' : '' }}>N</option>
                        </select>
                    </td>

                    <td>
                        <select name="students[{{ $ass->id }}][club3]" class="score-input">
                            <option value="">Club</option>
                            @foreach ($clubs as $club)
                                <option value="{{ $club->name }}"
                                    {{ $ass->club3 == $club->name ? 'selected' : '' }}>{{ $club->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select name="students[{{ $ass->id }}][grade_club3]" class="score-input">
                            <option value="">Grade</option>
                            <option value="E" {{ $ass->grade_club3 == 'E' ? 'selected' : '' }}>E</option>
                            <option value="G" {{ $ass->grade_club3 == 'G' ? 'selected' : '' }}>G</option>
                            <option value="S" {{ $ass->grade_club3 == 'S' ? 'selected' : '' }}>S</option>
                            <option value="N" {{ $ass->grade_club3 == 'N' ? 'selected' : '' }}>N</option>
                        </select>
                    </td>

                    <td>
                        <select name="students[{{ $ass->id }}][club4]" class="score-input">
                            <option value="">Club</option>
                            @foreach ($clubs as $club)
                                <option value="{{ $club->name }}"
                                    {{ $ass->club4 == $club->name ? 'selected' : '' }}>{{ $club->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <select name="students[{{ $ass->id }}][grade_club4]" class="score-input">
                            <option value="">Grade</option>
                            <option value="E" {{ $ass->grade_club4 == 'E' ? 'selected' : '' }}>E</option>
                            <option value="G" {{ $ass->grade_club4 == 'G' ? 'selected' : '' }}>G</option>
                            <option value="S" {{ $ass->grade_club4 == 'S' ? 'selected' : '' }}>S</option>
                            <option value="N" {{ $ass->grade_club4 == 'N' ? 'selected' : '' }}>N</option>
                        </select>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
