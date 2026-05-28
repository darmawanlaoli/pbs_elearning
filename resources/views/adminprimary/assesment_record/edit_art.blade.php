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

                <form action="{{ route('primary_admin.assesment_record.update_all') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <button type="submit" class="btn btn-primary mb-2"><i class="ti ti-pencil"></i> Save</button>
                    <a href="{{ route('admin_primary.assesment_record') }}" class="btn btn-danger mb-2"><i
                        class="ti ti-arrow-left"></i>
                    Back</a>

                    <div class="table-responsive">
                        <table class="table table-bordered search-table align-middle text-nowrap" id="table">
                            <thead class="header-item text-center">
                                <tr>
                                    <th>NO.</th>
                                    <th>NAME OF STUDENT</th>
                                    <th>FOLLOWED <br> DIRECTION</th>
                                    <th>DISPLAYED NEAT <br> TIDY WORK <br> GOOD CRAFTMANSHIP</th>
                                    <th>FINISH PROJECT <br> COMPLETELY</th>
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
                                        <input type="number"
                                            class="form-control text-center art_followed_direction-input"
                                            name="assesments[{{ $assesment->id }}][art_followed_direction]"
                                            value="{{ $assesment->art_followed_direction }}">
                                    </td>
                                    <td class="text-center" style="width: 150px">
                                        <input type="number" class="form-control text-center art_displayed_neat-input"
                                            name="assesments[{{ $assesment->id }}][art_displayed_neat]"
                                            value="{{ $assesment->art_displayed_neat }}">
                                    </td>

                                    <td class="text-center" style="width: 150px">
                                        <input type="number" class="form-control text-center art_finished_project-input"
                                            name="assesments[{{ $assesment->id }}][art_finished_project]"
                                            value="{{ $assesment->art_finished_project }}">
                                    </td>

                                    <td class="text-center total-cell" style="width: 150px">
                                        {{ $assesment->art_followed_direction + $assesment->art_displayed_neat +
                                        $assesment->art_finished_project }}
                                    </td>
                                    <td class="text-center avg-cell" style="width: 150px">
                                        {{ round(($assesment->art_followed_direction + $assesment->art_displayed_neat +
                                        $assesment->art_finished_project) / 3) }}
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
        if (e.target.classList.contains("art_followed_direction-input") ||
            e.target.classList.contains("art_displayed_neat-input") ||
            e.target.classList.contains("art_finished_project-input"))
            {

            const row = e.target.closest("tr");
            const art_followed_direction = parseFloat(row.querySelector(".art_followed_direction-input").value) || 0;
            const art_displayed_neat = parseFloat(row.querySelector(".art_displayed_neat-input").value) || 0;
            const art_finished_project = parseFloat(row.querySelector(".art_finished_project-input").value) || 0;
            console.log(art_followed_direction, art_displayed_neat, art_finished_project);
            const total = art_followed_direction + art_displayed_neat + art_finished_project;
            const avg = Math.round(total / 3);

            row.querySelector(".total-cell").textContent = total;
            row.querySelector(".avg-cell").textContent = avg; // 2 angka desimal
        }
    });
});
</script>

@endsection