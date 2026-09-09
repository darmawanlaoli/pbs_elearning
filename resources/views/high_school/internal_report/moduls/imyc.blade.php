<div class="table-container">
    <table>
        <thead>
            <tr class="text-center">
                <th rowspan="2" style="min-width: 50px;">No</th>
                <th rowspan="2" style="min-width: 180px;">Student Name</th>

                <th colspan="3" style="background-color: #631919;">Geography</th>
                <th rowspan="2" style="background-color: #631919;">Management <br> Skill</th>
                <th rowspan="2" style="background-color: #631919;">Active <br> Participation</th>
                <th rowspan="2" style="background-color: #631919;">Social <br> Responsibility</th>

                <th colspan="3">Science</th>
                <th rowspan="2">Management <br> Skill</th>
                <th rowspan="2">Active <br> Participation</th>
                <th rowspan="2">Social <br> Responsibility</th>

                <th colspan="3" style="background-color: #631919;">History</th>
                <th rowspan="2" style="background-color: #631919;">Management <br> Skill</th>
                <th rowspan="2" style="background-color: #631919;">Active <br> Participation</th>
                <th rowspan="2" style="background-color: #631919;">Social <br> Responsibility</th>

                <th colspan="3">Technology</th>
                <th rowspan="2">Management <br> Skill</th>
                <th rowspan="2">Active <br> Participation</th>
                <th rowspan="2">Social <br> Responsibility</th>

                <th colspan="3" style="background-color: #631919;">Language Arts</th>
                <th rowspan="2" style="background-color: #631919;">Management <br> Skill</th>
                <th rowspan="2" style="background-color: #631919;">Active <br> Participation</th>
                <th rowspan="2" style="background-color: #631919;">Social <br> Responsibility</th>
            </tr>

            <tr class="text-center">
                {{-- geo --}}
                <th style="background-color: #631919;">Score <br> 95%</th>
                <th style="background-color: #631919;">Att 5%</th>
                <th style="background-color: #631919;">Total</th>

                {{-- science --}}
                <th>Score <br> 95%</th>
                <th>Att 5%</th>
                <th>Total</th>

                {{-- history --}}
                <th style="background-color: #631919;">Score <br> 95%</th>
                <th style="background-color: #631919;">Att 5%</th>
                <th style="background-color: #631919;">Total</th>

                {{-- technology --}}
                <th>Score <br> 95%</th>
                <th>Att 5%</th>
                <th>Total</th>

                {{-- language arts --}}
                <th style="background-color: #631919;">Score <br> 95%</th>
                <th style="background-color: #631919;">Att 5%</th>
                <th style="background-color: #631919;">Total</th>
            </tr>
        </thead>

        <tbody>
            @foreach($assessments as $ass)
            <tr data-student-id="{{ $ass->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ass->name }}</td>

                {{-- Geography --}}
                <td>
                    <input type="number" value="{{ $ass->imyc_geo ?? '' }}" class="score-input imyc_geo"
                        name="students[{{ $ass->id }}][imyc_geo]" min="0" max="100" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->imyc_geo_att ?? '' }}" class="score-input imyc_geo_att"
                        name="students[{{ $ass->id }}][imyc_geo_att]" min="0" max="5" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->imyc_geo_total ?? '' }}" class="score-input imyc_geo_total"
                        name="students[{{ $ass->id }}][imyc_geo_total]" step="0.01" readonly>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_geo_management_skill]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_geo_management_skill ?? '') == $opt ? 'selected' : ''
                            }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_geo_active_participation]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_geo_active_participation ?? '') == $opt ? 'selected' :
                            '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_geo_social_responsibility]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_geo_social_responsibility ?? '') == $opt ? 'selected'
                            : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>

                {{-- Science --}}
                <td>
                    <input type="number" value="{{ $ass->imyc_science ?? '' }}" class="score-input imyc_science"
                        name="students[{{ $ass->id }}][imyc_science]" min="0" max="100" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->imyc_science_att ?? '' }}" class="score-input imyc_science_att"
                        name="students[{{ $ass->id }}][imyc_science_att]" min="0" max="5" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->imyc_science_total ?? '' }}"
                        class="score-input imyc_science_total" name="students[{{ $ass->id }}][imyc_science_total]"
                        step="0.01" readonly>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_science_management_skill]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_science_management_skill ?? '') == $opt ? 'selected' :
                            '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_science_active_participation]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_science_active_participation ?? '') == $opt ?
                            'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_science_social_responsibility]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_science_social_responsibility ?? '') == $opt ?
                            'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>

                {{-- History --}}
                <td>
                    <input type="number" value="{{ $ass->imyc_history ?? '' }}" class="score-input imyc_history"
                        name="students[{{ $ass->id }}][imyc_history]" min="0" max="100" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->imyc_history_att ?? '' }}" class="score-input imyc_history_att"
                        name="students[{{ $ass->id }}][imyc_history_att]" min="0" max="5" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->imyc_history_total ?? '' }}"
                        class="score-input imyc_history_total" name="students[{{ $ass->id }}][imyc_history_total]"
                        step="0.01" readonly>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_history_management_skill]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_history_management_skill ?? '') == $opt ? 'selected' :
                            '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_history_active_participation]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_history_active_participation ?? '') == $opt ?
                            'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_history_social_responsibility]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_history_social_responsibility ?? '') == $opt ?
                            'selected' : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>

                {{-- Technology --}}
                <td>
                    <input type="number" value="{{ $ass->imyc_tech ?? '' }}" class="score-input imyc_tech"
                        name="students[{{ $ass->id }}][imyc_tech]" min="0" max="100" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->imyc_tech_att ?? '' }}" class="score-input imyc_tech_att"
                        name="students[{{ $ass->id }}][imyc_tech_att]" min="0" max="5" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->imyc_tech_total ?? '' }}" class="score-input imyc_tech_total"
                        name="students[{{ $ass->id }}][imyc_tech_total]" step="0.01" readonly>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_tech_management_skill]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_tech_management_skill ?? '') == $opt ? 'selected' : ''
                            }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_tech_active_participation]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_tech_active_participation ?? '') == $opt ? 'selected'
                            : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_tech_social_responsibility]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_tech_social_responsibility ?? '') == $opt ? 'selected'
                            : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>

                {{-- Language Arts --}}
                <td>
                    <input type="number" value="{{ $ass->imyc_lang ?? '' }}" class="score-input imyc_lang"
                        name="students[{{ $ass->id }}][imyc_lang]" min="0" max="100" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->imyc_lang_att ?? '' }}" class="score-input imyc_lang_att"
                        name="students[{{ $ass->id }}][imyc_lang_att]" min="0" max="5" step="0.01">
                </td>
                <td>
                    <input type="number" value="{{ $ass->imyc_lang_total ?? '' }}" class="score-input imyc_lang_total"
                        name="students[{{ $ass->id }}][imyc_lang_total]" step="0.01" readonly>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_lang_management_skill]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_lang_management_skill ?? '') == $opt ? 'selected' : ''
                            }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_lang_active_participation]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_lang_active_participation ?? '') == $opt ? 'selected'
                            : '' }}>{{ $opt }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="students[{{ $ass->id }}][imyc_lang_social_responsibility]" class="score-input">
                        <option value="">Pilih</option>
                        @foreach(['A','B','C','D'] as $opt)
                        <option value="{{ $opt }}" {{ ($ass->imyc_lang_social_responsibility ?? '') == $opt ? 'selected'
                            : '' }}>{{ $opt }}</option>
                        @endforeach
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
    const subjects = ['geo', 'science', 'history', 'tech', 'lang'];

    rows.forEach(row => {
        subjects.forEach(subject => {
            const scoreInput = row.querySelector(`.imyc_${subject}`);
            const attInput = row.querySelector(`.imyc_${subject}_att`);
            const totalInput = row.querySelector(`.imyc_${subject}_total`);

            if (!scoreInput || !attInput || !totalInput) return;

            function calculateSubjectTotal() {
                const rawScore = parseFloat(scoreInput.value);
                let attScore = parseFloat(attInput.value);

                // Validasi input Absensi (Att 5%)
                if (!isNaN(attScore)) {
                    if (attScore > 5) {
                        attScore = 5;
                        attInput.value = 5;
                    } else if (attScore < 0) {
                        attScore = 0;
                        attInput.value = 0;
                    }
                }

                // Perhitungan: (Nilai 95%) + Absensi
                if (!isNaN(rawScore)) {
                    const weightedScore = rawScore * 0.95;
                    const finalAtt = isNaN(attScore) ? 0 : attScore;
                    const total = weightedScore + finalAtt;

                    totalInput.value = total.toFixed(0);
                } else {
                    totalInput.value = '';
                }
            }

            // Event Listeners
            scoreInput.addEventListener('input', calculateSubjectTotal);
            attInput.addEventListener('input', calculateSubjectTotal);

            // Hitung otomatis saat halaman pertama kali dimuat
            calculateSubjectTotal();
        });
    });
});
</script>
