<x-app-layout>
    <div>
        {{-- start of naviagation  --}}
               <a href="{{$idea->goBack()}}" class="flex items-center space-x-1">
                    <svg class="w-4 h-4 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                         </svg>
                     <span class="text-lg text-gray-700">
                        Go Back With Previous Filters
                     </span>
               </a>
        {{--end of naviagation  --}}
               
               {{-- single idea livewire section  --}}
               <livewire:idea.single :idea="$idea"/>
               {{-- single idea livewire section  --}}

        {{-- start of replies  --}}
            <div class="ml-12 md:ml-10 replies-section relative flex-col my-8 space-y-6">
               {{-- start of singel reply   --}}
                <div class="reply-section relative flex border border-1 border-gray-300 cursor-pointer   hover:border-green-500 rounded-md shadow-md">
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
                                Aute irure incididunt nisi mollit eu esse quis est est sunt. Ad laboris occaecat minim nostrud id. Ex labore do anim ipsum nulla veniam ut tempor reprehenderit deserunt. Nostrud voluptate mollit cupidatat voluptate. Proident commodo veniam ex ad velit nostrud commodo incididunt laborum non eiusmod cillum. Deserunt laborum ut ullamco elit aliqua ut in.
                            </p>
                        </div>
                    </div>
                    <div class="flex w-full justify-between my-4 mx-2">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="hidden md:block font-bold text-gray-900">John Doe</div>
                            <div class="hidden md:block">&bull;</div>
                            <div>10 hours ago</div>
                      
                          </div>
                         
                    </div>
                </div>
                </div>
               {{-- end of singel reply   --}}
               {{-- start of singel reply   --}}
                <div class="reply-section relative flex border border-1 border-gray-300 cursor-pointer   hover:border-green-500 rounded-md shadow-md">
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
                                Aute irure incididunt nisi mollit eu esse quis est est sunt. Ad laboris occaecat minim nostrud id. Ex labore do anim ipsum nulla veniam ut tempor reprehenderit deserunt. Nostrud voluptate mollit cupidatat voluptate. Proident commodo veniam ex ad velit nostrud commodo incididunt laborum non eiusmod cillum. Deserunt laborum ut ullamco elit aliqua ut in.
                            </p>
                        </div>
                    </div>
                    <div class="flex w-full justify-between my-4 mx-2">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="hidden md:block font-bold text-gray-900">John Doe</div>
                            <div class="hidden md:block">&bull;</div>
                            <div>10 hours ago</div>
                      
                          </div>
                         
                    </div>
                </div>
                </div>
               {{-- end of singel reply   --}}
               {{-- start of singel reply   --}}
                <div class="reply-section isadmin relative flex border border-1 border-gray-300 cursor-pointer   hover:border-green-500 rounded-md shadow-md">
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
                                Aute irure incididunt nisi mollit eu esse quis est est sunt. Ad laboris occaecat minim nostrud id. Ex labore do anim ipsum nulla veniam ut tempor reprehenderit deserunt. Nostrud voluptate mollit cupidatat voluptate. Proident commodo veniam ex ad velit nostrud commodo incididunt laborum non eiusmod cillum. Deserunt laborum ut ullamco elit aliqua ut in.
                            </p>
                        </div>
                    </div>
                    <div class="flex w-full justify-between my-4 mx-2">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="hidden md:block font-bold text-gray-900">Admin</div>
                            <div class="hidden md:block">&bull;</div>
                            <div>10 hours ago</div>
                      
                          </div>
                         
                    </div>
                </div>
                </div>
               {{-- end of singel reply   --}}
               
               

            </div>
        {{-- end of replies  --}}
    </div>
</x-app-layout>