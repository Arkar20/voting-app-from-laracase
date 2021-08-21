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
        <div  class="reply-section isadmin relative flex border border-1 transition duration-500 cursor-pointer   hover:border-green-500 rounded-md shadow-md">
                    <div class="flex-none">
                    
                        <a href="#" class="px-4 flex-none">
                                <img 
                                    class=" w-14 h-14 rounded-full"
                                    src='https://avataaars.io/?avatarStyle=Circle&topType=ShortHairTheCaesarSidePart&accessoriesType=Sunglasses&hairColor=BrownDark&facialHairType=BeardMajestic&facialHairColor=BrownDark&clotheType=ShirtScoopNeck&clotheColor=Gray01&eyeType=Side&eyebrowType=RaisedExcited&mouthType=Twinkle&skinColor=Light'/>
                            </a>

                    </div>    
                <div class="flex-col">
                    <div class="flex">
                      
                        <div class="py-4 px-2">
                            <p class="mt-3 line-clamp-3">
                                {{$comment->comment}}
                            </p>
                        </div>
                    </div>
                    <div class="flex w-full justify-between my-4 mx-2">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="hidden md:block font-bold text-gray-900">{{$comment->user->name}}</div>
                            <div class="hidden md:block">&bull;</div>
                                <div class="bg-gray-500 px-2 rounded-lg">author</div>
                                <div class="hidden md:block">&bull;</div>
                            <div>{{$comment->created_at->diffForHumans()}}</div>
                      
                          </div>
                         
                    </div>
                </div>
 </div>
               {{-- end of singel reply   --}}
        @endforeach
            <div>
                {{$comments->onEachSide(1)->links()}}
            </div>

</div>
</div>