<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class DepartmentModel extends Model
{
    protected $table = 'department';

    static public function getSingle($id){
        return DepartmentModel::find($id); 
    }

    static public function getDepartment(){ //$user_id, $user_type en paramètre
        $return = self::select('*');
            if(!empty(Request::get('id'))){
                 $return = $return->where('id', '=', Request::get('id'));
            }
            if(!empty(Request::get('name'))){
                 $return = $return->where('name', 'like', '%' .Request::get('name').'%');
            }
           
            if(!empty(Request::get('status'))){
                $status = Request::get('status');
                if ($status == 100) {
                    $status = 0;
                }
                $return = $return->where('status', '=', $status);
             }

           //  $return = $return->where('created_by_id', '=', $user_id);// cette fonction pour que l'admin puisse voire les teachers

        $return = $return->where('is_delete', '=', 0)
                ->orderBy('id', 'desc')
                ->paginate(10);   
        return $return;
    }

    static public function getDepartmentActive(){ //en paramètre $user_id
        $return = self::select('*')
                 ->where('status', '=', 1)
             //    ->where('created_by_id', '=', $user_id)// cette fonction pour que l'admin puisse voire les teachers
                 ->where('is_delete', '=', 0)// pour supprimer et conservé
                ->orderBy('id', 'desc')
                ->get();   
        return $return;
    }
}
