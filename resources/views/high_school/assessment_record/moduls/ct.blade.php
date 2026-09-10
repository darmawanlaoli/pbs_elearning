<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th rowspan="2" style="min-width: 50px;">No</th>
                <th rowspan="2" style="min-width: 180px;">Student Name</th>
                <th colspan="2">Chapter Test</th>
                <th colspan="9">Knowledge and Understanding</th>
                <th colspan="4">Demonstrate Knowledge</th>
                <th rowspan="2">Management <br> Skill</th>
                <th rowspan="2">Active <br> Participation</th>
                <th rowspan="2">Social <br> Responsibility</th>
            </tr>
            <tr class="text-center">
                {{-- chapter test --}}
                <th>1</th>
                <th>AVG X 60%</th>
                {{-- knowledge --}}
                <th>Exercise 1</th>
                <th>Exercise 2</th>
                <th>Exercise 3</th>
                <th>AVG X 25%</th>
                {{-- homework --}}
                <th>HW 1</th>
                <th>HW 2</th>
                <th>AVG X 10%</th>
                <th>Att 5%</th>
                <th>Final <br> Score</th>
                {{-- demonstrate knowledge --}}
                <th>1</th>
                <th>AVG X 95%</th>
                <th>Att 5%</th>
                <th>Final <br> Score</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assessments as $ass)
            <tr data-student-id="{{ $ass->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ass->name }}</td>

                {{-- Chapter Test --}}
                <td>
                    <input type="number" value="{{ $ass->ct ?? '' }}" class="score-input ct-input"
                        name="students[{{ $ass->id }}][ct]" min="0" max="100" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->avg_ct ?? '' }}" class="score-input ct-avg-input"
                        name="students[{{ $ass->id }}][avg_ct]" readonly>
                </td>

                {{-- KU (Knowledge & Understanding) --}}
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
                    <!-- Class diubah menjadi ku-avg-input -->
                    <input type="number" value="{{ $ass->ku_avg ?? '' }}" class="score-input ku-avg-input"
                        name="students[{{ $ass->id }}][ku_avg]" readonly>
                </td>

                {{-- HW (Homework) --}}
                <td>
                    <!-- Class diubah menjadi hw-input -->
                    <input type="number" value="{{ $ass->hw1 ?? '' }}" class="score-input hw-input"
                        name="students[{{ $ass->id }}][hw1]" min="0" max="100" step="0.01">
                </td>
                <td>
                    <!-- Class diubah menjadi hw-input -->
                    <input type="number" value="{{ $ass->hw2 ?? '' }}" class="score-input hw-input"
                        name="students[{{ $ass->id }}][hw2]" min="0" max="100" step="0.01">
                </td>
                <td>
                    <!-- Class diubah menjadi hw-avg-input -->
                    <input type="number" value="{{ $ass->hw_avg ?? '' }}" class="score-input hw-avg-input"
                        name="students[{{ $ass->id }}][hw_avg]" readonly>
                </td>
                <td>
                    <input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input ku-att-input"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01">
                </td>

                {{-- Penjumlahan: avg_ct + ku_avg + hw_avg + att --}}
                <td class="total">
                    <input type="number" value="{{ $ass->ku_total ?? '' }}" class="score-input ku-final-input"
                        name="students[{{ $ass->id }}][ku_total]" readonly>
                </td>

                {{-- DK (Demonstrate Knowledge) --}}
                <td>
                    <input type="number" value="{{ $ass->dk1 ?? '' }}" class="score-input dk-input"
                        name="students[{{ $ass->id }}][dk1]" min="0" max="100" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->dk_avg ?? '' }}" class="score-input dk-avg-input"
                        name="students[{{ $ass->id }}][dk_avg]" readonly>
                </td>
                <td>
                    <input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input dk-att-input"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01">
                </td>
                <td class="total">
                    <input type="number" value="{{ $ass->dk_total ?? '' }}" class="score-input dk-final-input"
                        name="students[{{ $ass->id }}][dk_total]" readonly>
                </td>

                {{-- Others --}}
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            // === Element Definitions ===
            const ctInput = row.querySelector('.ct-input');
            const ctAvgInput = row.querySelector('.ct-avg-input');

            const kuInputs = row.querySelectorAll('.ku-input');
            const kuAvgInput = row.querySelector('.ku-avg-input');

            const hwInputs = row.querySelectorAll('.hw-input');
            const hwAvgInput = row.querySelector('.hw-avg-input');

            const kuAttInput = row.querySelector('.ku-att-input');
            const kuFinalInput = row.querySelector('.ku-final-input');

            const dkInputs = row.querySelectorAll('.dk-input');
            const dkAvgInput = row.querySelector('.dk-avg-input');
            const dkAttInput = row.querySelector('.dk-att-input');
            const dkFinalInput = row.querySelector('.dk-final-input');

            // === Hitung Knowledge & Understanding (CT + KU + HW + Att) ===
            function calculateKUSection() {
                // 1. Chapter Test (60%)
                let ctVal = parseFloat(ctInput.value);
                let ctAvg = 0;
                if (!isNaN(ctVal)) {
                    ctAvg = ctVal * 0.60;
                    ctAvgInput.value = ctAvg.toFixed(0);
                } else {
                    ctAvgInput.value = '';
                }

                // 2. Exercise / KU (25%)
                let kuTotal = 0, kuCount = 0;
                kuInputs.forEach(input => {
                    const value = parseFloat(input.value);
                    if (!isNaN(value)) { kuTotal += value; kuCount++; }
                });
                let kuAvg = 0;
                if (kuCount > 0) {
                    kuAvg = (kuTotal / kuCount) * 0.25;
                    kuAvgInput.value = kuAvg.toFixed(0);
                } else {
                    kuAvgInput.value = '';
                }

                // 3. Homework / HW (10%)
                let hwTotal = 0, hwCount = 0;
                hwInputs.forEach(input => {
                    const value = parseFloat(input.value);
                    if (!isNaN(value)) { hwTotal += value; hwCount++; }
                });
                let hwAvg = 0;
                if (hwCount > 0) {
                    hwAvg = (hwTotal / hwCount) * 0.10;
                    hwAvgInput.value = hwAvg.toFixed(0);
                } else {
                    hwAvgInput.value = '';
                }

                // 4. Validasi Attendance KU
                let att = parseFloat(kuAttInput.value);
                if (isNaN(att)) att = 0;
                if (att > 5) { att = 5; kuAttInput.value = 5; }
                if (att < 0) { att = 0; kuAttInput.value = 0; }

                // 5. Final Score (CT 60% + KU 25% + HW 10% + Att)
                if (!isNaN(ctVal) || kuCount > 0 || hwCount > 0 || kuAttInput.value !== '') {
                    const finalScore = ctAvg + kuAvg + hwAvg + att;
                    kuFinalInput.value = finalScore.toFixed(0);
                } else {
                    kuFinalInput.value = '';
                }
            }

            // === Hitung Demonstrate Knowledge ===
            function calculateDK() {
                let dkTotal = 0, dkCount = 0;
                dkInputs.forEach(input => {
                    const value = parseFloat(input.value);
                    if (!isNaN(value)) { dkTotal += value; dkCount++; }
                });

                let dkAvg = 0;
                if (dkCount > 0) {
                    dkAvg = (dkTotal / dkCount) * 0.95;
                    dkAvgInput.value = dkAvg.toFixed(0);
                } else {
                    dkAvgInput.value = '';
                }

                // Validasi Attendance DK
                let att = parseFloat(dkAttInput.value);
                if (isNaN(att)) att = 0;
                if (att > 5) { att = 5; dkAttInput.value = 5; }
                if (att < 0) { att = 0; dkAttInput.value = 0; }

                // Final Score DK
                if (dkCount > 0 || dkAttInput.value !== '') {
                    const finalScore = dkAvg + att;
                    dkFinalInput.value = finalScore.toFixed(0);
                } else {
                    dkFinalInput.value = '';
                }
            }

            // === Event Listeners ===
            ctInput.addEventListener('input', calculateKUSection);
            kuInputs.forEach(input => input.addEventListener('input', calculateKUSection));
            hwInputs.forEach(input => input.addEventListener('input', calculateKUSection));
            kuAttInput.addEventListener('input', calculateKUSection);

            dkInputs.forEach(input => input.addEventListener('input', calculateDK));
            dkAttInput.addEventListener('input', calculateDK);

            // === Initial Calculation Saat Halaman Dimuat ===
            calculateKUSection();
            calculateDK();
        });
    });
</script>
