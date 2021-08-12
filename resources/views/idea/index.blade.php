<x-app-layout>
     {{-- start of filter --}}
     <div class="filters flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-6">
        <div class="w-full md:w-1/3">
            <select name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Category One">Category One</option>
                <option value="Category Two">Category Two</option>
                <option value="Category Three">Category Three</option>
                <option value="Category Four">Category Four</option>
            </select>
        </div>
        <div class="w-full md:w-1/3">
            <select name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                <option value="Filter One">Filter One</option>
                <option value="Filter Two">Filter Two</option>
                <option value="Filter Three">Filter Three</option>
                <option value="Filter Four">Filter Four</option>
            </select>
        </div>
        <div class="w-full md:w-2/3 relative">
            <input type="search" placeholder="Find an idea" class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">
            <div class="absolute top-0 flex itmes-center h-full ml-2">
                <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>
     {{-- end of filter --}}


     {{-- start of ideas cards --}}
        <div class="ideas-container space-y-6 my-4">
            @foreach ($ideas as $idea)
            {{-- start of single card --}}
            <div class="idea-container max-width-100 bg-white rounded-md  shadow-lg flex py-6 relative">
                <div class="hidden md:block w-20 flex-col md:ml-10 mt-6">
                   <p class="text-center uppercase text-2xl">12 </p>
                   <p class="text-center uppercase text-gray-400 text-md">Votes</p>
                  <div class="mt-12 text-center">
                    <button class="w-20 px-3 py-4 bg-gray-200 font-weight-bold border border-gray-200 hover:border-gray-400 transition duration-150 ease-in uppercase rounded-xl">Vote</button>
                  </div>
                </div>
                  <a href="#" class="px-4 flex-none">
                            <img 
                                class=" w-14 h-14 rounded-full"
                                src='https://avataaars.io/?avatarStyle=Circle&topType=ShortHairTheCaesarSidePart&accessoriesType=Sunglasses&hairColor=BrownDark&facialHairType=BeardMajestic&facialHairColor=BrownDark&clotheType=ShirtScoopNeck&clotheColor=Gray01&eyeType=Side&eyebrowType=RaisedExcited&mouthType=Twinkle&skinColor=Light'/>
                        </a>
                <div class="flex-col w-full">
                      <div>
                          <a href="{{route('idea.show',$idea->slug)}}" class="font-semibold text:2xl md:text-3xl">{{$idea->title}}</a>
                          <p class="mt-3 line-clamp-3">
                                 {{$idea->desc}}  
                        </p>
                      </div>
                    
                    <div class="flex-col md:flex-row justify-between mt-4 md:mt-10   ">
                        <div>
                            <div class="flex my-3 space-x-4">
                                  <p class=" rounded-3xl  text-gray-600 text-xs">{{$idea->created_at->diffForHumans()}}</p>
                                    <p class="  text-gray-600 text-xs">&bull;</p>
                                  <p class=" rounded-3xl  text-gray-600 text-xs">Category</p>
                                    <p class="  text-gray-600 text-xs">&bull;</p>
                                  <p class=" rounded-3xl  text-gray-800 text-xs">3 comments</p>
                            </div>
                        </div>
                          <div class="flex items-center h-full space-x-1" 
                                   
                                x-data="{ openSideMenu: false }"

                          >
                          <div class="block md:hidden spacing-x-3 border border-gray-200 ">
                             <p class="text-center uppercase text-lg leading-none">12 </p>
                             <p class="text-center uppercase text-3xs text-gray-500 leading-none">Votes </p>
                          </div>
                          <div class="block md:hidden spacing-x-3 border border-gray-200 ">
                                     <button class=" p-2 bg-gray-200 font-weight-bold border border-gray-200 hover:border-gray-400 transition duration-150 ease-in uppercase rounded-xl">Vote</button>

                          </div>
                                <button class="w-20 rounded-3xl h-8  text-xs bg-gray-300 hover:text-white hover:bg-green-500 transition ease-in duration-400">Open</button>
                                <button
                                @click="openSideMenu = ! openSideMenu"
                                class="relative w-10 h-8 rounded-3xl flex justify-center items-center transition duration-150 text-xs bg-gray-300 hover:bg-gray-400">
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
                                                  <li class="p-3 hover:bg-gray-100">Lock The Idea</li>
                                                  <li class="p-3 hover:bg-gray-100 hover:text-red-600">Delete The Idea</li>
                                              </ul>
                                          </div>
                                          
                                          {{-- end of popup     --}}

                                </button>
                          </div>
                    </div>
                </div>
            </div>
            {{-- end of single card --}}
        @endforeach
            
        </div>
     {{-- end of ideas cards --}}


</x-app-layout>