<div 
x-cloak
x-data="{showModal:false}"

x-init="
  window.livewire.on('commentHasUpdated',()=>{
    showModal= false
  })

  window.livewire.on('commentToUpdate',()=>{
   setTimeout(()=>{
    showModal= true
    $nextTick(()=>{$refs.editinput.focus()})

   },200)
    

  })

"
>
<!-- This example requires Tailwind CSS v2.0+ -->
<div
    x-show="showModal"
    class="fixed z-10  inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
   
    <div 
    x-show="showModal"

    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div 
    x-show="showModal"  
    x-transition.duration.600ms
    x-transition.duration:enter="ease-out duration-300"
    x-transition.duration:enter-start="opacity-0 translate-y-full sm:scale-100"
    x-transition.duration:enter-end="opacity-100 translate-y-0 sm:scale-100"
    @click.away="showModal=false" 
    class="inline-block   align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform   transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
    
    >
      <div class="bg-white   px-4 pt-5 pb-4 sm:p-6 sm:pb-4 ">
          
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <div class="flex justify-end  ">
                    <svg 
                    @click="showModal=false"
                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer  rounded-full hover:bg-gray-400 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>  
                </div>     
            {{-- start of vote edit form  --}}
                <div class="vote-title py-4 space-y-2">
                    <h1 class="text-center text-xl ">Edit Comment</h1>
                    <h1 class="text-center text-xs w-full ">You can only Change Your Comment</h1>
                </div>
                <form class="flex-col space-y-2"  wire:submit.prevent='updateComment'>

                    @if($comment)
                    <div>
                        <textarea  
                            x-ref='editinput'
                            class="w-full border-1 text-left rounded-3xl  focus:border-green-400  border-gray-200 bg-gray-100 text-gray-800"
                            rows="6"
                            name="desc"
                            placeholder="{{$comment->comment}}"
                            wire:model="body"
                        ></textarea>
                             @error('body')
                              <span class="text-red-500 text-sm p-3 ">{{$message}}</span>
                           @enderror 
                    </div>
                    @endif
                    <div class="flex justify-end space-x-6">
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



                </form>
                {{-- end of vote edit form  --}}
              

          </div>
      </div>
     
    </div>
  </div>
</div>
</div>
