<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<style>
    .table-responsive {
        height: 400px;
    }
</style>

<div class="container-fluid">

    <div class="widget-content searchable-container list">

        <div class="card">

            <div class="card-body">

                <table class="mb-2" style="width:100%">
                    <tr>
                        <th>Homeroom</th>
                        <th>: {{ session('name') }}</th>

                        <th>Academic Year</th>
                        <th>: {{ $subject->academic_year }}</th>
                    </tr>

                    <tr>
                        <th>Class</th>
                        <th>: {{ $subject->class }}</th>

                        <th>Term</th>
                        <th>: {{ $subject->term }}</th>
                    </tr>


                </table>

                <form action="{{ route('primary_teacher.report_data.update_all') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <a class="btn btn-secondary mb-2" href="{{ route('primary_teacher.report_data') }}">Back</a>

                    <button type="submit" class="btn btn-primary mb-2"><i class="ti ti-pencil"></i> Update</button>

                    <div class="table-responsive">
                        <table style="font-size: 11px; table-layout: fixed"
                            class="table table-bordered search-table align-middle text-nowrap" id="table">
                            <thead class="header-item text-center">
                                <tr>
                                    <th width="25px">NO.</th>
                                    <th style="width: 250px">NAME OF STUDENT</th>
                                    <th style="width: 300px">COMMENT</th>
                                    <th width="100px">PRESENT</th>
                                    <th width="100px">EXCUSED</th>
                                    <th width="100px">UNEXCUSED</th>
                                    <th width="100px">TARDY</th>

                                    <th width="150px">RESPONSIBILITY</th>
                                    <th width="150px">ORGANIZATION</th>
                                    <th width="150px">INDEPENDENT <br>WORK</th>
                                    <th width="150px">COLLABORATION</th>
                                    <th width="150px">INNITIATIVE</th>
                                    <th width="150px">SELF <br> REGULATION</th>

                                    <th width="150px">EXTRA 1</th>
                                    <th width="120px">SCORE EXTRA 1</th>

                                    <th width="150px">EXTRA 2</th>
                                    <th width="120px">SCORE EXTRA 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reports as $report)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $report->name }}</td>
                                    <td style="width: 250px" class="text-center" style="width: 250px">
                                        <textarea name="assesments[{{ $report->id }}][comment]" class="form-control"
                                            cols="30" rows="10">{{ $report->comment }}</textarea>
                                    </td>
                                    <td class="text-center" style="width: 150px">
                                        <input type="number" class="form-control text-center att_present-input"
                                            name="assesments[{{ $report->id }}][att_present]"
                                            value="{{ $report->att_present }}">
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <input type="number" class="form-control text-center att_excused-input"
                                            name="assesments[{{ $report->id }}][att_excused]"
                                            value="{{ $report->att_excused }}">
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <input type="number" class="form-control text-center att_unexcused-input"
                                            name="assesments[{{ $report->id }}][att_unexcused]"
                                            value="{{ $report->att_unexcused }}">
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <input type="number" class="form-control text-center att_tardy-input"
                                            name="assesments[{{ $report->id }}][att_tardy]"
                                            value="{{ $report->att_tardy }}">
                                    </td>

                                    {{-- learning skills --}}
                                    <td class="text-center" style="width: 150px">
                                        <select name="assesments[{{ $report->id }}][skills_responsibility]"
                                            class="form-control">
                                            <option value="{{ $report->skills_responsibility }}">{{
                                                $report->skills_responsibility }}</option>
                                            <option value="E">E</option>
                                            <option value="G">G</option>
                                            <option value="S">S</option>
                                            <option value="N">N</option>
                                        </select>
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <select name="assesments[{{ $report->id }}][skills_organization]"
                                            class="form-control">
                                            <option value="{{ $report->skills_organization }}">{{
                                                $report->skills_organization }}</option>
                                            <option value="E">E</option>
                                            <option value="G">G</option>
                                            <option value="S">S</option>
                                            <option value="N">N</option>
                                        </select>
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <select name="assesments[{{ $report->id }}][skills_independent_work]"
                                            class="form-control">
                                            <option value="{{ $report->skills_independent_work }}">{{
                                                $report->skills_independent_work }}</option>
                                            <option value="E">E</option>
                                            <option value="G">G</option>
                                            <option value="S">S</option>
                                            <option value="N">N</option>
                                        </select>
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <select name="assesments[{{ $report->id }}][skills_collaboration]"
                                            class="form-control">
                                            <option value="{{ $report->skills_collaboration }}">{{
                                                $report->skills_collaboration }}</option>
                                            <option value="E">E</option>
                                            <option value="G">G</option>
                                            <option value="S">S</option>
                                            <option value="N">N</option>
                                        </select>
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <select name="assesments[{{ $report->id }}][skills_innitiative]"
                                            class="form-control">
                                            <option value="{{ $report->skills_innitiative }}">{{
                                                $report->skills_innitiative }}</option>
                                            <option value="E">E</option>
                                            <option value="G">G</option>
                                            <option value="S">S</option>
                                            <option value="N">N</option>
                                        </select>
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <select name="assesments[{{ $report->id }}][skills_self_regulation]"
                                            class="form-control">
                                            <option value="{{ $report->skills_self_regulation }}">{{
                                                $report->skills_self_regulation }}</option>
                                            <option value="E">E</option>
                                            <option value="G">G</option>
                                            <option value="S">S</option>
                                            <option value="N">N</option>
                                        </select>
                                    </td>


                                    <td class="text-center" style="width: 150px">
                                        <select name="assesments[{{ $report->id }}][extra_1]" class="form-control">
                                            <option value="{{ $report->extra_1 }}">{{
                                                $report->extra_1 }}</option>
                                            <option value="Dance">Dance</option>
                                            <option value="Pencak Silat">Pencak Silat</option>
                                            <option value="Football">Football</option>
                                            <option value="Basketball">Basketball</option>
                                            <option value="Science Club">Science Club</option>
                                            <option value="Board Games">Board Games</option>
                                            <option value="Drawing">Drawing</option>
                                        </select>
                                    </td>


                                    <td class="text-center" style="width: 150px">
                                        <select name="assesments[{{ $report->id }}][extra_1_score]"
                                            class="form-control">
                                            <option value="{{ $report->extra_1_score }}">{{
                                                $report->extra_1_score }}</option>
                                            <option value="E">E</option>
                                            <option value="G">G</option>
                                            <option value="S">S</option>
                                            <option value="N">N</option>
                                        </select>
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <select name="assesments[{{ $report->id }}][extra_2]" class="form-control">
                                            <option value="{{ $report->extra_2 }}">{{
                                                $report->extra_2 }}</option>
                                            <option value="Dance">Dance</option>
                                            <option value="Pencak Silat">Pencak Silat</option>
                                            <option value="Football">Football</option>
                                            <option value="Basketball">Basketball</option>
                                            <option value="Science Club">Science Club</option>
                                            <option value="Board Games">Board Games</option>
                                        </select>
                                    </td>


                                    <td class="text-center" style="width: 150px">
                                        <select name="assesments[{{ $report->id }}][extra_2_score]"
                                            class="form-control">
                                            <option value="{{ $report->extra_2_score }}">{{
                                                $report->extra_2_score }}</option>
                                            <option value="E">E</option>
                                            <option value="G">G</option>
                                            <option value="S">S</option>
                                            <option value="N">N</option>
                                        </select>
                                    </td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">No data available</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const inputs = document.querySelectorAll('.form-control');

        inputs.forEach(input => {

            input.addEventListener('paste', function (e) {

                e.preventDefault();

                const clipboardData = e.clipboardData || window.clipboardData;
                const text = clipboardData.getData('text');

                // Ambil data dari clipboard
                const values = text
                    .split(/\r?\n/)
                    .map(value => value.trim())
                    .filter(value => value !== '');

                // Cari posisi input yang sedang aktif
                const currentRow = this.closest('tr');

                if (!currentRow) {
                    return;
                }

                // Cari index kolom input
                const currentInput = this;

                // Ambil semua row
                const rows = Array.from(
                    document.querySelectorAll('tbody tr')
                );

                // Posisi row saat ini
                let rowIndex = rows.indexOf(currentRow);

                // Untuk setiap value dari clipboard
                values.forEach(value => {

                    if (rowIndex >= rows.length) {
                        return;
                    }

                    // Cari input dengan posisi kolom yang sama
                    const targetRow = rows[rowIndex];

                    const inputsInRow = Array.from(
                        targetRow.querySelectorAll('.form-control')
                    );

                    const inputsInCurrentRow = Array.from(
                        currentRow.querySelectorAll('.form-control')
                    );

                    const columnIndex = inputsInCurrentRow.indexOf(currentInput);

                    if (
                        columnIndex !== -1 &&
                        inputsInRow[columnIndex]
                    ) {
                        inputsInRow[columnIndex].value = value;

                        // Trigger event input
                        inputsInRow[columnIndex].dispatchEvent(
                            new Event('input', {
                                bubbles: true
                            })
                        );
                    }

                    rowIndex++;
                });

            });

        });

    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const table = document.getElementById("table");

    table.addEventListener("input", function(e) {
        if (e.target.classList.contains("concept-input") ||
            e.target.classList.contains("demonstrate-input")) {

            const row = e.target.closest("tr");
            const concept = parseFloat(row.querySelector(".concept-input").value) || 0;
            const demonstrate = parseFloat(row.querySelector(".demonstrate-input").value) || 0;
            console.log(concept, demonstrate);
            const total = concept + demonstrate;
            const avg = total / 2;

            row.querySelector(".total-cell").textContent = total;
            row.querySelector(".avg-cell").textContent = avg.toFixed(2); // 2 angka desimal
        }
    });
});
</script>
