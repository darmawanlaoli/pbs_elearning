@extends('primaryteacher.layout')

@section('content')

<style>
    .report-container {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif
    }

    table,
    td,
    th {
        border: 1px solid;
        padding: 3px 15px;
    }

    table {
        border-collapse: collapse;
        table-layout: fixed;
        width: 100%;
    }

    .subject {
        font-size: 16px;
    }

    .header {
        background-color: #FCD5B4;
        font-weight: bold;
        text-align: center;
        color: black;
    }
</style>

<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">{{ session('homeroom_class').' '.$title }}</h4>
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

        <div class="card mb-3 col-md-6 col-lg-6 mx-auto">
            <div class="card-body">

                <form action="" method="GET">
                    @csrf
                    <div class="input-group">
                        <select name="student" id="" class="form-control">
                            <option value="">Select Student</option>
                            @foreach ($students as $student)
                            <option value="{{ $student->name }}" {{ request('student')==$student->name ? 'selected' : ''
                                }}>
                                {{ $student->name }}
                            </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-secondary" type="button" id="button-addon2"><i
                                class="ti ti-eye"></i>
                            Show</button>
                        <button class="btn btn-primary" type="button" id="button-addon2"><i class="ti ti-printer"></i>
                            Print</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="card">

            <div class="card-body report-container">

                @if ($assesments)

                <?php
                    //character building
                    $cb_concept = $characterBuilding->concept;
                    $cb_demonstrate = $characterBuilding->demonstrate;
                    $cb_mean = ($cb_concept + $cb_demonstrate) / 2;
                ?>

                <img style="margin: auto; display: block; width: 100px"
                    src="https://elearning.peachblossomsschool.sch.id/assets/images/logos/logo.png" alt="">

                <h2 class="text-center mt-2 mb-5"><b>PROGRESS REPORT CARD <br> SEMESTER I <br> ACADEMIC YEAR
                        2025/2026</b>
                </h2>

                <table class="mt-3">
                    <tr>
                        <th style="width: 700px" rowspan="2" class="subject header">CHARACTER BUILDING</th>
                        <th colspan="2" class="header">TERM 1</th>
                    </tr>

                    <tr>
                        <th class="header">SCORE</th>
                        <th class="header">MEAN</th>
                    </tr>

                    <tr>
                        <td rowspan="2">Understands Concept</td>
                        <td class="text-center">{{ $cb_concept }}</td>
                        <td class="text-center">2</td>
                    </tr>

                    <tr class="text-center">
                        <td colspan="2">B</td>
                    </tr>

                    <tr>
                        <td rowspan="2">Demonstrates the knowledge of subject matter</td>
                        <td class="text-center">{{ $cb_demonstrate }}</td>
                        <td class="text-center">4</td>
                    </tr>

                    <tr class="text-center">
                        <td colspan="2">B</td>
                    </tr>
                </table>

                @else
                <div class="text-center h5"><i>Please select a student</i></div>
                @endif
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            @foreach($records as $subject => $rows)
            <table>
                <tr>
                    <th colspan="3">{{ strtoupper($subject) }}</th>
                </tr>
                <tr>
                    <th>Indicator</th>
                    <th>Score</th>
                    <th>Mean</th>
                </tr>
                @foreach(['concept','demonstrate','understand_rules','locomotors_movement'] as $indicator)
                @php
                $score = $rows->first()->$indicator;
                $meanField = "mean_" . $indicator;
                @endphp

                @if($score !== null)
                <tr>
                    <td>{{ ucwords(str_replace('_', ' ', $indicator)) }}</td>
                    <td>{{ $score }}</td>
                    <td>{{ isset($means[$subject]) ? number_format($means[$subject]->$meanField, 2) : '-' }}</td>
                </tr>
                @endif
                @endforeach
            </table>
            @endforeach
        </div>
    </div>
</div>

@endsection
