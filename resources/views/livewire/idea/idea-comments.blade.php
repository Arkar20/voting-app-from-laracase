 {{-- start of singel reply   --}}
 <div
 x-data 
            x-init=" 
        Livewire.hook('message.processed', (message, component) => {
            console.log(message)
                    if(message.component.fingerprint.name==='idea.idea-comments' 
                        && 
                        message.updateQueue[0].payload.event==='commented'
                    )
                    {
                         commentsection = document.querySelector('.reply-section:nth-last-child(2)')
                     commentsection.scrollIntoView({behavior:'smooth'})
                            commentsection.classList.add('border-green-500')
                            setTimeout(()=>{
                        commentsection.classList.remove('border-green-500')
                            },3000)
                            }
                    
                            if(
                                ['gotoPage','previousPage','nextPage'].includes(message.updateQueue[0].payload.method)
                             ){

                                  firstcomment = document.querySelector('.reply-section:first-child')
                                 firstcomment.scrollIntoView({behavior:'smooth'})
                                  
                                
                                
                                }
                        
            })

            
      
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