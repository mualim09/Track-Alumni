@component('mail::message')

Subject : Job Post for the {{ $job_title }} Position

hello {{ $alumni_name }},

Hope you are doing well. This mail is to notify you that you might missed the job opportunity as {{ $job_designation }}.

Thanks,<br>
Admin <br>
University of Information Technology and Sciences<br>


@endcomponent