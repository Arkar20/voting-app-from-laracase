@component('mail::message')
# Idea Status Has Changed.

The Idea you have voted has been updated the status 
to {{$idea->status->name}}.

@component('mail::button', ['url' => route('idea.show',$idea->slug)])
View The Idea
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
