<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
   public function index() 
   {
      $tasks = Task::orderBy('priority', 'desc')->orderBy('due_date')->get(); #retrieve all Records from database
  
      return view('tasks.index',compact('tasks'));
  }
  
 
  public function showSearch(Request $request)  # control search bar activities after taking input
  {
   $searchTask = Task::where('title', 'like', '%' . $request->search . '%')
                     ->orderBy('due_date', 'desc')
                     ->get();

   return view('tasks.searchTask', compact('searchTask'));
}




public function create() # control record creation form
 {
   
    return view('tasks.create');
}

 public function store(Request $request)
 {
   $request->validate([         #validation
    'title'=>'required|max:255',
    'description'=>'nullable',
    'priority'=>'required|max:255',
    'due_date'=> 'nullable|max:255',

   ]);
   Task::create([
    'title'=>$request->input('title'),
    'description'=>$request->input('description'),
    'priority'=>$request->input('priority'),
    'due_date'=> $request->input('due_date'),

   ]);
    return redirect()->route('tasks.index')->with('success','Task Created Successfully');
 }

public function edit(Task $task) #control edit form
 {
   
    return view('tasks.edit',compact('task'));
}

 public function update(Request $request,Task $task) # to update records that are currently there in th DB
 {
   $request->validate([
    'title'=>'required|max:255',
    'description'=>'nullable',
    'priority'=>'required|in:;ow,medium,high',
    'due_date'=> 'nullable|max:255',

   ]);
  $task->update ([
    'title'=>$request->input('title'),
    'description'=>$request->input('description'),
    'priority'=>$request->input('priority'),
    'due_date'=> $request->input('due_date'),

   ]);
    return redirect()->route('tasks.index')->with('success','Task updated Successfully');
 }

 public function destroy(Task $task) # deletion of records from DB
 {
   $task->delete();
    return redirect()->route('tasks.index')->with('success','Task Deleted Successfully');
}

public function complete(Task $task) # completion and the date and time is updated to current date/time
{
  $task->update([
   'completed'=>true,
   'completed_at'=>now(),

  ]);
   return redirect()->route('tasks.index')->with('success','Task Completed Successfully');
}
public function showCompleted() #Filter completed tasks
{
  $completedTasks =Task::where('completed',true)->orderBy('completed_at','desc')->get();
   return view('tasks.taskshow',compact('completedTasks'));
}

public function showPending() # Filter pending tasks
{
  $pendingTask =Task::where('completed',false)->orderBy('due_date','desc')->get();
   return view('tasks.pendingTask',compact('pendingTask'));
}

}
?>