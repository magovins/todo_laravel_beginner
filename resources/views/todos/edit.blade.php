@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b pb-4 px-4">
	<h1 class="text-2xl pb-4">Update your task:</h1>
	<a href="{{ route('todo.index') }}" class="mx-5 py-2 text-gray-400 cursor-pointer text-white">
		<span class="fas fa-arrow-left text-red-500"></span>
	</a>
</div>	
<x-alert/>
<!--  action="   route('todo.update',['todo'=>$todo->id] "  se ho più parametri -->
<form action="{{ route('todo.update', $todo->id) }}" method="post" accept-charset="utf-8" class="py-5">
	@csrf
	@method('patch')
	<div class="py-1">
		<input class="py-2 px-2 border rounded " type="text" name="title" value="{{ $todo->title }}" ">
	</div>
	<div class="py-1">
		<textarea placeholder="Description" name="description" class="p-2 rounded border">{{ $todo->description }}</textarea>
	</div>
	<div class="py-2">
		@livewire('edit-step',['steps'=>$todo->steps])
	</div>
	<div>
		<input class="p-2 border rounded" type="submit" value="Update">
	</div>
</form>
@endsection