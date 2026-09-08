<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th rowspan="2" style="min-width: 50px;">No</th>
                <th rowspan="2" style="min-width: 180px;">Student Name</th>

                <th colspan="3">Geography</th>
                <th rowspan="2">Management <br> Skill</th>
                <th rowspan="2">Active <br> Participation</th>
                <th rowspan="2">Social <br> Responsibility</th>

                <th colspan="3">History</th>
                <th rowspan="2">Management <br> Skill</th>
                <th rowspan="2">Active <br> Participation</th>
                <th rowspan="2">Social <br> Responsibility</th>

                <th colspan="3">Science</th>
                <th rowspan="2">Management <br> Skill</th>
                <th rowspan="2">Active <br> Participation</th>
                <th rowspan="2">Social <br> Responsibility</th>

                <th colspan="3">Technology</th>
                <th rowspan="2">Management <br> Skill</th>
                <th rowspan="2">Active <br> Participation</th>
                <th rowspan="2">Social <br> Responsibility</th>
            </tr>

            <tr class="text-center">
                {{-- geo --}}
                <th>Score <br> 95%</th>
                <th>Att 5%</th>
                <th>Total</th>

                {{-- history --}}
                <th>Score <br> 95%</th>
                <th>Att 5%</th>
                <th>Total</th>

                {{-- science --}}
                <th>Score <br> 95%</th>
                <th>Att 5%</th>
                <th>Total</th>

                {{-- technology --}}
                <th>Score <br> 95%</th>
                <th>Att 5%</th>
                <th>Total</th>
            </tr>

        </thead>

        <tbody>
            @foreach($assessments as $ass)
            <tr data-student-id="{{ $ass->id }}">

                <td>{{ $loop->iteration }}</td>

                <td>{{ $ass->name }}</td>

                {{-- KU --}}
                <td>
                    <input type="number" value="{{ $ass->ku1 ?? '' }}" class="score-input ku-input"
                        name="students[{{ $ass->id }}][ku1]" min="0" max="100" step="0.01">
                </td>

                <td>
                    <input type="number" value="{{ $ass->ku2 ?? '' }}" class="score-input ku-input"
                        name="students[{{ $ass->id }}][ku2]" min="0" max="100" step="0.01">
                </td>

                <td>
                    <input type="number" value="{{ $ass->ku3 ?? '' }}" class="score-input ku-input"
                        name="students[{{ $ass->id }}][ku3]" min="0" max="100" step="0.01">
                </td>

                <td>
                    <input type="number" value="{{ $ass->ku4 ?? '' }}" class="score-input ku-input"
                        name="students[{{ $ass->id }}][ku4]" min="0" max="100" step="0.01">
                </td>

                <td>
                    <input type="number" value="{{ $ass->ku_avg ?? '' }}" class="score-input avg-input"
                        name="students[{{ $ass->id }}][ku_avg]" readonly>
                </td>

                <td>
                    <input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input ku-att-input"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01">
                </td>

                <td class="total">
                    <input type="number" value="{{ $ass->ku_total ?? '' }}" class="score-input ku-final-input"
                        name="students[{{ $ass->id }}][ku_total]" readonly>
                </td>


                {{-- DK --}}
                <td>
                    <input type="number" value="{{ $ass->dk1 ?? '' }}" class="score-input dk-input"
                        name="students[{{ $ass->id }}][dk1]" min="0" max="100" step="0.01">
                </td>

                <td>
                    <input type="number" value="{{ $ass->dk_avg ?? '' }}" class="score-input dk-avg-input"
                        name="students[{{ $ass->id }}][dk_avg]" readonly>
                </td>

                <td>
                    <input type="number" value="{{ $ass->dk_att ?? '' }}" class="score-input dk-att-input"
                        name="students[{{ $ass->id }}][dk_att]" min="0" max="5" step="0.01">
                </td>

                <td class="total">
                    <input type="number" value="{{ $ass->dk_total ?? '' }}" class="score-input dk-final-input"
                        name="students[{{ $ass->id }}][dk_total]" readonly>
                </td>

                <td>
                    <select name="students[{{ $ass->id }}][management_skill]" class="score-input">
                        <option value="">Pilih</option>
                        <option value="A" {{ $ass->management_skill == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $ass->management_skill == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ $ass->management_skill == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ $ass->management_skill == 'D' ? 'selected' : '' }}>D</option>
                    </select>
                </td>

                <td>
                    <select name="students[{{ $ass->id }}][active_participation]" class="score-input">
                        <option value="">Pilih</option>
                        <option value="A" {{ $ass->active_participation == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $ass->active_participation == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ $ass->active_participation == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ $ass->active_participation == 'D' ? 'selected' : '' }}>D</option>
                    </select>
                </td>

                <td>
                    <select name="students[{{ $ass->id }}][social_responsibility]" class="score-input">
                        <option value="">Pilih</option>
                        <option value="A" {{ $ass->social_responsibility == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ $ass->social_responsibility == 'B' ? 'selected' : '' }}>B</option>
                        <option value="C" {{ $ass->social_responsibility == 'C' ? 'selected' : '' }}>C</option>
                        <option value="D" {{ $ass->social_responsibility == 'D' ? 'selected' : '' }}>D</option>
                    </select>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
