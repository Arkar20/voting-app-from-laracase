<div>
   <nav class="hidden md:flex items-center justify-between text-xs">
                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><button  class="border-b-4 pb-3 @if($param=="All Ideas") border-blue-500 @endif"  wire:click="setStatus('All Ideas')">All Ideas ({{$statusCounts['all_ideas']}})</button></li>
                        <li><button  
                            class="@if($param=="Open") border-blue-500 @endif  text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500" 
                            wire:click="setStatus('Open')">
                            Open ({{$statusCounts['open_ideas']}})</button></li>
                        <li><button 
                             class="@if($param=="In Progress") border-blue-500 @endif text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500" 
                             wire:click="setStatus('In Progress')">
                             In Progress ({{$statusCounts['in_progress_ideas']}})</button></li>
                    </ul>

                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><button 
                            class="@if($param=="Implemented") border-blue-500 @endif text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500" 
                            wire:click="setStatus('Implemented')">Implemented ({{$statusCounts['implemented_ideas']}})</button></li>
                        <li><button 
                            class="@if($param=="Closed") border-blue-500 @endif text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500" 
                            wire:click="setStatus('Closed')">Closed ({{$statusCounts['closed_ideas']}})</button></li>
                    </ul>
                </nav>
</div>
