@extends('primaryteacher.layout')

@section('content')

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

                <form action="{{ route('primary_teacher.assesment_record.update_all') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn btn-primary mb-2"><i class="ti ti-pencil"></i> Update</button>

                    <div class="table-responsive">
                        <table style="font-size: 12px"
                            class="table table-bordered search-table align-middle text-nowrap" id="table">
                            <thead class="header-item text-center">
                                <tr class="text-uppercase">
                                    <th>NO.</th>
                                    <th>NAME OF STUDENT</th>
                                    <th>UNDERSTANDING <br> CONCEPT</th>
                                    <th>Demonstrates <br> neatness in <br> writing</th>
                                    <th>Writes with <br> fluency</th>
                                    <th>Reads <br> accurately with <br> understanding</th>
                                    <th>Listens with <br> understanding</th>
                                    <th>Expresses <br> ideas when <br> speaking</th>
                                    <th>TOTAL</th>
                                    <th>AVG</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($assesments as $assesment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $assesment->name }}</td>
                                    <td style="width: 150px" class="text-center" style="width: 150px">
                                        <input type="number" class="form-control text-center concept-input"
                                            name="assesments[{{ $assesment->id }}][concept]"
                                            value="{{ $assesment->concept }}">
                                    </td>
                                    <td class="text-center" style="width: 150px">
                                        <input type="number"
                                            class="form-control text-center lang_neatness_in_writing-input"
                                            name="assesments[{{ $assesment->id }}][lang_neatness_in_writing]"
                                            value="{{ $assesment->lang_neatness_in_writing }}">
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <input type="number"
                                            class="form-control text-center lang_writes_with_fluency-input"
                                            name="assesments[{{ $assesment->id }}][lang_writes_with_fluency]"
                                            value="{{ $assesment->lang_writes_with_fluency }}">
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <input type="number"
                                            class="form-control text-center lang_reads_accurately-input"
                                            name="assesments[{{ $assesment->id }}][lang_reads_accurately]"
                                            value="{{ $assesment->lang_reads_accurately }}">
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <input type="number"
                                            class="form-control text-center lang_listen_with_understanding-input"
                                            name="assesments[{{ $assesment->id }}][lang_listen_with_understanding]"
                                            value="{{ $assesment->lang_listen_with_understanding }}">
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <input type="number" class="form-control text-center lang_expresses_ideas-input"
                                            name="assesments[{{ $assesment->id }}][lang_expresses_ideas]"
                                            value="{{ $assesment->lang_expresses_ideas }}">
                                    </td>

                                    <td class="text-center total-cell" style="width: 150px">
                                        {{ $assesment->concept + $assesment->lang_neatness_in_writing +
                                        $assesment->lang_writes_with_fluency + $assesment->lang_reads_accurately +
                                        $assesment->lang_expresses_ideas +
                                        $assesment->lang_listen_with_understanding }}
                                    </td>


                                    <td class="text-center avg-cell" style="width: 150px">
                                        {{ round(($assesment->concept + $assesment->lang_neatness_in_writing +
                                        $assesment->lang_writes_with_fluency + $assesment->lang_reads_accurately +
                                        $assesment->lang_expresses_ideas +
                                        $assesment->lang_listen_with_understanding) / 6) }}
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
    document.addEventListener("DOMContentLoaded", function() {
    const table = document.getElementById("table");

    table.addEventListener("input", function(e) {
        if (e.target.classList.contains("concept-input") ||
            e.target.classList.contains("lang_neatness_in_writing-input") ||
            e.target.classList.contains("lang_writes_with_fluency-input") ||
            e.target.classList.contains("lang_reads_accurately-input") ||
            e.target.classList.contains("lang_expresses_ideas-input") ||
            e.target.classList.contains("lang_listen_with_understanding-input")

        ){

            const row = e.target.closest("tr");
            const concept = parseFloat(row.querySelector(".concept-input").value) || 0;
            const lang_neatness_in_writing = parseFloat(row.querySelector(".lang_neatness_in_writing-input").value) || 0;
            const lang_writes_with_fluency = parseFloat(row.querySelector(".lang_writes_with_fluency-input").value) || 0;
            const lang_reads_accurately = parseFloat(row.querySelector(".lang_reads_accurately-input").value) || 0;
            const lang_expresses_ideas = parseFloat(row.querySelector(".lang_expresses_ideas-input").value) || 0;
            const lang_listen_with_understanding = parseFloat(row.querySelector(".lang_listen_with_understanding-input").value) || 0;

            console.log(concept, lang_neatness_in_writing, lang_writes_with_fluency, lang_reads_accurately, lang_expresses_ideas, lang_listen_with_understanding);
            const total = concept + lang_neatness_in_writing + lang_writes_with_fluency + lang_reads_accurately + lang_expresses_ideas + lang_listen_with_understanding;
            const avg = Math.round(total / 6);

            row.querySelector(".total-cell").textContent = total;
            row.querySelector(".avg-cell").textContent = avg; // 2 angka desimal
        }
    });
});
</script>

@endsection
