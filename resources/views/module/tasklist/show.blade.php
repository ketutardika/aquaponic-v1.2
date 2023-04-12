@extends('layout.master')

@push('plugin-styles')
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
  <style type="text/css"></style>
@endpush

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Task List</a></li>
    <li class="breadcrumb-item active" aria-current="page">Calendar Task List</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <a href="{{ route('tasklist.create') }}" class="btn btn-sm btn-success">
              <i class="fa fa-pencil-alt"></i>
              Create Task List
          </a>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div id='calendar'></div>
      </div>
    </div>
  </div>
</div>

@endsection
@push('plugin-scripts')
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
@endpush

@push('custom-scripts')
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            eventLimit: 3,
            eventDisplay : 'background',
            nextDayThreshold: '09:00:00', 
            displayEventEnd : true,
            events : [
                @foreach($tasklists as $tasklist)
                {
                    title : '{{ $tasklist->tasklist_name }}',
                    start : '{{ $tasklist->start_date }}',
                    end : '{{ $tasklist->end_date }}',
                    url : '{{ route('tasklist.edit', $tasklist->id) }}',
                    className: '',
                    resourceId:'{{ $tasklist->id }}',
                },
                @endforeach
            ]
        })
    });
</script>
@endpush