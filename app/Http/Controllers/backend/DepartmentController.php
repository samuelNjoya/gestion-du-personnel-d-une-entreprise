<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\DepartmentModel;
use Illuminate\Http\Request;


class DepartmentController extends Controller
{
    public function department_list(){
        $data['getRecord'] = DepartmentModel::getDepartment();  //se trouve dans le model
        $data['meta_title'] = "department List";
        return view('backend.department.list', $data);
    }
    

    public function department_create(){
        $data['meta_title'] = "department Create";
        return view('backend.department.create', $data);
    }


    public function department_insert(Request $request){
     
         
        $save = new DepartmentModel();
        $save->name = trim($request->name);
        $save->status = trim($request->status);
      
       // $save->created_by_id = Auth::user()->id;
       $save->save();

      

        return redirect('panel/department')->with('success','department successifuly created');
    }

    public function department_edit($id){
        $data['getRecord'] = DepartmentModel::getSingle($id);
        $data['meta_title'] = "department Edit";
        return view('backend.department.edit', $data);
    }

    public function department_update($id,Request $request){
       
        $save = DepartmentModel::getSingle($id);
        $save->name = trim($request->name);
        $save->status = trim($request->status);
       
        $save->save();

      

        return redirect('panel/department')->with('success','department successifuly updated');
    }

    public function department_delete($id){
        $save = DepartmentModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect('panel/department')->with('error','department successifuly deleted');
    }
}
