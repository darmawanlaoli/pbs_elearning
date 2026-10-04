<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th rowspan="2" style="min-width: 50px;">No</th>
                <th rowspan="2" style="min-width: 180px;">Student Name</th>
                <th colspan="6">Ilmu Pengetahuan Sosial</th>
                <th colspan="6">Ilmu Pengetahuan Alam</th>
            </tr>

            <tr class="text-center">
                {{-- IPS --}}
                <th>Score 95%</th>
                <th>Att 5%</th>
                <th>Total</th>
                <th>Management <br> Skill</th>
                <th>Active <br> Participation</th>
                <th>Social <br> Responsibility</th>

                {{-- IPA --}}
                <th>Score 95%</th>
                <th>Att 5%</th>
                <th>Total</th>
                <th>Management <br> Skill</th>
                <th>Active <br> Participation</th>
                <th>Social <br> Responsibility</th>
            </tr>
        </thead>

        <tbody>
            @foreach($assessments as $ass)
            <tr data-student-id="{{ $ass->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ass->name }}</td>

                {{-- IPS --}}
                <td>
                    <input type="number" value="{{ $ass->uoi_ips ?? '' }}" class="score-input uoi_ips ips-score"
                        name="students[{{ $ass->id }}][uoi_ips]" min="0" max="100" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input att-input ips-att"
                        name="students[{{ $ass->id }}][attendance]" min="0" max="5" step="0.01">
                </td>
                <td class="total">
                    <input type="number" value="{{ $ass->total_uoi_ips ?? '' }}" class="score-input ips-total"
                        name="students[{{ $ass->id }}][total_uoi_ips]" readonly>
                </td>
                <td>
                    <input type="text" value="{{ $ass->uoi_ips_personal_management ?? '' }}"
                        class="score-input letter-input" name="students[{{ $ass->id }}][uoi_ips_personal_management]"
                        pattern="[A-Da-d]" maxlength="1">
                </td>
                <td>
                    <input type="text" value="{{ $ass->uoi_ips_active_participation ?? '' }}"
                        class="score-input letter-input" name="students[{{ $ass->id }}][uoi_ips_active_participation]"
                        pattern="[A-Da-d]" maxlength="1">
                </td>
                <td>
                    <input type="text" value="{{ $ass->uoi_ips_social_responsibility ?? '' }}"
                        class="score-input letter-input" name="students[{{ $ass->id }}][uoi_ips_social_responsibility]"
                        pattern="[A-Da-d]" maxlength="1">
                </td>

                {{-- IPA --}}
                <td>
                    <input type="number" value="{{ $ass->uoi_ipa ?? '' }}" class="score-input uoi_ipa ipa-score"
                        name="students[{{ $ass->id }}][uoi_ipa]" min="0" max="100" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->attendance ?? '' }}" class="score-input att-input ipa-att"
                        name="students[{{ $ass->id }}][attendance_ipa]" min="0" max="5" step="0.01">
                </td>
                <td class="total">
                    <input type="number" value="{{ $ass->total_uoi_ipa ?? '' }}" class="score-input ipa-total"
                        name="students[{{ $ass->id }}][total_uoi_ipa]" readonly>
                </td>
                <td>
                    <input type="text" value="{{ $ass->uoi_ipa_personal_management ?? '' }}"
                        class="score-input letter-input" name="students[{{ $ass->id }}][uoi_ipa_personal_management]"
                        pattern="[A-Da-d]" maxlength="1">
                </td>
                <td>
                    <input type="text" value="{{ $ass->uoi_ipa_active_participation ?? '' }}"
                        class="score-input letter-input" name="students[{{ $ass->id }}][uoi_ipa_active_participation]"
                        pattern="[A-Da-d]" maxlength="1">
                </td>
                <td>
                    <input type="text" value="{{ $ass->uoi_ipa_social_responsibility ?? '' }}"
                        class="score-input letter-input" name="students[{{ $ass->id }}][uoi_ipa_social_responsibility]"
                        pattern="[A-Da-d]" maxlength="1">
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
        // Elements IPS
        const ipsScore = row.querySelector('.ips-score');
        const ipsAtt = row.querySelector('.ips-att');
        const ipsTotal = row.querySelector('.ips-total');

        // Elements IPA
        const ipaScore = row.querySelector('.ipa-score');
        const ipaAtt = row.querySelector('.ipa-att');
        const ipaTotal = row.querySelector('.ipa-total');

        // Elements Huruf (ABCD)
        const letterInputs = row.querySelectorAll('.letter-input');

        // Helper untuk validasi attendance 0 - 5
        function getValidatedAtt(attInput) {
            let att = parseFloat(attInput.value);
            if (isNaN(att)) return 0;
            if (att > 5) {
                att = 5;
                attInput.value = 5;
            }
            if (att < 0) {
                att = 0;
                attInput.value = 0;
            }
            return att;
        }

        // 1. Hitung Total IPS (Score 95% + Attendance 5%)
        function calculateIPS() {
            const score = parseFloat(ipsScore.value);
            const att = getValidatedAtt(ipsAtt);

            if (!isNaN(score)) {
                // Mengalikan score dengan 95% lalu ditambah nilai attendance
                const total = (score * 0.95) + att;
                ipsTotal.value = total.toFixed(0);
            } else {
                ipsTotal.value = '';
            }
        }

        // 1. Hitung Total IPA (Score 95% + Attendance 5%)
        function calculateIPA() {
            const score = parseFloat(ipaScore.value);
            const att = getValidatedAtt(ipaAtt);

            if (!isNaN(score)) {
                // Mengalikan score dengan 95% lalu ditambah nilai attendance
                const total = (score * 0.95) + att;
                ipaTotal.value = total.toFixed(0);
            } else {
                ipaTotal.value = '';
            }
        }

        // Event Listener untuk Kalkulasi & Sync Attendance
        ipsScore.addEventListener('input', calculateIPS);

        // 2. Ketika Attendance IPS diisi, otomatis menyalin ke IPA
        ipsAtt.addEventListener('input', function () {
            ipaAtt.value = this.value; // Sync ke IPA
            calculateIPS();
            calculateIPA();
        });

        ipaScore.addEventListener('input', calculateIPA);
        ipaAtt.addEventListener('input', function () {
            calculateIPA();
        });

        // 3. Otomatis Uppercase & Validasi A, B, C, D
        letterInputs.forEach(input => {
            input.addEventListener('input', function () {
                // Ubah ke huruf besar
                this.value = this.value.toUpperCase();

                // Hapus jika bukan A, B, C, atau D
                if (!/^[A-D]$/.test(this.value)) {
                    this.value = '';
                }
            });
        });

        // Kalkulasi Awal saat Halaman Dimuat
        calculateIPS();
        calculateIPA();
    });
});
</script>
