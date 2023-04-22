<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\AssignUserToProject;
use App\Models\Task;
use Auth;

class TaskController extends Controller
{
    public function index(Request $request,Task $tasks){
        $tasks = $tasks->newQuery();

        if ($request->search != null) {
            $tasks->where(function($query) use ($request) {
             $query
                ->where( 'title', 'LIKE', "%{$request->search}%" )
                ->orWhere ( 'description', 'LIKE', "%{$request->search}%" );
            });
        }

        if ($request->status != null) {
            $tasks->where('status',$request->status);
        }
        $tasks = Task::with('user')->latest()->paginate(5);
        //$tasks = $tasks->latest()->paginate(4);
        $tasks = Task::all();
        return view('task.listtask',compact('tasks'));
    }

    public function addtask(){
        //$project = Project::all();
        //$assign_user = AssignUserToProject::get();
        // $assign_user = $projects->assignuserproject->pluck('user_id')->toArray();
        //echo "<pre>"; print_r($assign_user); exit;
        $project = Project::where('status','!=',2)->get();
        return view('task.addtask',compact('project'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'project_id' => 'required',
            'employee_id' => 'required',
            'planning_hours' => 'required|numeric|min:0.1',
            'actual_hours' => 'required|numeric|min:0.1',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
            'status' => 'required',
        ],
        [
            'title.required'=>'Please enter Project Title',
            'description.required'=>'Please enter Description',
            'project_id.required'=>'Please Select Project',
            'employee_id.required'=>'Please Select User',
            'planning_hours.required'=>'Please Enter Planing Hours',
            'actual_hours.required'=>'Please Enter Actual Hours',
            'start_date.required'=>'Please enter Start Date',
            'end_date.required'=>'Please enter End Date',
            'status.required'=>'Please Select Status'
        ]);

        $tasks = new Task;

            $tasks->title = $request->title;
            $tasks->description = $request->description;
            $tasks->project_id = $request->project_id;
            $tasks->employee_id = $request->employee_id;
            $tasks->planning_hours = $request->planning_hours;
            $tasks->actual_hours = $request->actual_hours;
            $tasks->start_date = $request->start_date;
            $tasks->end_date = $request->end_date;
            $tasks->status = $request->status;
            $tasks->created_by = Auth::user()->id;
            //echo "<pre>"; print_r($tasks); exit;
              $tasks->save();
              return redirect()->route('task/list')->with('success', 'Task Added Successfully.');
    }

    public function edit($id){
        $tasks=Task::find($id);
        $project = Project::where('status','!=',2)->get();
        $employees = AssignUserToProject::where("project_id",$tasks->project_id)->with('user')->get()->pluck('user.name','user.id')->toArray();
        //echo "<pre>"; print_r($employee); exit;
        
        return view('task.edittask',compact('tasks','project','employees'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'project_id' => 'required',
            'employee_id' => 'required',
            'planning_hours' => 'required|numeric|min:0.1',
            'actual_hours' => 'required|numeric|min:0.1',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
            'status' => 'required',
        ],
        [
            'title.required'=>'Please enter Project Title',
            'description.required'=>'Please enter Description',
            'project_id.required'=>'Please Select Project',
            'employee_id.required'=>'Please Select User',
            'planning_hours.required'=>'Please Enter Planing Hours',
            'actual_hours.required'=>'Please Enter Actual Hours',
            'start_date.required'=>'Please enter Start Date',
            'end_date.required'=>'Please enter End Date',
            'status.required'=>'Please Select Status'
        ]);
        $tasks = Task::find($id);

            $tasks->title = $request->title;
            $tasks->description = $request->description;
            $tasks->project_id = $request->project_id;
            if((int)$request->employee_id){
                $tasks->employee_id = $request['employee_id'];
            }
            // $tasks->employee_id = $request->employee_id;
            $tasks->planning_hours = $request->planning_hours;
            $tasks->actual_hours = $request->actual_hours;
            $tasks->start_date = $request->start_date;
            $tasks->end_date = $request->end_date;
            $tasks->status = $request->status;
            $tasks->updated_by = Auth::user()->id;

        $tasks->save();

        return redirect()->route('task/list')->with('success', 'Task Update Successfully.');
    }

    public function destroy($id){
        $task=Task::find($id);  
        $task->delete();
        return redirect()->route('task/list')->with('success', 'Task Deleted Successfully.');
    }

    public function fetchEmployee(Request $request){
        //$projects = AssignUserToProject::all();
        // echo "<pre>"; print_r("expression"); exit;
        //$data['users'] = $projects->pluck('user_id')->toArray();
        // echo "<pre>"; print_r("expression"); exit;
       $projectid = $request->project_id;
         
       $data = AssignUserToProject::where('project_id',$projectid)->with('user')->get()->pluck('user.name','user.id')->toArray();
       //echo "<pre>"; print_r($data); exit;
        return response()->json($data);
    }
}
