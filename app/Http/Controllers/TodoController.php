<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Http\Request;
use App\Todo;
use App\Step;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = auth()->user()->todos->sortBy('completed');
    	return view('todos.index',compact('todos'));
    }

    public function show(Todo $todo)
    {
        return view('todos.show',compact('todo'));
    }

    public function create()
    {
    	return view('todos.create');
    }

    public function edit(Todo $todo)
    {
    	return view('todos.edit', compact('todo'));
    }

    public function store(TodoCreateRequest $request)
    {
        $todo = auth()->user()->todos()->create($request->all());
        if($request->step){
            foreach ($request->step as $step ) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        return redirect(route('todo.index'))->with('message', 'Todo Created Successfully');
    }

    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title' => $request->title, 'description' => $request->description]);
        if($request->stepName){
            foreach ($request->stepName as $key => $value ) {
                $id = $request->stepId[$key];
                if(!$id){
                    $todo->steps()->create(['name' => $value]);
                }else{
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message', 'Updated!');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message','Task marked as completed!');
    }

    public function incomplete(Todo $todo)
    {
       $todo->update(['completed' => false]);
       return redirect()->back()->with('message','Task marked as incompleted!');   
    }

    public function delete(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message','Task deleted!');   
    }
}
