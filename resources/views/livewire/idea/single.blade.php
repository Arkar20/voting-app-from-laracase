<div>
  
        {{-- start of single idea  --}}
        <div class="idea-container max-width-100 bg-white rounded-md  shadow-lg flex py-6">
               
                  <a href="#" class="px-4 flex-none">
                            <img 
                                class=" w-14 h-14 rounded-full"
                                src='https://avataaars.io/?avatarStyle=Circle&topType=ShortHairTheCaesarSidePart&accessoriesType=Sunglasses&hairColor=BrownDark&facialHairType=BeardMajestic&facialHairColor=BrownDark&clotheType=ShirtScoopNeck&clotheColor=Gray01&eyeType=Side&eyebrowType=RaisedExcited&mouthType=Twinkle&skinColor=Light'/>
                        </a>
                <div class="flex-col">
                    <div class="flex  ">
                      
                        <div class="">
                            <p class="font-semibold text-3xl">{{$idea->title}}</p>
                            @can('view',$idea)
                                <span class="text-xs text-red-400">Span Reports : {{$idea->spam_count}}</span>
                            @endcan
                            <p class="mt-3 line-clamp-3">
                                {{$idea->desc}}
                            </p>
                        </div>
                    </div>
                    <div class="flex w-full justify-between mt-10 md:mx-2 mx-1 ">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="hidden md:block font-bold text-gray-900">John Doe</div>
                                <div class="hidden md:block">&bull;</div>
                                <div>{{$idea->created_at->diffForHumans()}}</div>
                                <div>&bull;</div>
                                <div>{{$idea->category->name}}</div>
                                <div>&bull;</div>
                                <div class="text-gray-900">{{$idea->comments_count}} Comments</div>
                        </div>
                          <div class="mx-4 h-100 flex items-center align-bottom space-x-3">
                              <button class=" {{$idea->status->getClasses()}} w-24 rounded-3xl h-8  text-xs text-white   transition ease-in duration-400">
                                    {{$idea->status->name}}</button>
                                </button>
                                         <button
                                            x-data="{openSideMenu:false}"
                                 @click="openSideMenu = ! openSideMenu"
                                class="relative w-10 h-8 z-10 rounded-3xl flex justify-center items-center transition duration-150 text-xs bg-gray-300 hover:bg-gray-400">
                                        <svg  xmlns="http://www.w3.org/2000/svg" width="15" height="4" viewBox="0 0 27 6">
                                            <g id="Icon_feather-more-horizontal" data-name="Icon feather-more-horizontal" transform="translate(-4.5 -15)">
                                                <path id="Path_2" data-name="Path 2" d="M19.5,18A1.5,1.5,0,1,1,18,16.5,1.5,1.5,0,0,1,19.5,18Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                                <path id="Path_3" data-name="Path 3" d="M30,18a1.5,1.5,0,1,1-1.5-1.5A1.5,1.5,0,0,1,30,18Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                                <path id="Path_4" data-name="Path 4" d="M9,18a1.5,1.5,0,1,1-1.5-1.5A1.5,1.5,0,0,1,9,18Z" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                            </g>
                                          </svg>
                                          {{-- start of popup     --}}
                                          <div 
                                          x-cloak  
                                            x-show.transition.top.left.duration.200ms="openSideMenu"
                                            @click.away="openSideMenu = ! openSideMenu"
                                            @keydown.escape.window="openSideMenu =  false"
                                          class="w-40 absolute bg-white shadow-md ml-0 mr-20 top-10 md:mr-0 md:ml-40">
                                              <ul>
                                                @can('update',$idea)
                                                    <li 
                                                        class="p-3 hover:bg-gray-100"
                                                        x-data
                                                        @click="$dispatch('foo')"
                                                        >
                                                        Edit The Idea
                                                    </li>
                                                @endcan       
                                                @can('delete',$idea) 
                                                  <li
                                                         x-data
                                                        @click="$dispatch('ideadeleted')"
                                                      class="p-3 hover:bg-gray-100 hover:text-red-600">Delete The Idea</li>
                                                    
                                                @endcan

                                                @can('view',$idea)
                                                     <li 
                                                     x-data 
                                                     @click="$dispatch('markasspam')"
                                                     class="p-3 hover:bg-gray-100">Mark Spam</li>
                                                @endcan

                                                @can('viewAny',$idea)
                                                     <li 
                                                     x-data 
                                                     @click="$dispatch('unmarkasspam')"
                                                     class="p-3 hover:bg-gray-100">Unmark As Spam</li>
                                                @endcan
                                                    
                                              </ul>
                                          </div>
                                          
                                          {{-- end of popup     --}}

                                </button>
                          </div>
                    </div>
                </div>

                 {{-- end of buttons --}}
        {{-- idea edit modal  --}}
                <livewire:idea.idea-edit-model :idea="$idea"/>
        {{-- idea edit modal  --}}

        {{-- idea delete modal  --}}
                <livewire:idea.idea-delete-modal :idea="$idea"/>
                {{-- idea spam modal  --}}  
                
                {{-- idea delete modal  --}}
                <livewire:idea.idea-mark-as-spam :idea="$idea"/>
                {{-- idea spam modal  --}}


                <livewire:idea.idea-unmark-as-spam :idea="$idea" />
            </div>

        {{-- end of single idea  --}}

       

      
        

        {{-- start of buttons --}}
            <div class="buttons-section w-full flex justify-between mt-4   ">
                <div class="left ">
                    <div class="flex space-x-1">
                        <div 
                        class="relative">
                                    <button
                                             x-data
                                            @click="$dispatch('opencommentbox')"
                                            type="submit"
                                            class="flex items-center w-12 md:w-full  justify-center h-11 text-xs bg-blue-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                                        >
                                     <span class="ml-1">Reply</span>
                                 </button>
                                 {{-- start of comment section  --}}
                                 <livewire:idea.idea-comment :idea="$idea"/>
                                 {{--end of  comment section  --}}
                        </div>
                        {{-- status component  --}}
                        @if (auth()->check() && auth()->user()->isAdmin())
                            <livewire:idea.idea-set-status  :idea="$idea"/>
                        @endif
                        {{-- status component  --}}
                    </div>
                </div>
                <div class="right-btngp ">
                   <div class="flex justify-center items-center h-full space-x-2">
                        <button class="bg-gray-200 py-1 px-4 rounded-2xl flex flex-col items-center">
                            <span class="leading-none text-xl">{{$votes_count}}</span>
                            <span class="leading-none text-sm">votes</span>
                        </button>
                      <button 
                    wire:click.prevent="handleVote"
                    class="w-20 px-3 py-4 {{$hasVoted?'bg-blue-400 text-white':'bg-gray-200 text-gray-600'}}  font-weight-bold border border-gray-200 hover:border-gray-400 transition duration-150 ease-in uppercase rounded-xl">Vote</button>
                  </div>
                   </div>
                </div>
            </div>
        
</div>
