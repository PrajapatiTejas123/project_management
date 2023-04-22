<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\AssignUserToProject;
use Auth;
use Carbon\Carbon;

class ProjectController extends Controller
{
    public function index(Request $request,Project $projects){
        $projects = $projects->newQuery();

        if ($request->search != null) {
            $projects->where(function($query) use ($request) {
             $query
                ->where( 'title', 'LIKE', "%{$request->search}%" )
                ->orWhere ( 'description', 'LIKE', "%{$request->search}%" );
            });
        }

        if ($request->status != null) {
            $projects->where('status',$request->status);
        }
        $projects = $projects->latest()->paginate(4);
        $project = User::all();
        return view('project.listproject',compact('projects','project'));
    }


    public function addproject(){
        $project = User::all();
        return view('project.addproject',compact('project'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
            'status' => 'required',
            'manager_id' => 'required',
            'user_id.*' => 'required',
        ],
        [
            'title.required'=>'Please enter Project Title',
            'description.required'=>'Please enter Description',
            'start_date.required'=>'Please enter Start Date',
            'end_date.required'=>'Please enter End Date',
            'status.required'=>'Please Select Status',
            'manager_id.required'=>'Please Select Manager',
            'user_id.*.required'=>'Please Select User'
        ]);

            $project = new Project;
            //$project = Project::find(1);
            $project->manager_id = $request->manager_id;
            $project->title = $request->title;
            $project->description = $request->description;
            $project->start_date = $request->start_date;
            $project->end_date = $request->end_date;
            $project->status = $request->status;
            $project->created_by = Auth::user()->id;
            //echo "<pre>"; print_r($project); exit;
            $project->save();
            foreach ($request->user_id as $key => $value) {
            $assign[] = [
            'user_id'  => $value,
            'project_id' => $project->id, 
            'created_by' =>  Auth::user()->id,
            //'created_at'=> Carbon::now()->timestamp,
            ];
        }
        //echo "<pre>"; print_r($assign); exit;
            AssignUserToProject::insert($assign);
            return redirect()->route('project/list')->with('success','Project Added Successfully.');  
    }

    public function edit($id, Project $assign_user ){
        $projects=Project::find($id);
        $managerUsers = User::where('roles',2)->where('active',1)->get();
        $users = User::where('roles',3)->where('active',1)->get();

        //echo "<pre>"; print_r($projects->assignuserproject); exit;

        $assign_user = $projects->assignuserproject->pluck('user_id')->toArray();
        //echo "<pre>"; print_r($assign_user); exit;
        return view('project.editproject',compact('projects','users', 'managerUsers', 'assign_user'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
            'status' => 'required',
            'manager_id' => 'required',
            'user_id.*' => 'required',
        ],
        [
            'title.required'=>'Please enter Project Title',
            'description.required'=>'Please enter Description',
            'start_date.required'=>'Please enter Start Date',
            'end_date.required'=>'Please enter End Date',
            'status.required'=>'Please Select Status',
            'manager_id.required'=>'Please Select Manager',
            'user_id.*.required'=>'Please Select User'
        ]);
        $project = Project::find($id);
            $project->manager_id = $request->manager_id;
            $project->title = $request->title;
            $project->description = $request->description;
            $project->start_date = $request->start_date;
            $project->end_date = $request->end_date;
            $project->status = $request->status;
            $project->updated_by = Auth::user()->id;
            //echo "<pre>"; print_r($project); exit;
        $project->save();

        $assign_user = AssignUserToProject::where('project_id' ,$project->id);
        $assign_user->delete();
        foreach ($request->user_id as $key => $value) {   
            $assign[] = [                                      
                'user_id'=> $value, 
                'project_id'=>  $project->id,
                'created_by' => Auth::user()->id, 
                'updated_by' => Auth::user()->id, 
                "updated_at" =>  \Carbon\Carbon::now('Asia/Kolkata'),
            ];
        }
        AssignUserToProject::insert($assign);

        return redirect()->route('project/list')->with('success', 'Project Updated Successfully.');
    }


    public function destroy($id){
        $users=Project::find($id);  
        $users->delete();
        return redirect()->route('project/list')->with('success', 'Project Deleted Successfully.');
        //return redirect()->back()->with('success', 'User Deleted Successfully.');
    }
}
