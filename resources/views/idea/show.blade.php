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
              {{-- start of livewire comments show  --}}
                <livewire:idea.idea-comments :idea="$idea" />
              {{-- end of livewire comments show  --}}
               

            </div>
        {{-- end of replies  --}}
    </div>
</x-app-layout>