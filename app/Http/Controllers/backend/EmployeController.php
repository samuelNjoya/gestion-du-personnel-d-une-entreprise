<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use App\Models\JobModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployeController extends Controller
{
    public function employe_list(){
       // $data['getClass'] = ClassModel::getRecordActive($getRecord->created_by_id);
        $data['getDepartment'] = DepartmentModel::getDepartmentActive();
        $data['getJob'] = JobModel::getJobActive();
        $data['getRecord'] = User::getEmploye();  //se trouve dans le model
        $data['meta_title'] = "employe List";
        return view('backend.employe.list', $data);
    }
    

    public function employe_create(){
        $data['getJob'] = JobModel::getJobActive();
        $data['getDepartment'] = DepartmentModel::getDepartmentActive();
        $data['meta_title'] = "employe Create";
        return view('backend.employe.create', $data);
    }


    public function employe_insert(Request $request){
        request()->validate([
           'email' => 'required|email|unique:users',
        ]);
       //dd($request->all());
        $user = new User();
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->tel = trim($request->mobile_number);
        $user->password = Hash::make($request->password);
        $user->address = trim($request->address);
        $user->sexe = trim($request->gender);
        $user->date_birth = trim($request->date_of_birth);
        $user->date_of_joining   = trim($request->date_of_join);
        $user->salary = trim($request->salary);
        $user->id_job = trim($request->id_job);
        $user->id_department = trim($request->id_department);
        $user->status = trim($request->status);
        $user->role = 4;
        $user->created_by_id = Auth::user()->id;
        $user->save();
   

        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $user->profile_pic = $filename;
            $user->save();
        }

        return redirect('panel/employe')->with('success','employe successifuly created');
    }

    
    public function employe_view($id){
        $data['getRecord'] = User::getSingle($id);  // $data['getRecord'] = User::getEmploye();
        $data['meta_title'] = "employe view";
        return view('backend.employe.view', $data);
    }

    public function employe_edit($id){
        $data['getDepartment'] = DepartmentModel::getDepartmentActive();
        $data['getJob'] = JobModel::getJobActive();
        $data['getRecord'] = User::getSingle($id);
        $data['meta_title'] = "employe Edit";
        return view('backend.employe.edit', $data);
    }

    public function employe_update($id,Request $request){
        request()->validate([
           'email' => 'required|email|unique:users,email,' .$id,
        ]);
       
        $user = User::getSingle($id);
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->tel = trim($request->mobile_number);
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->address = trim($request->address);
        $user->sexe = trim($request->gender);
        $user->date_birth = trim($request->date_of_birth);
        $user->date_of_joining   = trim($request->date_of_join);
        $user->salary = trim($request->salary);
        $user->id_job = trim($request->id_job);
        $user->id_department = trim($request->id_department);
        $user->status = trim($request->status);
       
        $user->save();

        if(!empty($request->file('profile_pic'))){
            $ext = $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomStr = date('Ymdhis').Str::random(20);
            $filename = strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/', $filename);

            $user->profile_pic = $filename;
            $user->save();
        }

        return redirect('panel/employe')->with('success','employe successifuly updated');
    }

    public function employe_delete($id){
        $user = User::getSingle($id);
        $user->is_delete = 1;
        $user->save();

        return redirect('panel/employe')->with('error','employe successifuly deleted');
    }
}
