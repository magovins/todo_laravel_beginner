<div>
	<div class="flex justify-center pb-4 px-4">
		<h2 class="text-lg pb-4">Add steps:</h2>
		<span wire:click="increment" class="fas fa-plus cursor-pointer px-1 py-2"></span>
	</div>

	@foreach($steps as $step)
	<div class="flex justify-center py-2" wire:key="{{ $loop->index }}">
		<input class="py-1 px-2 border rounded " type="text" name="stepName[]" placeholder="{{ 'describe step'.($loop->index+1) }}" value="{{$step['name']}}" />
		<input type="hidden" name="stepId[]" value="{{ $step['id'] }}">
		<span class="fas fa-times text-red-400 p-2" wire:click="decrement({{ $loop->index }})"></span>
	</div>
	@endforeach

</div>
