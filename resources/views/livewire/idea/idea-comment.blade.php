<div x-data="{openSideMenu:false}"
    x-init="
            window.livewire.on('commented',()=>{
                openSideMenu=false
            })


        " 
    @opencommentbox.window="
                            openSideMenu=true
                            $nextTick(()=>$refs.focusOn.focus())
                            "
>
<div 
            x-cloak  
            x-show.transition.top.left.duration.200ms="openSideMenu"
                @click.away="openSideMenu = false"
            @keydown.escape.window="openSideMenu =  false"
            class="z-10  absolute w-80 bg-white rounded-md shadow-lg border border-1 border-gray-200 py-1 px-2">
                                <form 
                                wire:submit.prevent="addComment"
                                class="space-y-2">
                                    <textarea name="reply"
                                    x-ref="focusOn"
                                    class="w-full border border-1 border-gray-200 rounded-lg shadow-md focus:border-green-400"
                                    rows="3"
                                    wire:model.defer='comment'
                                    placeholder="Reply Your Message"
                                    ></textarea>
                                    @error('comment')
                                        <span class="text-red-600 text-xs font-bold">{{$message}}</span>
                                    @enderror
                                    <div class="flex space-x-4">
                                            <button
                                                    type="submit"
                                                    class="flex items-center justify-center h-11 text-xs bg-blue-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                                                >
                                            <span class="ml-1">Post Comment</span>
                                        </button>
                                            <button
                                                    type="submit"
                                                    class="flex items-center justify-center h-11 text-xs bg-gray-400 text-white font-semibold rounded-xl border border-blue hover:bg-blue-hover transition duration-150 ease-in px-6 py-3"
                                                >
                                            <span class="ml-1">Attach</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
</div>
    