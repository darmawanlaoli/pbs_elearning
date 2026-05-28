@extends('adminprimary.layout')

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

                <a href="{{ route('admin_primary.assesment_record') }}" class="btn btn-primary mb-2"><i
                        class="ti ti-arrow-left"></i>
                    Back</a>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered search-table align-middle text-nowrap" id="table">
                        <thead class="header-item text-center">
                            <tr>
                                <th>NO.</th>
                                <th>NAME OF STUDENT</th>
                                <th>UNDERSTANDING <br> CONCEPT</th>
                                <th>UNDERSTANDING <br> RULES</th>
                                <th>USE VARIETY OF <br> LOCOMOTORS <br> MOVEMENT</th>
                                <th>TOTAL</th>
                                <th>AVG</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($assesments as $assesment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $assesment->name }}</td>
                                <td style="width: 150px" class="text-center" style="width: 150px">{{ $assesment->concept
                                    }}
                                </td>
                                <td class="text-center" style="width: 150px">{{ $assesment->pe_understand_rules }}</td>

                                <td class="text-center" style="width: 150px">{{ $assesment->pe_locomotors_movement }}
                                </td>

                                <td class="text-center total-cell" style="width: 150px">
                                    {{ $assesment->concept + $assesment->pe_locomotors_movement +
                                    $assesment->pe_understand_rules }}
                                </td>
                                <td class="text-center avg-cell" style="width: 150px">
                                    {{ round(($assesment->concept + $assesment->pe_locomotors_movement +
                                    $assesment->pe_understand_rules) / 3) }}
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
        if (e.target.classList.contains("concept-input") ||
            e.target.classList.contains("pe_understand_rules-input") ||
            e.target.classList.contains("pe_locomotors_movement-input")) {

            const row = e.target.closest("tr");
            const concept = parseFloat(row.querySelector(".concept-input").value) || 0;
            const understand_rules = parseFloat(row.querySelector(".pe_understand_rules-input").value) || 0;
            const pe_locomotors_movement = parseFloat(row.querySelector(".pe_locomotors_movement-input").value) || 0;

            console.log(concept, understand_rules, pe_locomotors_movement);
            const total = concept + understand_rules + pe_locomotors_movement;
            const avg = Math.round(total / 3);

            row.querySelector(".total-cell").textContent = total;
            row.querySelector(".avg-cell").textContent = avg; // 2 angka desimal
        }
    });
});
</script>

@endsection
