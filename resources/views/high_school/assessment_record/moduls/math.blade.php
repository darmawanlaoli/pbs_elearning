<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th rowspan="3" style="min-width: 50px;">No</th>
                <th rowspan="3" style="min-width: 180px;">Student Name</th>
                <th colspan="11">Number Sense and Operations</th>
                <th style="background-color: #EF2278" colspan="13">Problem Solving</th>
                {{-- <th style="background-color: #EF2278" colspan="4">Demonstrate Knowledge</th> --}}
                <th rowspan="3">Management <br> Skill</th>
                <th rowspan="3">Active <br> Participation</th>
                <th rowspan="3">Social <br> Responsibility</th>
            </tr>

            <tr>
                {{-- Number Sense and Operations --}}
                <th colspan="2">Chapter Test</th>
                <th colspan="4">Exercise</th>
                <th colspan="3">Homework</th>
                <th rowspan="2">Att 5%</th>
                <th rowspan="2">Total</th>

                {{-- Problem Solving --}}
                <th style="background-color: #EF2278" colspan="2">Chapter Test</th>
                <th style="background-color: #EF2278" colspan="2">Project</th>
                <th style="background-color: #EF2278" colspan="4">Exercise</th>
                <th style="background-color: #EF2278" colspan="3">Homework</th>
                <th style="background-color: #EF2278" rowspan="2">Att 5%</th>
                <th style="background-color: #EF2278" rowspan="2">Total</th>

                {{-- Demonstrate Knowledge --}}
                {{-- <th style="background-color: #EF2278" rowspan="2">Project</th>
                <th style="background-color: #EF2278" rowspan="2">AVG 95%</th>
                <th style="background-color: #EF2278" rowspan="2">Att 5%</th>
                <th style="background-color: #EF2278" rowspan="2">Total</th> --}}
            </tr>

            <tr class="text-center">
                {{-- Number Sense and Operations --}}
                <th>CT</th>
                <th>AVG X 60%</th>
                <th>Exercise 1</th>
                <th>Exercise 2</th>
                <th>Exercise 3</th>
                <th>AVG X 25%</th>
                <th>HW 1</th>
                <th>HW 2</th>
                <th>AVG X 10%</th>

                {{-- Problem Solving --}}
                <th style="background-color: #EF2278">CT</th>
                <th style="background-color: #EF2278">AVG X 40%</th>
                <th style="background-color: #EF2278">Proj.</th>
                <th style="background-color: #EF2278">AVG X 30%</th>
                <th style="background-color: #EF2278">Exercise 1</th>
                <th style="background-color: #EF2278">Exercise 2</th>
                <th style="background-color: #EF2278">Exercise 3</th>
                <th style="background-color: #EF2278">AVG X 15%</th>
                <th style="background-color: #EF2278">HW 1</th>
                <th style="background-color: #EF2278">HW 2</th>
                <th style="background-color: #EF2278">AVG X 10%</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assessments as $ass)
            <tr data-student-id="{{ $ass->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ass->name }}</td>

                {{-- ================= NUMBER SENSE & OPERATIONS ================= --}}
                <td><input type="number" value="{{ $ass->ct ?? '' }}" class="score-input nso-ct"
                        name="students[{{ $ass->id }}][ct]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->avg_ct ?? '' }}" class="score-input nso-ct-avg"
                        name="students[{{ $ass->id }}][avg_ct]" readonly></td>
                <td><input type="number" value="{{ $ass->ku1 ?? '' }}" class="score-input nso-ex"
                        name="students[{{ $ass->id }}][ku1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->ku2 ?? '' }}" class="score-input nso-ex"
                        name="students[{{ $ass->id }}][ku2]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->ku3 ?? '' }}" class="score-input nso-ex"
                        name="students[{{ $ass->id }}][ku3]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->ku_avg ?? '' }}" class="score-input nso-ex-avg"
                        name="students[{{ $ass->id }}][ku_avg]" readonly></td>
                <td><input type="number" value="{{ $ass->hw1 ?? '' }}" class="score-input nso-hw"
                        name="students[{{ $ass->id }}][hw1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->hw2 ?? '' }}" class="score-input nso-hw"
                        name="students[{{ $ass->id }}][hw2]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->hw_avg ?? '' }}" class="score-input nso-hw-avg"
                        name="students[{{ $ass->id }}][hw_avg]" readonly></td>
                <td><input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01"></td>
                <td class="total"><input type="number" value="{{ $ass->ku_total ?? '' }}" class="score-input nso-total"
                        name="students[{{ $ass->id }}][ku_total]" readonly></td>

                {{-- ================= PROBLEM SOLVING ================= --}}
                <td><input type="number" value="{{ $ass->lang_reading_ct ?? '' }}" class="score-input ps-ct"
                        name="students[{{ $ass->id }}][lang_reading_ct]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_reading_avg_ct ?? '' }}" class="score-input ps-ct-avg"
                        name="students[{{ $ass->id }}][lang_reading_avg_ct]" readonly></td>

                {{-- Input Baru: Project untuk Problem Solving --}}
                <td><input type="number" value="{{ $ass->ps_proj ?? '' }}" class="score-input ps-proj"
                        name="students[{{ $ass->id }}][ps_proj]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->ps_proj_avg ?? '' }}" class="score-input ps-proj-avg"
                        name="students[{{ $ass->id }}][ps_proj_avg]" readonly></td>

                <td><input type="number" value="{{ $ass->lang_reading_exer1 ?? '' }}" class="score-input ps-ex"
                        name="students[{{ $ass->id }}][lang_reading_exer1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_reading_exer2 ?? '' }}" class="score-input ps-ex"
                        name="students[{{ $ass->id }}][lang_reading_exer2]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_reading_exer3 ?? '' }}" class="score-input ps-ex"
                        name="students[{{ $ass->id }}][lang_reading_exer3]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_reading_exer_avg ?? '' }}" class="score-input ps-ex-avg"
                        name="students[{{ $ass->id }}][lang_reading_exer_avg]" readonly></td>
                <td><input type="number" value="{{ $ass->lang_reading_hw1 ?? '' }}" class="score-input ps-hw"
                        name="students[{{ $ass->id }}][lang_reading_hw1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_reading_hw2 ?? '' }}" class="score-input ps-hw"
                        name="students[{{ $ass->id }}][lang_reading_hw2]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_reading_hw_avg ?? '' }}" class="score-input ps-hw-avg"
                        name="students[{{ $ass->id }}][lang_reading_hw_avg]" readonly></td>
                <td><input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01"></td>
                <td class="total"><input type="number" value="{{ $ass->lang_reading_total ?? '' }}"
                        class="score-input ps-total" name="students[{{ $ass->id }}][lang_reading_total]" readonly></td>

                {{-- ================= DEMONSTRATE KNOWLEDGE ================= --}}
                {{-- <td><input type="number" value="{{ $ass->dk1 ?? '' }}" class="score-input dk-proj"
                        name="students[{{ $ass->id }}][dk1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->dk_avg ?? '' }}" class="score-input dk-proj-avg"
                        name="students[{{ $ass->id }}][dk_avg]" readonly></td>
                <td><input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01"></td>
                <td class="total"><input type="number" value="{{ $ass->dk_total ?? '' }}" class="score-input dk-total"
                        name="students[{{ $ass->id }}][dk_total]" readonly></td> --}}

                {{-- ================= LETTER INPUTS ================= --}}
                <td><input type="text" value="{{ $ass->management_skill ?? '' }}" class="score-input letter-input"
                        name="students[{{ $ass->id }}][management_skill]" pattern="[A-Da-d]" maxlength="1"></td>
                <td><input type="text" value="{{ $ass->active_participation ?? '' }}" class="score-input letter-input"
                        name="students[{{ $ass->id }}][active_participation]" pattern="[A-Da-d]" maxlength="1"></td>
                <td><input type="text" value="{{ $ass->social_responsibility ?? '' }}" class="score-input letter-input"
                        name="students[{{ $ass->id }}][social_responsibility]" pattern="[A-Da-d]" maxlength="1"></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            // Semua input attendance di dalam baris ini
            const attInputs = Array.from(row.querySelectorAll('input[name*="[attendance]"]'));

            // Definisi Seksi untuk Kalkulasi Dinamis
            const sections = [
                {
                    // 0: Number Sense and Operations (CT 60%, Ex 25%, HW 10%, Att)
                    ct: row.querySelector('.nso-ct'), ctAvg: row.querySelector('.nso-ct-avg'),
                    ex: row.querySelectorAll('.nso-ex'), exAvg: row.querySelector('.nso-ex-avg'),
                    hw: row.querySelectorAll('.nso-hw'), hwAvg: row.querySelector('.nso-hw-avg'),
                    total: row.querySelector('.nso-total'), att: attInputs[0],
                    weights: { ct: 0.60, ex: 0.25, hw: 0.10 }
                },
                {
                    // 1: Problem Solving (CT 40%, Proj 30%, Ex 25%, HW 10%, Att)
                    ct: row.querySelector('.ps-ct'), ctAvg: row.querySelector('.ps-ct-avg'),
                    proj: row.querySelector('.ps-proj'), projAvg: row.querySelector('.ps-proj-avg'),
                    ex: row.querySelectorAll('.ps-ex'), exAvg: row.querySelector('.ps-ex-avg'),
                    hw: row.querySelectorAll('.ps-hw'), hwAvg: row.querySelector('.ps-hw-avg'),
                    total: row.querySelector('.ps-total'), att: attInputs[1],
                    weights: { ct: 0.40, proj: 0.30, ex: 0.15, hw: 0.10 }
                },
                {
                    // 2: Demonstrate Knowledge (Project 95%, Att)
                    ex: row.querySelectorAll('.dk-proj'), exAvg: row.querySelector('.dk-proj-avg'),
                    total: row.querySelector('.dk-total'), att: attInputs[2],
                    weights: { ex: 0.95 }
                }
            ];

            // Fungsi Kalkulasi Per-Seksi
            function calculateSection(sec) {
                let totalScore = 0;
                let hasInput = false;

                // Chapter Test
                if (sec.ct) {
                    let val = parseFloat(sec.ct.value);
                    if (!isNaN(val)) {
                        let avg = val * sec.weights.ct;
                        if(sec.ctAvg) sec.ctAvg.value = avg.toFixed(0);
                        totalScore += avg;
                        hasInput = true;
                    } else {
                        if(sec.ctAvg) sec.ctAvg.value = '';
                    }
                }

                // Project (Khusus Problem Solving)
                if (sec.proj) {
                    let val = parseFloat(sec.proj.value);
                    if (!isNaN(val)) {
                        let avg = val * sec.weights.proj;
                        if(sec.projAvg) sec.projAvg.value = avg.toFixed(0);
                        totalScore += avg;
                        hasInput = true;
                    } else {
                        if(sec.projAvg) sec.projAvg.value = '';
                    }
                }

                // Exercises & DK Project
                if (sec.ex && sec.ex.length > 0) {
                    let exTot = 0, count = 0;
                    sec.ex.forEach(inp => {
                        let val = parseFloat(inp.value);
                        if (!isNaN(val)) { exTot += val; count++; }
                    });
                    if (count > 0) {
                        let avg = (exTot / count) * sec.weights.ex;
                        if(sec.exAvg) sec.exAvg.value = avg.toFixed(0);
                        totalScore += avg;
                        hasInput = true;
                    } else {
                        if(sec.exAvg) sec.exAvg.value = '';
                    }
                }

                // Homework
                if (sec.hw && sec.hw.length > 0) {
                    let hwTot = 0, count = 0;
                    sec.hw.forEach(inp => {
                        let val = parseFloat(inp.value);
                        if (!isNaN(val)) { hwTot += val; count++; }
                    });
                    if (count > 0) {
                        let avg = (hwTot / count) * sec.weights.hw;
                        if(sec.hwAvg) sec.hwAvg.value = avg.toFixed(0);
                        totalScore += avg;
                        hasInput = true;
                    } else {
                        if(sec.hwAvg) sec.hwAvg.value = '';
                    }
                }

                // Attendance
                if (sec.att) {
                    let val = parseFloat(sec.att.value);
                    if (!isNaN(val)) {
                        totalScore += val;
                        hasInput = true;
                    }
                }

                // Final Total Input
                if (sec.total) {
                    sec.total.value = hasInput ? totalScore.toFixed(0) : '';
                }
            }

            // Bind Event Listeners Untuk Setiap Nilai di Masing-masing Seksi
            sections.forEach(sec => {
                const triggerCalc = () => calculateSection(sec);
                if (sec.ct) sec.ct.addEventListener('input', triggerCalc);
                if (sec.proj) sec.proj.addEventListener('input', triggerCalc);
                if (sec.ex) sec.ex.forEach(inp => inp.addEventListener('input', triggerCalc));
                if (sec.hw) sec.hw.forEach(inp => inp.addEventListener('input', triggerCalc));
                if (sec.att) sec.att.addEventListener('input', triggerCalc);

                // Initial kalkulasi saat web direfresh
                triggerCalc();
            });

            // ================= SINKRONISASI ATTENDANCE =================
            if (attInputs.length > 0) {
                const mainAtt = attInputs[0]; // Att di kolom paling kiri

                mainAtt.addEventListener('input', function() {
                    let val = this.value;
                    if (val !== '') {
                        let numVal = parseFloat(val);
                        if (numVal > 5) val = 5;
                        if (numVal < 0) val = 0;
                        this.value = val;
                    }

                    // Sinkronisasi ke seluruh Att lain dalam satu baris
                    attInputs.forEach((att, idx) => {
                        if (idx !== 0) {
                            att.value = this.value;
                        }
                    });

                    // Trigger perbaruan kalkulasi ke semua seksi
                    sections.forEach(sec => calculateSection(sec));
                });

                // Validasi max=5 min=0 jika Att lain (selain yang pertama) diedit secara manual
                attInputs.forEach(att => {
                    att.addEventListener('input', function() {
                        let numVal = parseFloat(this.value);
                        if (!isNaN(numVal)) {
                            if (numVal > 5) this.value = 5;
                            if (numVal < 0) this.value = 0;
                        }
                    });
                });
            }

            // ================= VALIDASI LETTER INPUT (A, B, C, D) =================
            const letterInputs = row.querySelectorAll('.letter-input');
            letterInputs.forEach(input => {
                input.addEventListener('input', function() {
                    let val = this.value.charAt(0).toUpperCase();

                    if (val && !['A', 'B', 'C', 'D'].includes(val)) {
                        this.value = ''; // Hapus jika bukan A/B/C/D
                    } else {
                        this.value = val; // Jadikan huruf kapital
                    }
                });
            });
        });
    });
</script>
