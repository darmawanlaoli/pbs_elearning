<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th style="min-width: 50px;">No</th>
                <th style="min-width: 180px;">Student Name</th>
                <th>KU</th>
                <th>Thinking</th>
                <th>Communication</th>
                <th>Application</th>
                <th>Management <br> Skill</th>
                <th>Active <br>
                    Participation</th>
                <th>Social <br> Responsibility</th>
            </tr>



        </thead>

        <tbody>
            @foreach($assessments as $ass)
            <tr data-student-id="{{ $ass->id }}">

                <td>{{ $loop->iteration }}</td>

                <td>{{ $ass->name }}</td>

                {{-- KU --}}
                <td>
                    <input type="number" value="{{ $ass->entrepreneur_ku ?? '' }}" class="score-input ku-input"
                        name="students[{{ $ass->id }}][entrepreneur_ku]" min="0" max="100" step="0.01">
                </td>

                <td>
                    <input type="number" value="{{ $ass->entrepreneur_thinking ?? '' }}" class="score-input ku-input"
                        name="students[{{ $ass->id }}][entrepreneur_thinking]" min="0" max="100" step="0.01">
                </td>

                <td>
                    <input type="number" value="{{ $ass->entrepreneur_communication ?? '' }}" class="score-input ku-input"
                        name="students[{{ $ass->id }}][entrepreneur_communication]" min="0" max="100" step="0.01">
                </td>

                <td>
                    <input type="number" value="{{ $ass->entrepreneur_application ?? '' }}" class="score-input ku-input"
                        name="students[{{ $ass->id }}][entrepreneur_application]" min="0" max="100" step="0.01">
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

{{-- hitung total --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {

            // =================================
            // ELEMENT KU
            // =================================

            const kuInputs = row.querySelectorAll('.ku-input');
            const avgInput = row.querySelector('.avg-input');
            const kuAttInput = row.querySelector('.ku-att-input');
            const kuFinalInput = row.querySelector('.ku-final-input');


            // =================================
            // ELEMENT DK
            // =================================

            const dkInputs = row.querySelectorAll('.dk-input');
            const dkAvgInput = row.querySelector('.dk-avg-input');
            const dkAttInput = row.querySelector('.dk-att-input');
            const dkFinalInput = row.querySelector('.dk-final-input');


            // =================================
            // HITUNG KU
            // =================================

            function calculateKU() {

                let total = 0;
                let count = 0;

                // Hitung nilai KU yang terisi
                kuInputs.forEach(input => {

                    const value = parseFloat(input.value);

                    if (!isNaN(value)) {
                        total += value;
                        count++;
                    }

                });


                // =================================
                // AVG KU × 95%
                // =================================

                if (count > 0) {

                    const average = total / count;
                    const avg95 = average * 0.95;

                    avgInput.value = avg95.toFixed(0);

                } else {

                    avgInput.value = '';

                }


                // =================================
                // VALIDASI ATT KU
                // =================================

                let att = parseFloat(kuAttInput.value);

                if (isNaN(att)) {
                    att = 0;
                }

                if (att > 5) {
                    att = 5;
                    kuAttInput.value = 5;
                }

                if (att < 0) {
                    att = 0;
                    kuAttInput.value = 0;
                }


                // =================================
                // FINAL SCORE KU
                // =================================

                if (count > 0) {

                    const avg95 = parseFloat(avgInput.value) || 0;

                    const finalScore = avg95 + att;

                    kuFinalInput.value = finalScore.toFixed(0);

                } else {

                    kuFinalInput.value = '';

                }

            }


            // =================================
            // HITUNG DK
            // =================================

            function calculateDK() {

                let total = 0;
                let count = 0;

                // Hitung nilai DK yang terisi
                dkInputs.forEach(input => {

                    const value = parseFloat(input.value);

                    if (!isNaN(value)) {
                        total += value;
                        count++;
                    }

                });


                // =================================
                // AVG DK × 95%
                // =================================

                if (count > 0) {

                    const average = total / count;
                    const avg95 = average * 0.95;

                    dkAvgInput.value = avg95.toFixed(0);

                } else {

                    dkAvgInput.value = '';

                }


                // =================================
                // VALIDASI ATT DK
                // =================================

                let att = parseFloat(dkAttInput.value);

                if (isNaN(att)) {
                    att = 0;
                }

                if (att > 5) {
                    att = 5;
                    dkAttInput.value = 5;
                }

                if (att < 0) {
                    att = 0;
                    dkAttInput.value = 0;
                }


                // =================================
                // FINAL SCORE DK
                // =================================

                if (count > 0) {

                    const avg95 = parseFloat(dkAvgInput.value) || 0;

                    const finalScore = avg95 + att;

                    dkFinalInput.value = finalScore.toFixed(0);

                } else {

                    dkFinalInput.value = '';

                }

            }


            // =================================
            // EVENT KU
            // =================================

            kuInputs.forEach(input => {

                input.addEventListener('input', calculateKU);

            });

            kuAttInput.addEventListener('input', calculateKU);


            // =================================
            // EVENT DK
            // =================================

            dkInputs.forEach(input => {

                input.addEventListener('input', calculateDK);

            });

            dkAttInput.addEventListener('input', calculateDK);


            // =================================
            // INITIAL CALCULATION
            // =================================

            calculateKU();
            calculateDK();

        });

    });
</script>
