<div x-data="{showModal:false}"
   @foo.window="showModal=true"

>
<!-- This example requires Tailwind CSS v2.0+ -->
<div
    x-show="showModal"
    class="fixed z-10  inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <!--
      Background overlay, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div 
    x-show.transition.duration-200ms="showModal"

    class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <!--
      Modal panel, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        To: "opacity-100 translate-y-0 sm:scale-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100 translate-y-0 sm:scale-100"
        To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    -->
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
                    <h1 class="text-center text-xl ">Add and idea</h1>
                    <h1 class="text-center text-xs w-full ">Let Us know what you would like and we will take over</h1>
                </div>
                <form class="flex-col space-y-2" action="{{route('idea.store')}}" method="post">
                    @csrf

                    <div>
                        <input type="text" 
                            class="w-full  border-1 focus:border-green-400 rounded-3xl  border-gray-200 bg-gray-100 text-gray-800"
                            placeholder="Enter your Ideas"
                            name="title"
                            />
                    </div>
                    <div>
                        {{-- <select 
                            class="w-full border-1 rounded-3xl focus:border-green-400   border-gray-200 bg-gray-100 text-gray-800"
                            placeholder="Enter your Ideas"
                            >
                           
                            <option>Categroy</option>
                        </select> --}}
                    </div>
                    <div>
                        <textarea  
                            class="w-full border-1 rounded-3xl  focus:border-green-400  border-gray-200 bg-gray-100 text-gray-800"
                            rows="6"
                            placeholder="Describe YOurself"
                            name="desc"
                            >
                        </textarea>
                    </div>
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
