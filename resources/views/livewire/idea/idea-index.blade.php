{{-- start of single card --}}
            <div 
            x-data 
            @click="
                console.log($event.target.tagName.toLowerCase())
                const target=$event.target.tagName.toLowerCase()
                const ignores=['button','svg']

                if(! ignores.includes(target) )
                    $event.target.closest('.idea-text').querySelector('.idea-link').click()
            "
            class="idea-container max-width-100 bg-white rounded-md  shadow-lg flex py-6 relative ">
                <div class="hidden md:block w-20 flex-col md:ml-10 mt-6">
                   <p class="text-center uppercase text-2xl">{{$votes_count}}</p>
                   <p class="text-center uppercase text-gray-400 text-md ">Vote </p>
                  <div class="mt-12 text-center ">
                    <button 
                    wire:click.prevent="handleVote"
                    class="w-20 px-3 py-4 {{$hasVoted?'bg-blue-400 text-white':'bg-gray-200 text-gray-600'}}  font-weight-bold border border-gray-200 hover:border-gray-400 transition duration-150 ease-in uppercase rounded-xl">Vote</button>
                  </div>
                </div>
                  <a href="#" class="px-4 flex-none">
                            <img 
                                class=" w-14 h-14 rounded-full"
                                src='https://avataaars.io/?avatarStyle=Circle&topType=ShortHairTheCaesarSidePart&accessoriesType=Sunglasses&hairColor=BrownDark&facialHairType=BeardMajestic&facialHairColor=BrownDark&clotheType=ShirtScoopNeck&clotheColor=Gray01&eyeType=Side&eyebrowType=RaisedExcited&mouthType=Twinkle&skinColor=Light'/>
                        </a>
                <div class="idea-text flex-col w-full">
                  <div>      
                      <a href="{{route('idea.show',$idea->slug)}}" class="idea-link font-semibold text:2xl md:text-3xl">{{$idea->title}}</a>
                              <p class="mt-3 line-clamp-3">
                                    {{$idea->desc}}  
                            </p>
                      </div>
                    <div class="flex-col md:flex border-3  md:justify-around mt-4 md:mt-10 border-black  ">
                          <div class="flex justify-between px-3 my-3 md:my-0   space-x-4 items-center">
                            <div class="flex justify-between space-x-3 ">
                            <p class=" rounded-3xl  text-gray-600 text-xs">{{$idea->created_at->diffForHumans()}}</p>
                                    <p class="  text-gray-600 text-xs">&bull;</p>
                                  <p class=" rounded-3xl  text-gray-600 text-xs">{{$idea->category->name}}</p>
                                    <p class="  text-gray-600 text-xs">&bull;</p>
                                  <p class=" rounded-3xl  text-gray-800 text-xs">{{$idea->comments_count}} comments</p>
                            </div>
                             <button class="hidden md:block {{$idea->status->getClasses()}} w-20 rounded-3xl h-8  text-xs text-white  hover:text-white hover:bg-green-500 transition ease-in duration-400">
                                    {{$idea->status->name}}</button>
                              </button>
                           
                             </div>
                             
                                  {{-- for mobile  --}}
                          <div class=" md:hidden flex items-center md:justify-between h-full space-x-4 md:space-x-1" >
                          <div class=" spacing-x-3 border border-gray-200 ">
                             <p class="text-center uppercase text-lg leading-none">12 </p>
                             <p class="text-center uppercase text-3xs text-gray-500 leading-none">Voted</p>
                          </div>
                          <div class=" spacing-x-3 border border-gray-200 ">
                                     <button class=" p-2 bg-gray-200 font-weight-bold border border-gray-200 hover:border-gray-400 transition duration-150 ease-in uppercase rounded-xl">Vote</button>

                          </div>
                                <button class=" {{$idea->status->getClasses()}} w-20 rounded-3xl h-8  text-xs text-white  hover:text-white hover:bg-green-500 transition ease-in duration-400">
                                    {{$idea->status->name}}</button>
                                </button>
                                
                          </div>
                            {{-- for mobile  --}}
                           

                    </div>
                    
                 
                </div>
                
            </div>
            {{-- end of single card --}}
