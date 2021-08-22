<div>
{{-- start of notification box   --}}
<div 
                x-data="{noti:false}""
                @click="
                    noti=!noti
                    if(noti){
                                    Livewire.emit('showNotifications')
                                }
                    "
                class="relative hover:bg-gray-200 cursor-pointer ">
  <div class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                     </svg>
                        <div class="absolute -top-2 -right-2 w-4 h-4 rounded-full bg-red-600 flex items-center justify-center">
                            <span class="text-white text-xs">
                                {{$notisCount}}
                            </span>
                        </div>
                    </div>
        <div 
            class="absolute z-20  w-72 top-10 right-0 "
          
           >
           <div
              x-cloak
             x-show.transition.top.right.duration.200ms="noti"
             @click.away="noti=false"
            class=" bg-white h-44 md:-right-28 shadow-xl p-2 overflow-auto rounded-md">
           @forelse ($notis as $noti) 
            <button
            wire:click="markSingleNotiRead('{{$noti->id}}')"
            class="noti-contiainer">  
                <div class="flex space-x-4">
                    <div class="flex-none">
                        <div class="flex-col mx-2 my-4 ">
                            <img src="https://avataaars.io/?avatarStyle=Circle&topType=ShortHairTheCaesarSidePart&accessoriesType=Sunglasses&hairColor=BrownDark&facialHairType=BeardMajestic&facialHairColor=BrownDark&clotheType=ShirtScoopNeck&clotheColor=Gray01&eyeType=Side&eyebrowType=RaisedExcited&mouthType=Twinkle&skinColor=Light" class="w-12 h-12 rounded-full" alt="avatar">
                        </div>
                    </div>
                    <div class="mt-4">
                    <p class="line-clamp-3">
                        {{$noti->data['message']}}
                    </p>
                    <span class="font-semibold text-xs">2 Hour Ago</span>
                    </div>
                </div>
                <div class="mx-8 my-4 h-0.5 bg-gray-200"></div>
            </button>
            @empty 
            <div class="w-full h-full flex justify-center items-center  ">
                <p>There Are No New Notifications.</p>
            </div>
            
          @endforelse
          {{-- button  --}}
          @if($loadingStatus)
          {{-- loading spinner --}}
            <div class="mx-auto">
                <div class="flex justify-around">
                        <span class="inline-flex rounded-md shadow-sm">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                    </div>
            </div>
        @endif
        @if($notisCount)
          <div class="flex justify-center">
              <button
              wire:click='markAsAllRead'
              class="mx-2 w-full  h-12 shadow-lg bg-gray-300 text-gray-800 px-4">Mark As All Read</button>
          </div>
          @endif
        </div>
     <div>
     </div>
     </div>
     </div>
        {{-- end of notification box   --}}
    </div>