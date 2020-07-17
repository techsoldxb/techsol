<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />


<link rel="stylesheet" href="{{asset('css/app.css')}}">

<div  style="text-align:right">

    <a class="btn btn-primary btn-sm" href="{{ URL::previous() }}"> Back    </a>

</div>

<div style="text-align:center">
    <img src={{asset('dist/img/tclogo1.png')}}>
</div>



<h3 style="text-align:center">Service Center Calendar</h3>

<div id='calendar'></div>



<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($jobcard as $jobcard)
                {
                    title : '{{ $jobcard->job_enq_number }}-{{ $jobcard->job_item_type }}-{{ $jobcard->job_status_name }}',
                    start : '{{ $jobcard->job_enq_date }}',
                    url : '{{ route('job.jobcard.show', $jobcard->id) }}'
                    
                    
                },
                @endforeach
            ]
        })
    });
</script>