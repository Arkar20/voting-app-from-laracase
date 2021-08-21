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