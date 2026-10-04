<div class="dropdown">
    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        Assessment List
    </button>
    <ul class="dropdown-menu">
        @if(session('role') == 'hsadmin')
        <li><a class="dropdown-item" href="{{ route('high_school.internal_report.accumulated', $class) }}">Internal Accumulated</a></li>
        @endif
        @foreach ($assessmentLists as $list)
        <li><a class="dropdown-item" href="{{ route('high_school.assessment_record.input', $list->id) }}">{{
                $list->class }}
                - {{ $list->subject }}</a></li>
        @endforeach
    </ul>
</div>
