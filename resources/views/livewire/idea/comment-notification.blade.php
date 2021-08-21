  {{-- start of notification box   --}}
            <div 
            x-data="{noti:false}"
           @open-noti-box.window="
                                noti=!noti

                                if(noti){
                                    Livewire.emit('showNotifications')
                                }
                                "
           >
           <div
           x-cloak
             x-show.transition.top.right.duration.200ms="noti"
             @click.away="noti=false"
            class="absolute bg-white w-72 h-44 md:-right-28 shadow-xl p-2 overflow-auto rounded-md">
           @foreach ($notis as $noti) 
            <div class="noti-contiainer">  
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
            </div>
          @endforeach
          {{-- button  --}}
          <div class="flex justify-center">
              <button
              wire:click='markAsRead'
              class="mx-2 h-14 shadow-lg bg-gray-300 text-gray-800 px-4">Mark As All Read</button>
          </div>
        </div>
            <div>
        {{-- end of notification box   --}}