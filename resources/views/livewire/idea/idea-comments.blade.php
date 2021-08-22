 {{-- start of singel reply   --}}
 <div
 x-data 
            x-init=" 
        Livewire.hook('message.processed', (message, component) => {
                   
             {{--On commented--}}
            if(message.component.fingerprint.name==='idea.idea-comments' 
                        && 
                        message.updateQueue[0].payload.event==='commented'
                    )
                    {
                         commentsection = document.querySelector('.reply-section:nth-last-child(2)')
                          console.log(commentsection)
                         commentsection.scrollIntoView({behavior:'smooth'})
                            commentsection.classList.add('bg-green-100')
                            setTimeout(()=>{
                        commentsection.classList.remove('bg-green-100')
                            },3000)
                    }
                    
                            {{--Pagiantion--}}
                            if(
                                ['gotoPage','previousPage','nextPage'].includes(message.updateQueue[0].payload.method)
                             ){

                                  firstcomment = document.querySelector('.reply-section:first-child')
                                 firstcomment.scrollIntoView({behavior:'smooth'})
                                  
                                
                                
                                }
                        
            })

                @if(session('scrollToComment'))
                      commentToScroll = document.querySelector('#comment-{{session('scrollToComment')}}');
                        console.log(commentToScroll);
                          commentToScroll.scrollIntoView({behavior:'smooth'})
                            commentToScroll.classList.add('bg-green-100')
                            setTimeout(()=>{
                        commentToScroll.classList.remove('bg-green-100')
                            },3000)
                @endif
      
                     "
 >
<div 

   
>
    @foreach ($comments as $comment) 
         <livewire:idea.idea-single-comment :comment="$comment"  :idea="$idea" :key="$comment->id"/>  
        @endforeach
            <div>
                {{$comments->onEachSide(1)->links()}}
            </div>

            <livewire:idea.comment-edit />
            
            <livewire:comment-delete />

</div>
</div>