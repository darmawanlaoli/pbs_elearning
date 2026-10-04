<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th rowspan="2" style="min-width: 50px;">No</th>
                <th rowspan="2" style="min-width: 180px;">Student Name</th>
                <th colspan="5">FORMATIVE ASSESSEMENT (FA)</th>
                <th colspan="5">SUMMATIVE ASSESSEMENT (SA)</th>
                <th rowspan="2">STS</th>
                <th rowspan="2">PROJECT</th>
                <th rowspan="2">TOTAL <br> TERM 1</th>
            </tr>
            <tr class="text-center">
                {{-- Formative --}}
                <th>FA 1</th>
                <th>FA 2</th>
                <th>FA 3</th>
                <th>FA 4</th>
                <th class="bg-success">TOTAL</th>

                {{-- SUMMATIVE --}}
                <th>HW 1</th>
                <th>HW 2</th>
                <th>WS 1</th>
                <th>WS 2</th>
                <th class="bg-success">TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assessments as $ass)
            <tr data-student-id="{{ $ass->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ass->name }}</td>

                <td>
                    <input type="number" value="{{ $ass->kurmer_fa1 ?? '' }}" class="score-input fa-input" name="students[{{ $ass->id }}][kurmer_fa1]"
                        min="0" max="100" step="0.01">
                </td>

                <td>
                    <input type="number" value="{{ $ass->kurmer_fa2 ?? '' }}" class="score-input fa-input"
                        name="students[{{ $ass->id }}][kurmer_fa2]" min="0" max="100" step="0.01">
                </td>

                <td>
                    <input type="number" value="{{ $ass->kurmer_fa3 ?? '' }}" class="score-input fa-input"
                        name="students[{{ $ass->id }}][kurmer_fa3]" min="0" max="100" step="0.01">
                </td>

                <td>
                    <input type="number" value="{{ $ass->kurmer_fa4 ?? '' }}" class="score-input fa-input"
                        name="students[{{ $ass->id }}][kurmer_fa4]" min="0" max="100" step="0.01">
                </td>

                <td class="total_fa">
                    <input type="number" value="{{ $ass->kurmer_total_fa ?? '' }}" class="score-input ku-final-input"
                        name="students[{{ $ass->id }}][kurmer_total_fa]" readonly>
                </td>


                {{-- WS --}}
                <td class="text-center">{{ $ass->ku1 ?? '-' }}</td>
                <td class="text-center">{{ $ass->ku2 ?? '-' }}</td>

                {{-- HW --}}
                <td class="text-center">{{ $ass->hw1 ?? '-' }}</td>
                <td class="text-center">{{ $ass->hw2 ?? '-' }}</td>

                {{-- Total Summative (Dinamis & Aman) --}}
                <td class="text-center">
                    @php
                    // Ambil semua komponen nilai
                    $komponen_nilai = [$ass->ku1, $ass->ku2, $ass->hw1, $ass->hw2];

                    // Filter hanya yang berisi angka (mengabaikan null, string kosong, atau teks)
                    $nilai_terisi = array_filter($komponen_nilai, 'is_numeric');

                    // Hitung rata-rata hanya berdasarkan tugas yang sudah ada nilainya
                    $total_tugas = count($nilai_terisi);
                    $rata_rata_sa = $total_tugas > 0 ? round(array_sum($nilai_terisi) / $total_tugas) : '-';
                    @endphp

                    <strong>{{ $rata_rata_sa }}</strong>
                </td>

                <td class="text-center">{{ $ass->ku_total ?? '-' }}</td>
                <td class="text-center">{{ $ass->dk_total ?? '-' }}</td>
                <td></td>

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
