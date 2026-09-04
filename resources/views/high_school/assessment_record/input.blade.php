<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        * {
            box-sizing: border-box;
        }

        /* Container dengan scroll internal agar sticky berfungsi */
        .table-container {
            max-width: 100%;
            max-height: 80vh;
            /* Tinggi maksimum tabel sebelum scroll muncul */
            overflow: auto;
            /* Mengaktifkan scroll horizontal & vertikal */
            border: 1px solid #ccc;
        }

        table {
            border-collapse: separate;
            /* Ubah dari collapse agar posisi border sticky tidak glitch */
            border-spacing: 0;
            width: 100%;
            white-space: nowrap;
            font-size: 12px;
        }

        th,
        td {
            padding: 2px 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            border-right: 1px solid #ddd;
            background-color: #fff;
        }

        th{
            text-align: center;
            background-color: #0182cd;
            color: white;
        }

        .text-center {
            text-align: center;
        }

        .score-input {
            width: 50px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <form action="{{ route('kindergarten.assessment_record.input_action') }}" method="POST">
            @csrf
            @method('PUT')

            <button type="submit" class="btn btn-primary m-1">Save</button>

            <div class="container-fluid">
                <small>
                    Pada saat menginput assessment record, pastikan tombol "Save" diklik secara berkala
                    agar data tidak hilang.
                    Jika Anda ingin menutup halaman ini, pastikan semua data sudah tersimpan.
                </small>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr class="text-center">
                                <th rowspan="2" style="min-width: 50px;">No</th>
                                <th rowspan="2" style="min-width: 180px;">Student Name</th>
                                <th colspan="7">Knowledge and Understanding</th>
                                <th colspan="4">Demonstrate Knowledge</th>
                            </tr>

                            <tr class="text-center">
                                {{-- knowledge --}}
                                <th>1</th>
                                <th>2</th>
                                <th>3</th>
                                <th>4</th>
                                <th>AVG X 95%</th>
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
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $ass->name }}</td>

                                <td class="text-center">
                                    <input type="number" class="score-input ku-input" data-column="ku1" name="ku1" min="0" max="100" step="0.01">
                                </td>

                                <td class="text-center">
                                    <input type="number" class="score-input ku-input" data-column="ku2" name="ku2" min="0" max="100" step="0.01">
                                </td>

                                <td class="text-center">
                                    <input type="number" class="score-input ku-input" data-column="ku3" name="ku3" min="0" max="100" step="0.01">
                                </td>

                                <td class="text-center">
                                    <input type="number" class="score-input ku-input" data-column="ku4" name="ku4" min="0" max="100" step="0.01">
                                </td>

                                <td class="text-center">
                                    <input type="number" class="score-input avg-input" data-column="avg" name="avg" readonly>
                                </td>

                                <td class="text-center">
                                    <input type="number" class="score-input att-input" data-column="att" name="att" min="0" max="5" step="0.01">
                                </td>

                                <td class="text-center">
                                    <input type="number" class="score-input final-input" data-column="ku_total" name="ku_total" readonly>
                                </td>

                                {{-- DK --}}
                                <td class="text-center">
                                    <input type="number" class="score-input dk-input" data-column="dk1" name="dk1" min="0" max="100" step="0.01">
                                </td>

                                <td class="text-center">
                                    <input type="number" class="score-input dk-avg-input" data-column="dk-avg" name="dk_avg" readonly>
                                </td>

                                <td class="text-center">
                                    <input type="number" class="score-input att-input" data-column="att" name="att" min="0" max="5" step="0.01">
                                </td>

                                <td class="text-center">
                                    <input type="number" class="score-input final-input" data-column="dk_total" name="dk_total" readonly>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

        const inputs = document.querySelectorAll('.score-input');

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
                        targetRow.querySelectorAll('.score-input')
                    );

                    const inputsInCurrentRow = Array.from(
                        currentRow.querySelectorAll('.score-input')
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


    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {

        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {

            const kuInputs = row.querySelectorAll('.ku-input');
            const avgInput = row.querySelector('.avg-input');

            function calculateAverage() {

                let total = 0;
                let count = 0;

                kuInputs.forEach(input => {

                    const value = parseFloat(input.value);

                    if (!isNaN(value)) {
                        total += value;
                        count++;
                    }

                });

                // Jika belum semua KU diisi
                if (count === 0) {
                    avgInput.value = '';
                    return;
                }

                const average = total / count;

                const result = average * 0.95;

                avgInput.value = result.toFixed(2);
            }


            // Jalankan ketika user mengetik
            kuInputs.forEach(input => {

                input.addEventListener('input', calculateAverage);

            });


            // Jalankan perhitungan pertama kali
            calculateAverage();

        });

    });
    </script> --}}


    {{-- cegah maksimal 5 --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

        const attInputs = document.querySelectorAll('.att-input');

        attInputs.forEach(input => {

            input.addEventListener('input', function () {

                let value = parseFloat(this.value);

                if (isNaN(value)) {
                    return;
                }

                // Maksimal 5
                if (value > 5) {
                    this.value = 5;
                }

                // Minimal 0
                if (value < 0) {
                    this.value = 0;
                }

            });

        });

    });
    </script>

    {{-- hitung total --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

        const rows = document.querySelectorAll('tbody tr');

        rows.forEach(row => {

            const kuInputs = row.querySelectorAll('.ku-input');
            const avgInput = row.querySelector('.avg-input');
            const attInput = row.querySelector('.att-input');
            const finalInput = row.querySelector('.final-input');

            const dkInputs = row.querySelectorAll('.dk-input');
            const dkAvg = row.querySelector('.dk-avg');
            const dkAtt = row.querySelector('.dk-att');
            const dkFinal = row.querySelector('.dk-final');



            function calculateScore() {

                let total = 0;
                let count = 0;

                // =================================
                // HITUNG KU YANG TERISI
                // =================================

                kuInputs.forEach(input => {

                    const value = parseFloat(input.value);

                    if (!isNaN(value)) {

                        total += value;
                        count++;

                    }

                });


                // =================================
                // HITUNG AVG X 95%
                // =================================

                if (count > 0) {

                    const average = total / count;

                    const avg95 = average * 0.95;

                    avgInput.value = avg95.toFixed(2);

                } else {

                    avgInput.value = '';

                }


                // =================================
                // VALIDASI ATT
                // =================================

                let att = parseFloat(attInput.value);

                if (isNaN(att)) {
                    att = 0;
                }

                // Maksimal 5
                if (att > 5) {

                    att = 5;
                    attInput.value = 5;

                }

                // Minimal 0
                if (att < 0) {

                    att = 0;
                    attInput.value = 0;

                }


                // =================================
                // HITUNG FINAL SCORE
                // =================================

                if (count > 0) {

                    const avg95 = parseFloat(avgInput.value);

                    const finalScore = avg95 + att;

                    finalInput.value = finalScore.toFixed(2);

                } else {

                    finalInput.value = '';

                }

            }


            // =================================
            // EVENT KU
            // =================================

            kuInputs.forEach(input => {

                input.addEventListener('input', calculateScore);

            });


            // =================================
            // EVENT ATT
            // =================================

            attInput.addEventListener('input', calculateScore);


            // =================================
            // INITIAL CALCULATION
            // =================================

            calculateScore();

        });

    });
    </script>

</body>

</html>
