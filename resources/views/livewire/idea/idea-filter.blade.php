<div>
   <nav class="hidden md:flex items-center justify-between text-xs">
                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><button  class="border-b-4 pb-3 border-blue-500"  wire:click="setStatus('All Ideas')">All Ideas ({{$statusCounts['all_ideas']}})</button></li>
                        <li><button  class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500" wire:click="setStatus('Open')">Open ({{$statusCounts['open_ideas']}})</button></li>
                        <li><button  class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500" wire:click="setStatus('In Progress')">In Progress ({{$statusCounts['in_progress_ideas']}})</button></li>
                    </ul>

                    <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
                        <li><button class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500" wire:click="setStatus('Implemented')">Implemented ({{$statusCounts['implemented_ideas']}})</button></li>
                        <li><button class="text-gray-400 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500" wire:click="setStatus('Closed')">Closed ({{$statusCounts['closed_ideas']}})</button></li>
                    </ul>
                </nav>
</div>
