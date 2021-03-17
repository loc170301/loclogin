<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Tasks;

class TasksController extends Controller
{
    public function index(){ 
        $tks = Tasks::paginate(3);
        return view('Tasks.tasks_list',compact('tks'));
    }

    public function store(Request $request){
        $tks = new Tasks();
        
        $tks->name = $request->name;
        
        $validatedData = $request->validate([
            'name' => ['required'],
        ]);
        
        $tks->save();   
        return redirect()->route('tasks_list');
    }

    public function show_add_form(){
        return view('Tasks.tasks_add');
    }

    public function delete(Request $request,$id){
        Tasks::where('id',$id)->delete();
        return redirect()->route('tasks_list');
    }

}
