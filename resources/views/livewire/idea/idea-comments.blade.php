 {{-- start of singel reply   --}}
 <div
 x-data 
            x-init=" 
        Livewire.hook('message.processed', (message, component) => {

                    if(message.component.fingerprint.name==='idea.idea-comments')
                    {
                         commentsection = document.querySelector('.reply-section:nth-last-child(2)')
              commentsection.scrollIntoView({behavior:'smooth'})
              commentsection.classList.add('border-green-500')
                    setTimeout(()=>{
                   commentsection.classList.remove('border-green-500')
                    },3000)
                    }
          {{-- if(message.component.fingerprint.name==='idea.idea-comments'))
               {
                    console.log(message)
                } --}}
              {{-- commentsection = document.querySelector('.reply-section:nth-last-child(2)')
              commentsection.scrollIntoView({behavior:'smooth'})
              commentsection.classList.add('bg-green-300') --}}
            })
      
                     "
 >
<div 

   
>
    @foreach ($comments as $comment) 
         <livewire:idea.idea-single-comment :comment="$comment" :idea="$idea" :key="$comment->id"/>  
        @endforeach
            <div>
                {{-- {{$comments->links()}} --}}
            </div>

</div>
</div>