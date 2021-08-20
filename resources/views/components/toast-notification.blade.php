

{{-- pop up toast notification    --}}
            <div
             x-data="{
                        isOpen:false,
                        message:'',
                        alert(messageFromEvent){
                             this.isOpen=true
                             this.message=messageFromEvent
                          
                           setTimeout(()=>{
                                this.isOpen=false
                            },5000)
                            
                        }
                    }"
             x-init="
                      @if(null !==session('success'))
                        $nextTick(()=>alert('{{session('success')}}'))     
                     @endif
                    
                     events=['ideaUpdated','spamCountHasIncreased','spamUnmark','commented'];

                    events.forEach(event=>{
                        window.livewire.on(event,(messageFromEvent)=>{
                            alert(messageFromEvent)
                        })

                    })
                    "
             >
                
                <div x-show="isOpen"
              x-transition:enter="transition  transform ease-in duration-300"
        x-transition:enter-start="opacity-30 translate-y-full scale-50"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-out duration-300"
        x-transition:leave-start="opacity-100 transform  scale-100"
        x-transition:leave-end="opacity-0 transform  translate-y-full scale-0"
                class=" z-20 h-14 fixed bottom-8 left-4 text-black flex justify-between px-10 max-w-screen mx-10 bg-white shadow-xl rounded-md items-center">
                    <svg  class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span x-text="message"></span>
                    <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </div>
            </div>
            {{--end of pop up toast notification    --}}