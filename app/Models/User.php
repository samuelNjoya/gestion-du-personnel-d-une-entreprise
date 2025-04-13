<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    static public function getSingle($id){
        return User::find($id);
    }

    //fonction afficher et faire la rechercher des administrateurs
    static public function getAdmin(){
        $return = self::select('*');
            if(!empty(Request::get('id'))){
                 $return = $return->where('id', '=', Request::get('id'));
            }
            if(!empty(Request::get('role'))){
                $return = $return->where('role', '=', Request::get('role'));
           }
            if(!empty(Request::get('name'))){
                 $return = $return->where('name', 'like', '%' .Request::get('name').'%');
            }
            if(!empty(Request::get('email'))){
                    $return = $return->where('email', 'like', '%' .Request::get('email').'%');
             }
            if(!empty(Request::get('address'))){
             $return = $return->where('address', 'like', '%' .Request::get('address').'%');
            } 
            if(!empty(Request::get('status'))){
                $status = Request::get('status');
                if ($status == 100) {
                    $status = 0;
                }
                $return = $return->where('status', '=', $status);
             }

        $return = $return->whereIn('role', array('1', '2'))  
                ->where('is_delete', '=', 0)//whereIn
                ->orderBy('id', 'desc')
                ->paginate(10);   
        return $return;
    }

     //fonction afficher et faire la rechercher des employés
     static public function getEmploye(){
        $return = self::select('*');
            if(!empty(Request::get('id'))){
                 $return = $return->where('id', '=', Request::get('id'));
            }
            if(!empty(Request::get('role'))){
                $return = $return->where('role', '=', Request::get('role'));
           }
            if(!empty(Request::get('name'))){
                 $return = $return->where('name', 'like', '%' .Request::get('name').'%');
            }
            if(!empty(Request::get('email'))){
                    $return = $return->where('email', 'like', '%' .Request::get('email').'%');
             }
            if(!empty(Request::get('address'))){
             $return = $return->where('address', 'like', '%' .Request::get('address').'%');
            } 
            if(!empty(Request::get('status'))){
                $status = Request::get('status');
                if ($status == 100) {
                    $status = 0;
                }
                $return = $return->where('status', '=', $status);
             }

        $return = $return->where('role', '=', 4)  
                ->where('is_delete', '=', 0)
                ->orderBy('id', 'desc')
                ->paginate(10);   
        return $return;
    }

  
    //Pour dire que plusieurs employés peut être affecter a un departement
    public function getDepartment(){
        return $this->belongsTo(DepartmentModel::class, 'id_department');
    }

    //Pour dire que plusieurs employés peut être affecter a un job
    public function getJob(){
        return $this->belongsTo(JobModel::class, 'id_job');
    }


    // pour ajouter une photo a la liste
    public function getProfile(){
        if(!empty($this->profile_pic) && file_exists('upload/profile/' .$this->profile_pic)){
           return url('upload/profile/' .$this->profile_pic);
        }else{
            return "";
        }
    }

     //fonction pour ajouter dynamiquement une image la retrouver dans le _sideBar
     public function getProfileLive(){
        if(!empty($this->profile_pic) && file_exists('upload/profile/' .$this->profile_pic)){
           return url('upload/profile/' .$this->profile_pic);
        }else{
            return url('upload/profile/user.png');;
        }
    }
}
