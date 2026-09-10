@if(session('role') == 'hsteacher')

<a href="{{ route('high_school.assessment_record') }}" class="btn btn-secondary">
    <i class="fa-solid fa-circle-arrow-left"></i> Back
</a>

@else

<a href="{{ route('high_school.internal_report') }}" class="btn btn-secondary">
    <i class="fa-solid fa-circle-arrow-left"></i> Back
</a>

@endif
