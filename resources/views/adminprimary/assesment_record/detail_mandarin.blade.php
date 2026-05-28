@extends('adminprimary.layout')

@section('content')

<style>
    .table-responsive {
        height: 500px;
    }
</style>

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">{{ $title }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted " href="./index.html">{{ $path }}</a></li>
                            <li class="breadcrumb-item" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-content searchable-container list">

        <div class="card">

            <div class="card-body">

                <table class="mb-5" style="width:100%">
                    <tr>
                        <th>Subject</th>
                        <th>: {{ $subject->subject }}</th>

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

                <a href="{{ route('admin_primary.assesment_record') }}" class="btn btn-primary mb-2"><i
                        class="ti ti-arrow-left"></i>
                    Back</a>

                <div class="table-responsive">
                    <table style="font-size: 12px"
                        class="table table-bordered table-bordered search-table align-middle text-nowrap" id="table">
                        <thead class="header-item text-center">
                            <tr class="text-uppercase">
                                <th>NO.</th>
                                <th>NAME OF STUDENT</th>
                                <th>Understands <br> vocabulary and <br> grammar</th>
                                <th>Writes <br> characters with <br> correct stroke</th>
                                <th>Neatness and <br> cleanliness</th>
                                <th>Correct intonation <br> and pronunciation</th>
                                <th>Reads fluently</th>
                                <th>Is able to <br> transfer the words <br> listened into <br> written form</th>
                                <th>Is able to <br> pronounce word <br> properly</th>
                                <th>TOTAL</th>
                                <th>AVG</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($assesments as $assesment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $assesment->name }}</td>
                                <td style="width: 150px" class="text-center" style="width: 150px">{{
                                    $assesment->mandarin_understands_vocabulary }}
                                </td>

                                <td class="text-center" style="width: 150px">{{ $assesment->mandarin_writes_characters
                                    }}
                                </td>

                                <td class="text-center" style="width: 150px">{{ $assesment->mandarin_neatness }}
                                </td>

                                <td class="text-center" style="width: 150px">{{ $assesment->mandarin_correct_intonation
                                    }}</td>

                                <td class="text-center" style="width: 150px">{{ $assesment->mandarin_reads_fluently }}
                                </td>

                                <td class="text-center" style="width: 150px">{{
                                    $assesment->mandarin_able_to_transfer_the_words }}</td>

                                <td class="text-center" style="width: 150px">{{ $assesment->mandarin_able_to_pronounce
                                    }}</td>

                                <td class="text-center total-cell" style="width: 150px">
                                    {{
                                    $assesment->mandarin_understands_vocabulary +
                                    $assesment->mandarin_reads_fluently +
                                    $assesment->mandarin_writes_characters +
                                    $assesment->mandarin_neatness +
                                    $assesment->mandarin_correct_intonation +
                                    $assesment->mandarin_able_to_transfer_the_words +
                                    $assesment->mandarin_able_to_pronounce
                                    }}
                                </td>


                                <td class="text-center avg-cell fw-bolder" style="width: 150px">
                                    {{ round(($assesment->mandarin_understands_vocabulary +
                                    $assesment->mandarin_reads_fluently +
                                    $assesment->mandarin_writes_characters +
                                    $assesment->mandarin_neatness +
                                    $assesment->mandarin_correct_intonation +
                                    $assesment->mandarin_able_to_transfer_the_words +
                                    $assesment->mandarin_able_to_pronounce) / 7) }}
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

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const table = document.getElementById("table");

    table.addEventListener("input", function(e) {
        if (e.target.classList.contains("mandarin_understands_vocabulary-input") ||
            e.target.classList.contains("mandarin_reads_fluently-input") ||
            e.target.classList.contains("mandarin_writes_characters-input") ||
            e.target.classList.contains("mandarin_neatness-input") ||
            e.target.classList.contains("mandarin_correct_intonation-input") ||
            e.target.classList.contains("mandarin_able_to_transfer_the_words-input") ||
            e.target.classList.contains("mandarin_able_to_pronounce-input")
        ){

            const row = e.target.closest("tr");
            const mandarin_understands_vocabulary = parseFloat(row.querySelector(".mandarin_understands_vocabulary-input").value) || 0;
            const mandarin_reads_fluently = parseFloat(row.querySelector(".mandarin_reads_fluently-input").value) || 0;
            const mandarin_writes_characters = parseFloat(row.querySelector(".mandarin_writes_characters-input").value) || 0;
            const mandarin_neatness = parseFloat(row.querySelector(".mandarin_neatness-input").value) || 0;
            const mandarin_correct_intonation = parseFloat(row.querySelector(".mandarin_correct_intonation-input").value) || 0;
            const mandarin_able_to_transfer_the_words = parseFloat(row.querySelector(".mandarin_able_to_transfer_the_words-input").value) || 0;
            const mandarin_able_to_pronounce = parseFloat(row.querySelector(".mandarin_able_to_pronounce-input").value) || 0;

            console.log(mandarin_understands_vocabulary, mandarin_reads_fluently, mandarin_writes_characters, mandarin_neatness, mandarin_correct_intonation, mandarin_able_to_transfer_the_words, mandarin_able_to_pronounce);
            const total = mandarin_understands_vocabulary + mandarin_reads_fluently + mandarin_writes_characters + mandarin_neatness + mandarin_correct_intonation + mandarin_able_to_transfer_the_words + mandarin_able_to_pronounce;
            const avg = Math.round(total / 7);

            row.querySelector(".total-cell").textContent = total;
            row.querySelector(".avg-cell").textContent = avg; // 2 angka desimal
        }
    });
});
</script>

@endsection
