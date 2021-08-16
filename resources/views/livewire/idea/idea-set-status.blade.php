 <div 

                        x-data="{openSideMenu:false}"
                        x-init="
                        
                            window.livewire.on('statusHasChanged',()=>{
                                openSideMenu = false
                            })
                        "
                        class="relative">
                             <button
                                @click="openSideMenu=!openSideMenu"
                                 type="submit"
                                 class="  justify-between h-11 text-xs bg-gray-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                             >
                             <div class="flex space-x-4">
                                 <span class="ml-1">Set Status</span>
                                 <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                 </svg>
                             </div>
                             </button>

                                 <div 
                                        x-cloak  
                                            x-show.transition.top.left.duration.200ms="openSideMenu"
                                            @click.away="openSideMenu = ! openSideMenu"
                                            @keydown.escape.window="openSideMenu =  false"
                                 class="absolute top-10 z-10 bg-white rounded-lg shadow-xl font-normal text-black w-56 py-1 px-2">
                                 <form wire:submit.prevent='statusChange'>
                                 <ul>
                                    @foreach (App\Models\Status::all() as $status)
                                        <li class="py-4 px-2 flex justify-between space-x-4">
                                            <input type="radio" value="{{$status->id}}"  class="text-green-400" wire:model='status' checked="{{$status}}"/>
                                             <span class="w-3/4 text-left">{{$status->name}}</span>
                                        </li>
                                    @endforeach
                                        
                                    </ul>
                                    <textarea name="reply"
                                            class="w-full border border-1 border-gray-200 rounded-lg shadow-md focus:border-green-400 placeholder-gray-200"
                                            rows="3"
                                            placeholder="Add an tag (Optional)"
                                            ></textarea>
                                    <div class="flex justify-between mt-3">
                                                <button class="flex items-center justify-center h-11 text-xs bg-gray-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3">
                                                        Attach
                                                </button>
                                                <button
                                                    type="submit"
                                                    class="flex items-center justify-center h-11 text-xs bg-blue-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                                                >
                                                    <span class="ml-1">Submit</span>
                                                </button>
                                            </div>
                                            <input 
                                            wire:model="notify_voters"
                                            type="checkbox" 
                                            class="m-3"
                                            >Notify All Voters
                                    </form>   
                                    
                                </div>

                             </button>
                        </div>
