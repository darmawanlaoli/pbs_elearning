@extends('adminprimary.layout')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
    
    <p class="text-center">
      <a class="btn btn-primary" data-bs-toggle="collapse" href="#rankingTable" role="button" aria-expanded="false" aria-controls="collapseExample">
        Ranking
      </a>
      <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#rankingGraphic" aria-expanded="false" aria-controls="collapseExample">
        Ranking Graphic
      </button>
    </p>
    
    <div class="collapse" id="rankingTable">
        <div class="widget-content searchable-container list">

        <div class="card col-md-12 col-lg-12 mx-auto">
            <div class="card-body">
                
                <b>Class: {{$class->homeroom_class}}</b>
                
                <table class="table table-striped table-bordered">
                    <tr class="text-center">
                        <th>Rank</th>
                        <th>Student's Name</th>
                        <th>Total Score</th>
                        <th>AVG</th>
                    </tr>

                    @foreach ($ranks as $rank)
                    <?php
                        $grade = substr($class->homeroom_class, 0, 2);
                        
                        if($grade == 'P1' || $grade == 'P2' || $grade == 'P4' ||  $grade == 'P6'){
                            $point = 37;
                        }elseif($grade == 'P3') {
                            $point = 39;
                        }elseif($grade == 'P5'){
                            $point = 38;
                        }else{
                            $point = 37;
                        }
                        
                    ?>
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $rank->name }}</td>
                        <td class="text-center">{{ round($rank->total_score) }}</td>
                        <td class="text-center">{{ round($rank->total_score/$point,2) }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>


        </div>
    </div>
    </div>
    
    <div class="collapse" id="rankingGraphic">
        <canvas id="rankChart" height="100"></canvas>
    </div>
    
    <script>
        const ctx = document.getElementById('rankChart').getContext('2d');

        const chart = new Chart(ctx, {
            type: 'bar', // bisa 'line', 'bar', 'radar'
            data: {
                labels: @json($ranks->pluck('name')), // sumbu X = nama siswa
                datasets: [{
                    label: 'Total Score',
                    data: @json($ranks->pluck('total_score')), // sumbu Y = skor
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 10
                        }
                    }
                }
            }
        });
    </script>
    
    
</div>

    @endsection