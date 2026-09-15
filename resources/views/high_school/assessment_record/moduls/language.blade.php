<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th rowspan="3" style="min-width: 50px;">No</th>
                <th rowspan="3" style="min-width: 180px;">Student Name</th>
                <th colspan="11">Understanding Concept</th>
                <th style="background-color: #EF2278" colspan="19">Comprehension</th>
                <th colspan="19">Communication</th>
                <th style="background-color: #EF2278" colspan="4">Demonstrate Knowledge</th>
                <th rowspan="3">Management <br> Skill</th>
                <th rowspan="3">Active <br> Participation</th>
                <th rowspan="3">Social <br> Responsibility</th>
            </tr>

            <tr>
                {{-- Understanding Concept --}}
                <th colspan="2">Chapter Test</th>
                <th colspan="4">Exercise</th>
                <th colspan="3">Homework</th>
                <th rowspan="2">Att 5%</th>
                <th rowspan="2">Total</th>

                {{-- Comprehension Reading--}}
                <th style="background-color: #EF2278" colspan="9">Reading</th>
                <th style="background-color: #EF2278" rowspan="2">Att 5%</th>
                <th style="background-color: #EF2278" rowspan="2">Total</th>

                {{-- Comprehension Listening--}}
                <th style="background-color: #EF2278" colspan="6">Listening and Viewing</th>
                <th style="background-color: #EF2278" rowspan="2">Att 5%</th>
                <th style="background-color: #EF2278" rowspan="2">Total</th>

                {{-- Communication Writing--}}
                <th colspan="9">Writing</th>
                <th rowspan="2">Att 5%</th>
                <th rowspan="2">Total</th>

                {{-- Communication Speaking--}}
                <th colspan="6">Speaking and Representing</th>
                <th rowspan="2">Att 5%</th>
                <th rowspan="2">Total</th>

                {{-- Project --}}
                <th style="background-color: #EF2278" rowspan="2">Project</th>
                <th style="background-color: #EF2278" rowspan="2">AVG 95%</th>
                <th style="background-color: #EF2278" rowspan="2">Att 5%</th>
                <th style="background-color: #EF2278" rowspan="2">Total</th>
            </tr>

            <tr class="text-center">
                {{-- Understanding Concept --}}
                <th>CT</th>
                <th>AVG X 60%</th>
                <th>Exercise 1</th>
                <th>Exercise 2</th>
                <th>Exercise 3</th>
                <th>AVG X 25%</th>
                <th>HW 1</th>
                <th>HW 2</th>
                <th>AVG X 10%</th>

                {{-- Comprehension - Reading--}}
                <th style="background-color: #EF2278">CT</th>
                <th style="background-color: #EF2278">AVG X 60%</th>
                <th style="background-color: #EF2278">Exercise 1</th>
                <th style="background-color: #EF2278">Exercise 2</th>
                <th style="background-color: #EF2278">Exercise 3</th>
                <th style="background-color: #EF2278">AVG X 25%</th>
                <th style="background-color: #EF2278">HW 1</th>
                <th style="background-color: #EF2278">HW 2</th>
                <th style="background-color: #EF2278">AVG X 10%</th>

                {{-- Comprehension - Listening--}}
                <th style="background-color: #EF2278">CT</th>
                <th style="background-color: #EF2278">AVG X 70%</th>
                <th style="background-color: #EF2278">Exercise 1</th>
                <th style="background-color: #EF2278">Exercise 2</th>
                <th style="background-color: #EF2278">Exercise 3</th>
                <th style="background-color: #EF2278">AVG X 25%</th>

                {{-- Communication - Writing--}}
                <th>CT</th>
                <th>AVG X 60%</th>
                <th>Exercise 1</th>
                <th>Exercise 2</th>
                <th>Exercise 3</th>
                <th>AVG X 25%</th>
                <th>HW 1</th>
                <th>HW 2</th>
                <th>AVG X 10%</th>

                {{-- Communication - Speaking--}}
                <th>CT</th>
                <th>AVG X 70%</th>
                <th>Exercise 1</th>
                <th>Exercise 2</th>
                <th>Exercise 3</th>
                <th>AVG X 25%</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assessments as $ass)
            <tr data-student-id="{{ $ass->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ass->name }}</td>

                {{-- ================= UNDERSTANDING CONCEPT ================= --}}
                <td><input type="number" value="{{ $ass->ct ?? '' }}" class="score-input uc-ct"
                        name="students[{{ $ass->id }}][ct]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->avg_ct ?? '' }}" class="score-input uc-ct-avg"
                        name="students[{{ $ass->id }}][avg_ct]" readonly></td>
                <td><input type="number" value="{{ $ass->ku1 ?? '' }}" class="score-input uc-ex"
                        name="students[{{ $ass->id }}][ku1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->ku2 ?? '' }}" class="score-input uc-ex"
                        name="students[{{ $ass->id }}][ku2]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->ku3 ?? '' }}" class="score-input uc-ex"
                        name="students[{{ $ass->id }}][ku3]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->ku_avg ?? '' }}" class="score-input uc-ex-avg"
                        name="students[{{ $ass->id }}][ku_avg]" readonly></td>
                <td><input type="number" value="{{ $ass->hw1 ?? '' }}" class="score-input uc-hw"
                        name="students[{{ $ass->id }}][hw1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->hw2 ?? '' }}" class="score-input uc-hw"
                        name="students[{{ $ass->id }}][hw2]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->hw_avg ?? '' }}" class="score-input uc-hw-avg"
                        name="students[{{ $ass->id }}][hw_avg]" readonly></td>
                <td><input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01"></td>
                <td class="total"><input type="number" value="{{ $ass->ku_total ?? '' }}" class="score-input uc-total"
                        name="students[{{ $ass->id }}][ku_total]" readonly></td>

                {{-- ================= READING ================= --}}
                <td><input type="number" value="{{ $ass->lang_reading_ct ?? '' }}" class="score-input read-ct"
                        name="students[{{ $ass->id }}][lang_reading_ct]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_reading_avg_ct ?? '' }}" class="score-input read-ct-avg"
                        name="students[{{ $ass->id }}][lang_reading_avg_ct]" readonly></td>
                <td><input type="number" value="{{ $ass->lang_reading_exer1 ?? '' }}" class="score-input read-ex"
                        name="students[{{ $ass->id }}][lang_reading_exer1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_reading_exer2 ?? '' }}" class="score-input read-ex"
                        name="students[{{ $ass->id }}][lang_reading_exer2]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_reading_exer3 ?? '' }}" class="score-input read-ex"
                        name="students[{{ $ass->id }}][lang_reading_exer3]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_reading_exer_avg ?? '' }}" class="score-input read-ex-avg"
                        name="students[{{ $ass->id }}][lang_reading_exer_avg]" readonly></td>
                <td><input type="number" value="{{ $ass->lang_reading_hw1 ?? '' }}" class="score-input read-hw"
                        name="students[{{ $ass->id }}][lang_reading_hw1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_reading_hw2 ?? '' }}" class="score-input read-hw"
                        name="students[{{ $ass->id }}][lang_reading_hw2]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_reading_hw_avg ?? '' }}" class="score-input read-hw-avg"
                        name="students[{{ $ass->id }}][lang_reading_hw_avg]" readonly></td>
                <td><input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01"></td>
                <td class="total"><input type="number" value="{{ $ass->lang_reading_total ?? '' }}"
                        class="score-input read-total" name="students[{{ $ass->id }}][lang_reading_total]" readonly>
                </td>

                {{-- ================= LISTENING ================= --}}
                <td><input type="number" value="{{ $ass->lang_listening_ct ?? '' }}" class="score-input list-ct"
                        name="students[{{ $ass->id }}][lang_listening_ct]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_listening_avg_ct ?? '' }}" class="score-input list-ct-avg"
                        name="students[{{ $ass->id }}][lang_listening_avg_ct]" readonly></td>
                <td><input type="number" value="{{ $ass->lang_listening_exer1 ?? '' }}" class="score-input list-ex"
                        name="students[{{ $ass->id }}][lang_listening_exer1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_listening_exer2 ?? '' }}" class="score-input list-ex"
                        name="students[{{ $ass->id }}][lang_listening_exer2]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_listening_exer3 ?? '' }}" class="score-input list-ex"
                        name="students[{{ $ass->id }}][lang_listening_exer3]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_listening_exer_avg ?? '' }}"
                        class="score-input list-ex-avg" name="students[{{ $ass->id }}][lang_listening_exer_avg]"
                        readonly></td>
                <td><input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01"></td>
                <td class="total"><input type="number" value="{{ $ass->lang_listening_total ?? '' }}"
                        class="score-input list-total" name="students[{{ $ass->id }}][lang_listening_total]" readonly>
                </td>

                {{-- ================= WRITING ================= --}}
                <td><input type="number" value="{{ $ass->lang_writing_ct ?? '' }}" class="score-input writ-ct"
                        name="students[{{ $ass->id }}][lang_writing_ct]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_writing_avg_ct ?? '' }}" class="score-input writ-ct-avg"
                        name="students[{{ $ass->id }}][lang_writing_avg_ct]" readonly></td>
                <td><input type="number" value="{{ $ass->lang_writing_exer1 ?? '' }}" class="score-input writ-ex"
                        name="students[{{ $ass->id }}][lang_writing_exer1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_writing_exer2 ?? '' }}" class="score-input writ-ex"
                        name="students[{{ $ass->id }}][lang_writing_exer2]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_writing_exer3 ?? '' }}" class="score-input writ-ex"
                        name="students[{{ $ass->id }}][lang_writing_exer3]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_writing_exer_avg ?? '' }}" class="score-input writ-ex-avg"
                        name="students[{{ $ass->id }}][lang_writing_exer_avg]" readonly></td>
                <td><input type="number" value="{{ $ass->lang_writing_hw1 ?? '' }}" class="score-input writ-hw"
                        name="students[{{ $ass->id }}][lang_writing_hw1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_writing_hw2 ?? '' }}" class="score-input writ-hw"
                        name="students[{{ $ass->id }}][lang_writing_hw2]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_writing_hw_avg ?? '' }}" class="score-input writ-hw-avg"
                        name="students[{{ $ass->id }}][lang_writing_hw_avg]" readonly></td>
                <td><input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01"></td>
                <td class="total"><input type="number" value="{{ $ass->lang_writing_total ?? '' }}"
                        class="score-input writ-total" name="students[{{ $ass->id }}][lang_writing_total]" readonly>
                </td>

                {{-- ================= SPEAKING ================= --}}
                <td><input type="number" value="{{ $ass->lang_speaking_ct ?? '' }}" class="score-input speak-ct"
                        name="students[{{ $ass->id }}][lang_speaking_ct]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_speaking_avg_ct ?? '' }}" class="score-input speak-ct-avg"
                        name="students[{{ $ass->id }}][lang_speaking_avg_ct]" readonly></td>
                <td><input type="number" value="{{ $ass->lang_speaking_exer1 ?? '' }}" class="score-input speak-ex"
                        name="students[{{ $ass->id }}][lang_speaking_exer1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_speaking_exer2 ?? '' }}" class="score-input speak-ex"
                        name="students[{{ $ass->id }}][lang_speaking_exer2]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_speaking_exer3 ?? '' }}" class="score-input speak-ex"
                        name="students[{{ $ass->id }}][lang_speaking_exer3]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->lang_speaking_exer_avg ?? '' }}"
                        class="score-input speak-ex-avg" name="students[{{ $ass->id }}][lang_speaking_exer_avg]"
                        readonly></td>
                <td><input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01"></td>
                <td class="total"><input type="number" value="{{ $ass->lang_speaking_total ?? '' }}"
                        class="score-input speak-total" name="students[{{ $ass->id }}][lang_speaking_total]" readonly>
                </td>

                {{-- ================= DEMONSTRATE KNOWLEDGE ================= --}}
                <td><input type="number" value="{{ $ass->dk1 ?? '' }}" class="score-input dk-proj"
                        name="students[{{ $ass->id }}][dk1]" min="0" max="100" step="0.01"></td>
                <td><input type="number" value="{{ $ass->dk_avg ?? '' }}" class="score-input dk-proj-avg"
                        name="students[{{ $ass->id }}][dk_avg]" readonly></td>
                <td><input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01"></td>
                <td class="total"><input type="number" value="{{ $ass->dk_total ?? '' }}" class="score-input dk-total"
                        name="students[{{ $ass->id }}][dk_total]" readonly></td>

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
                    // 0: Understanding Concept (CT 60%, Ex 25%, HW 10%, Att)
                    ct: row.querySelector('.uc-ct'), ctAvg: row.querySelector('.uc-ct-avg'),
                    ex: row.querySelectorAll('.uc-ex'), exAvg: row.querySelector('.uc-ex-avg'),
                    hw: row.querySelectorAll('.uc-hw'), hwAvg: row.querySelector('.uc-hw-avg'),
                    total: row.querySelector('.uc-total'), att: attInputs[0],
                    weights: { ct: 0.60, ex: 0.25, hw: 0.10 }
                },
                {
                    // 1: Reading (CT 60%, Ex 25%, HW 10%, Att)
                    ct: row.querySelector('.read-ct'), ctAvg: row.querySelector('.read-ct-avg'),
                    ex: row.querySelectorAll('.read-ex'), exAvg: row.querySelector('.read-ex-avg'),
                    hw: row.querySelectorAll('.read-hw'), hwAvg: row.querySelector('.read-hw-avg'),
                    total: row.querySelector('.read-total'), att: attInputs[1],
                    weights: { ct: 0.60, ex: 0.25, hw: 0.10 }
                },
                {
                    // 2: Listening (CT 70%, Ex 25%, Att)
                    ct: row.querySelector('.list-ct'), ctAvg: row.querySelector('.list-ct-avg'),
                    ex: row.querySelectorAll('.list-ex'), exAvg: row.querySelector('.list-ex-avg'),
                    total: row.querySelector('.list-total'), att: attInputs[2],
                    weights: { ct: 0.70, ex: 0.25 }
                },
                {
                    // 3: Writing (CT 60%, Ex 25%, HW 10%, Att)
                    ct: row.querySelector('.writ-ct'), ctAvg: row.querySelector('.writ-ct-avg'),
                    ex: row.querySelectorAll('.writ-ex'), exAvg: row.querySelector('.writ-ex-avg'),
                    hw: row.querySelectorAll('.writ-hw'), hwAvg: row.querySelector('.writ-hw-avg'),
                    total: row.querySelector('.writ-total'), att: attInputs[3],
                    weights: { ct: 0.60, ex: 0.25, hw: 0.10 }
                },
                {
                    // 4: Speaking (CT 70%, Ex 25%, Att)
                    ct: row.querySelector('.speak-ct'), ctAvg: row.querySelector('.speak-ct-avg'),
                    ex: row.querySelectorAll('.speak-ex'), exAvg: row.querySelector('.speak-ex-avg'),
                    total: row.querySelector('.speak-total'), att: attInputs[4],
                    weights: { ct: 0.70, ex: 0.25 }
                },
                {
                    // 5: Demonstrate Knowledge (Project 95%, Att)
                    ex: row.querySelectorAll('.dk-proj'), exAvg: row.querySelector('.dk-proj-avg'),
                    total: row.querySelector('.dk-total'), att: attInputs[5],
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

                // Exercises & Project
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
                if (sec.ex) sec.ex.forEach(inp => inp.addEventListener('input', triggerCalc));
                if (sec.hw) sec.hw.forEach(inp => inp.addEventListener('input', triggerCalc));
                if (sec.att) sec.att.addEventListener('input', triggerCalc);

                // Initial kalkulasi saat web direfresh
                triggerCalc();
            });

            // ================= SINKRONISASI ATTENDANCE =================
            if (attInputs.length > 0) {
                const mainAtt = attInputs[0]; // Att di kolom Understanding Concept

                mainAtt.addEventListener('input', function() {
                    let val = this.value;
                    if (val !== '') {
                        let numVal = parseFloat(val);
                        if (numVal > 5) val = 5;
                        if (numVal < 0) val = 0;
                        this.value = val;
                    }

                    // Sinkronisasi otomatis ke Att lain dalam baris ini
                    attInputs.forEach((att, idx) => {
                        if (idx !== 0) {
                            att.value = this.value;
                        }
                    });

                    // Trigger perbaruan total di seluruh seksi
                    sections.forEach(sec => calculateSection(sec));
                });

                // Validasi max=5 min=0 jika Att lain diisi manual
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
                    // Ambil huruf pertama, ubah ke Kapital
                    let val = this.value.charAt(0).toUpperCase();

                    // Cek ketersediaan di array A, B, C, D
                    if (val && !['A', 'B', 'C', 'D'].includes(val)) {
                        this.value = ''; // Hapus otomatis
                    } else {
                        this.value = val; // Set otomatis ke uppercase
                    }
                });
            });
        });
    });
</script>
