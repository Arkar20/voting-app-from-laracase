 <div  
 id="comment-{{$comment->id}}"
 class="reply-section isadmin relative flex border border-1 transition duration-500 cursor-pointer   hover:border-green-500 rounded-md shadow-md">
                    <div class="flex-none">
                    
                        <a href="#" class="px-4 flex-none">
                                <img 
                                    class=" w-14 h-14 rounded-full"
                                    src='https://avataaars.io/?avatarStyle=Circle&topType=ShortHairTheCaesarSidePart&accessoriesType=Sunglasses&hairColor=BrownDark&facialHairType=BeardMajestic&facialHairColor=BrownDark&clotheType=ShirtScoopNeck&clotheColor=Gray01&eyeType=Side&eyebrowType=RaisedExcited&mouthType=Twinkle&skinColor=Light'/>
                            </a>

                    </div>    
                <div class="flex-col w-full">
                    <div class="flex">
                      
                        <div class="py-4 px-2">
                            <p class="mt-3 line-clamp-3">
                                {{$comment->comment}}
                            </p>
                        </div>
                    </div>
                    <div class="flex  justify-between my-4 mx-2">
                        <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                            <div class="hidden md:block font-bold text-gray-900">{{$comment->user->name}}</div>
                            <div class="hidden md:block">&bull;</div>
                                <div class="bg-gray-500 px-2 rounded-lg">author</div>
                                <div class="hidden md:block">&bull;</div>
                            <div>{{$comment->created_at->diffForHumans()}}</div>
                            
                          </div>
                         <div class="mx-4 h-100 flex items-center align-bottom space-x-3">
                              
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
                                                  
                                                  @can('update',$comment)
                                                  <li 
                                                      class="p-3 hover:bg-gray-100"
                                                      x-data
                                                      wire:click="setCommentEditId({{$comment->id}})"
                                                      >
                                                      Edit The Comment
                                                  </li>
                                                  @endcan
                                                  @can('update',$comment)
                                                  <li 
                                                      class="p-3 hover:bg-gray-100"
                                                      x-data
                                                      wire:click="setDeleteComment({{$comment->id}})"
                                                      @click="$dispatch('commentdelete')"
                                                      >
                                                      Delete The Comment
                                                  </li>
                                                  @endcan
                                              </ul>
                                          </div>
                                          
                                          {{-- end of popup     --}}
                                </button>
                          </div>
                         
                    </div>

                </div>

 </div>
               {{-- end of singel reply   --}}