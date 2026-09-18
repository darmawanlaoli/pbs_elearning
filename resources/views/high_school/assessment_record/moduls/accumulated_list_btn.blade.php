<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Accumulated List
    </button>
    <ul class="dropdown-menu">
        @foreach ($classes as $class)
        <li><a class="dropdown-item" href="{{ route('high_school.internal_report.accumulated', $class->class) }}">{{ $class->class }}</a></li>
        @endforeach
    </ul>
</div>
