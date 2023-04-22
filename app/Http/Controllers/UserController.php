<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\AssignUserToProject;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function index(Request $request,User $users){
        $users = $users->newQuery();

        if ($request->search != null) {
            $users->where(function($query) use ($request) {
             $query
                ->where( 'name', 'LIKE', "%{$request->search}%" )
                ->orWhere ( 'email', 'LIKE', "%{$request->search}%" )
                ->orWhere ( 'contact', 'LIKE', "%{$request->search}%");
            });
        }

        if($request->roles != null){
            $users->where('roles',$request->roles);
        }

        $users = $users->latest()->paginate(4);
       
        return view('user.listuser',compact('users'));
    }

    public function adduser(){
        return view('user.adduser');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
            'contact' => 'required|digits:10',
            'dob' => 'required|before:today',
            'gender' => 'required',
            'address' => 'required',
            'active' => 'required',
            'roles' => 'required',
            'terms' => 'required',
        ],
        [
            'name.required'=>'Please enter your User Name',
            'email.required'=>'Please enter your Email',
            'password.required'=>'Please enter your Password',
            'password_confirm.required'=>'Please enter your Confirm Password',
            'contact.required'=>'Please enter your Contact No',
            'dob.required'=>'Please Enter Date Of Birth',
            'gender.required'=>'Please Select Gender',
            'address.required'=>'Please Enter Address',
            'active.required'=>'Please Select Status',
            'roles.required'=>'Please Select Roles',
            'terms.required'=>'Please Read and Select Terms & Condition',
        ]);

            $users = new User;

            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = Hash::make($request['password']);
            $users->contact = $request->contact;
            $users->dob = $request->dob;
            $users->gender = $request->gender;
            $users->address = $request->address;
            $users->active = $request->active;
            $users->roles = $request->roles;
            //echo "<pre>"; print_r($users); exit;
              $users->save();
              return redirect()->route('list')->with('success', 'User Added Successfully.');  
    }

    public function update(Request $request,$id){
         $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|digits:10',
            'dob' => 'required|before:today',
            'gender' => 'required',
            'address' => 'required',
            'active' => 'required',
            'roles' => 'required',
            'terms' => 'required',
        ],
        [
            'name.required'=>'Please enter your User Name',
            'email.required'=>'Please enter your Email',
            'contact.required'=>'Please enter your Contact No',
            'dob.required'=>'Please Enter Date Of Birth',
            'gender.required'=>'Please Select Gender',
            'address.required'=>'Please Enter Address',
            'active.required'=>'Please Select Status',
            'roles.required'=>'Please Select Roles',
            'terms.required'=>'Please Read and Select Terms & Condition',
        ]);
        $users = User::find($id);
        //echo "<pre>"; print_r($users); exit;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->contact = $request->contact;
            $users->dob = $request->dob;
            $users->gender = $request->gender;
            $users->address = $request->address;
            $users->active = $request->active;
            $users->roles = $request->roles;
        $users->save();
                return redirect()->route('list')->with('success', 'User Updated Successfully.');
    }   

    public function edit($id){
        $users=User::find($id); 
        //$roles = User::get(["name", "id"]);
        return view('user.edituser',compact('users'));
    }

    public function destroy($id){
        $users=User::find($id);  
        $users->delete();
        return redirect()->route('list')->with('success', 'User Deleted Successfully.');
        //return redirect()->back()->with('success', 'User Deleted Successfully.');
    }

    //Crud Using Api

    public function alluser(){
        $users= User::all();
        return response()->json([
            'status' => 200,
            'message' => 'All Users Shows',
            'user' => $users 
        ]);
    }

    public function addid(Request $request)
    {
            $validator = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required',
                'contact'=>'required',
                'dob'=>'required',
                'gender'=>'required',
                'address'=>'required',
                'active'=>'required',
                'roles'=>'required',
                'password'=>'required',
            ]);
            if($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'message' => $validator->messages()
                ], 422);
            }else{
            $users = new User;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->contact = $request->contact;
            $users->dob = $request->dob;
            $users->gender = $request->gender;
            $users->address = $request->address;
            $users->active = $request->active;
            $users->roles = $request->roles;
            $users->password = Hash::make($request['password']);
            $users->save();
                
            return response()->json([
                'status'=>200,
                'message'=>"User Create Successfully",
                'users' => $users
                    ], 200);
                }
    }

    public function showbyid($id)
    {
        // if (!auth()->user()) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
        $users = User::find($id);
        return response()->json([
                'status'=>200,
                'message'=>"User Show Successfully",
                'users' => $users
                    ], 200);
    }

    public function updatebyid(Request $request, $id)
    {
         $validator = Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required',
                'contact'=>'required',
                'dob'=>'required',
                'gender'=>'required',
                'address'=>'required',
                'active'=>'required',
                'roles'=>'required',
            ]);
            if($validator->fails()) {
                return response()->json([
                    'status' => 422,
                    'message' => $validator->messages()
                ], 422);
            }else{
            $users = User::find($id);
            $users->name = $request->name;
            $users->email = $request->email;
            $users->contact = $request->contact;
            $users->dob = $request->dob;
            $users->gender = $request->gender;
            $users->address = $request->address;
            $users->active = $request->active;
            $users->roles = $request->roles;
            $users->save();
                
            return response()->json([
                'status'=>200,
                'message'=>"User Updated Successfully",
                'users' => $users
                    ], 200);
                }
    }

    public function delete($id){
        $users=User::find($id);  
        $users->delete();
        return response()->json([
                'status'=>200,
                'message'=>"User Deleted Successfully",
                'users' => $users
                    ], 200);
    }
    
    public function listuser(Request $request,User $users){
        $users = $users->newQuery();
        if (is_numeric($request->active)){
            $users->where ('active',$request->active);
        }
        if ($request->project_id) {
        $users->leftjoin('assign_user_to_projects','assign_user_to_projects.user_id','=','users.id')
              ->select('users.*')
              ->where('assign_user_to_projects.project_id',$request->project_id);
        }
        if ($request->search != null) {
            $users->where(function($query) use ($request) {
             $query
                ->where( 'name', 'LIKE', "%{$request->search}%" )
                ->orWhere ( 'email', 'LIKE', "%{$request->search}%" ); 
            });
        }
        $users = $users->get();
        return response()->json([
                'status'=>200,
                'message'=>"User Show Successfully",
                'users' => $users
                    ], 200);
    }

    public function listproject(Request $request){
        $projectid = $request->project_id;
        //echo "<pre>"; print_r($projectid); exit;
        $tasks = AssignUserToProject::where('project_id',$projectid)->with('user')->get()->pluck('user.name','user.id')->toArray();
        return response()->json([
                'status'=>200,
                'message'=>"This Is Project User",
                'tasks' => $tasks
                    ], 200);
    }

    public function loginUser(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);   
    }
     public function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

}
