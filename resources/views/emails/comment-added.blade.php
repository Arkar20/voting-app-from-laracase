@component('mail::message')
# New Comment Added To Your Idea

## Your idea {{$comment->idea->title}} has  
**{{$comment->comment}}**



@component('mail::button', ['url' => route('idea.show',$comment->idea)])
Go To Idea
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
