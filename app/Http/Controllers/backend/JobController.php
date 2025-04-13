<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\JobModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function job_list(){
        $data['getRecord'] = JobModel::getJob();  //se trouve dans le model
        $data['meta_title'] = "job List";
        return view('backend.job.list', $data);
    }
    

    public function job_create(){
        $data['meta_title'] = "job Create";
        return view('backend.job.create', $data);
    }


    public function job_insert(Request $request){
     
         
        $save = new JobModel();
        $save->name = trim($request->name);
        $save->min_salary = trim($request->min_salary);
        $save->max_salary = trim($request->max_salary);
        $save->status = trim($request->status);
      
       // $save->created_by_id = Auth::user()->id;
       $save->save();

      

        return redirect('panel/job')->with('success','job successifuly created');
    }

    public function job_edit($id){
        $data['getRecord'] = JobModel::getSingle($id);
        $data['meta_title'] = "job Edit";
        return view('backend.job.edit', $data);
    }

    public function job_update($id,Request $request){
       
        $save = JobModel::getSingle($id);
        $save->name = trim($request->name);
        $save->min_salary = trim($request->min_salary);
        $save->max_salary = trim($request->max_salary);
        $save->status = trim($request->status);
       
        $save->save();

      

        return redirect('panel/job')->with('success','job successifuly updated');
    }

    public function job_delete($id){
        $save = JobModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect('panel/job')->with('error','job successifuly deleted');
    }
}
