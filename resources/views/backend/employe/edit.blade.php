@extends('backend.layouts.app')
@section('content')
<h1 class="page-title">Add new employe</h1>
<div class="row">
    <div class="col-md-12">
        
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="panel panel-default">
            {{-- <div class="panel-heading">
                <h3 class="panel-title"><strong>Create</strong> employe</h3>
                <ul class="panel-controls">
                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                </ul>
            </div> --}}
           
            <div class="panel-body">                                                                        
                
                <div class="row">
                    
                        <div class="col-md-6">
                        
                            <div class="form-group">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">                                            
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-user"> </i> </span>
                                        <input type="text" name="name" value="{{ old('name',$getRecord->name) }}" class="form-control" required />
                                    </div>                                            
                                </div>
                                <div style="color: red">{{ $errors->first('name') }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Last Name</label>
                                <div class="col-md-9">                                            
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-user"> </i> </span>
                                        <input type="text" name="last_name" value="{{ old('last_name',$getRecord->last_name) }}" class="form-control"/>
                                    </div>                                            
                                </div>
                                <div style="color: red">{{ $errors->first('last_name') }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Profile pic</label>
                                <div class="col-md-9">                                            
                                    <div class="input-group">
                                        {{-- <span class="input-group-text"><i class="fa fa-user"> </i> </span> --}}
                                        <input type="file" name="profile_pic" class="form-control" />
                                    </div>                                            
                                </div>
                                @if (!empty($getRecord->getProfile()))
                                  <img style="border-radius: 50%" width="60px" height="60px"  src="{{ $getRecord->getProfile() }}" alt="">
                                @endif 
                                <div style="color: red">{{ $errors->first('last_name') }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-9">                                            
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-envelope"> </i> </span>
                                        <input type="text" name="email" value="{{ old('email',$getRecord->email) }}" class="form-control" required />
                                    </div>                                            
                                </div>
                                <div style="color: red">{{ $errors->first('email') }}</div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Mobile Number</label>
                                <div class="col-md-9">                                            
                                    <div class="input-group">
                                        {{-- <span class="input-group-addon"><span class="fa fa-user"></span></span> --}}
                                        <input type="text" name="mobile_number" value="{{ old('mobile_number',$getRecord->tel) }}" class="form-control"/>
                                    </div>  
                                    <div class="required">{{ $errors->first('mobile_number') }}</div>                                          
                                </div>
                            </div>

                            <div class="form-group">                                        
                                <label class="col-md-3 control-label">Password</label>
                                <div class="col-md-9 col-xs-12">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa fa-unlock-alt"> </i> </span>
                                        <input type="text" name="password" class="form-control" />
                                    </div>
                                    (enter password if you want to change)            
                                </div>
                                <div style="color: red">{{ $errors->first('password') }}</div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Address</label>
                                <div class="col-md-9 col-xs-12">                                            
                                    <textarea class="form-control" rows="5" name="address" required >{{ old('address',$getRecord->address) }}</textarea>
                                </div>
                                <div style="color: red">{{ $errors->first('address') }}</div>
                            </div>
                         
                        </div>

                         <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Gender</label>
                                    <div class="col-md-9">                                                                                                                                        
                                        <select name="gender" id="" class="form-control" required>
                                            <option value="">select</option>
                                            <option {{($getRecord->sexe == 'Male') ? 'selected' : ''}} value="Male">Male</option>
                                            <option {{($getRecord->sexe == 'Female') ? 'selected' : ''}} value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Date of birth</label>
                                    <div class="col-md-9">                                            
                                        <div class="input-group">
                                            {{-- <span class="input-group-addon"><span class="fa fa-user"></span></span> --}}
                                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth',$getRecord->date_birth) }}" class="form-control"/>
                                        </div>  
                                        <div class="required">{{ $errors->first('date_birth') }}</div>                                          
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Date of Join</label>
                                    <div class="col-md-9">                                            
                                        <div class="input-group">
                                            {{-- <span class="input-group-addon"><span class="fa fa-user"></span></span> --}}
                                            <input type="date" name="date_of_join" value="{{ old('date_of_join',$getRecord->date_of_joining) }}" class="form-control"/>
                                        </div>  
                                        <div class="required">{{ $errors->first('date_of_join') }}</div>                                          
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Salary</label>
                                    <div class="col-md-9">                                            
                                        <div class="input-group">
                                            {{-- <span class="input-group-addon"><span class="fa fa-user"></span></span> --}}
                                            <input type="number" name="salary" value="{{ old('salary',$getRecord->salary) }}" class="form-control"/>
                                        </div>  
                                        <div class="required">{{ $errors->first('salary') }}</div>                                          
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Job</label>
                                    <div class="col-md-9">                                                                                                                                        
                                        <select name="id_job" id="" class="form-control">
                                            <option value="">select</option>
                                            {{-- <option {{ ($getRecord->id_job == 1) ? 'selected' : '' }} value="1">JOB1</option>
                                            <option {{ ($getRecord->id_job == 2) ? 'selected' : '' }} value="2">JOB2</option> --}}
                                            @foreach ($getJob as $item)
                                               <option {{($getRecord->id_job == $item->id) ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">department</label>
                                    <div class="col-md-9">                                                                                                                                        
                                        <select name="id_department" id="" class="form-control">
                                            <option value="">select</option>
                                            {{-- <option {{ ($getRecord->id_department == 1) ? 'selected' : '' }} value="1">COMPTA</option>
                                            <option {{ ($getRecord->id_department == 2) ? 'selected' : '' }} value="2">INFOGRAPHIE</option> --}}
                                            @foreach ($getDepartment as $item)
                                               <option {{($getRecord->id_department == $item->id) ? 'selected' : ''}} value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-3 control-label">status</label>
                                    <div class="col-md-9">                                                                                                                                        
                                        <select name="status" id="" class="form-control">
                                            <option {{ ($getRecord->status == 1) ? 'selected' : '' }} value="1">active</option>
                                            <option {{ ($getRecord->status == 0) ? 'selected' : '' }} value="0">inactive</option>
                                        </select>
                                    </div>
                                </div>

                        
                                <div class="form-group">
                                    <div class="pull-right">                                                                                                                                        
                                    <input type="submit" value="save" class="btn btn-primary">
                                    </div>
                                </div> 

                          </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div> 



@endsection