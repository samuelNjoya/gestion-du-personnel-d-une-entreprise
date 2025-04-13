@extends('backend.layouts.app')
@section('content')
<h1 class="page-title">Edit Admin</h1>

<div class="row">
    <div class="col-md-12">
        
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="panel panel-default">
            {{-- <div class="panel-heading">
                <h3 class="panel-title"><strong>Create</strong> Admin</h3>
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
                                    <input type="text" name="name" value="{{ old('name', $getRecord->name) }}" class="form-control" required />
                                </div>                                            
                            </div>
                            <div style="color: red">{{ $errors->first('name') }}</div>
                        </div>

                        {{-- <div class="form-group">
                            <label class="col-md-3 control-label">Last Name</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-user"> </i> </span>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control"/>
                                </div>                                            
                            </div>
                            <div style="color: red">{{ $errors->first('last_name') }}</div>
                        </div> --}}
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
                            <div style="color: red">{{ $errors->first('profile_pic') }}</div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-envelope"> </i> </span>
                                    <input type="text" name="email" value="{{ old('email', $getRecord->email) }}" class="form-control" required />
                                </div>                                            
                            </div>
                            <div style="color: red">{{ $errors->first('email') }}</div>
                        </div>

                        <div class="form-group">                                        
                            <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-unlock-alt"> </i> </span>
                                    <input type="text" name="password" class="form-control"  />
                                </div>     
                                (Do you want to change password so please enter other password)       
                            </div>
                            <div style="color: red">{{ $errors->first('password') }}</div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Address</label>
                            <div class="col-md-9 col-xs-12">                                            
                                <textarea class="form-control" rows="5" name="address" required >{{ old('address', $getRecord->address) }}</textarea>
                            </div>
                            <div style="color: red">{{ $errors->first('address') }}</div>
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
                            <label class="col-md-3 control-label">Role</label>
                            <div class="col-md-9">                                                                                                                                        
                                <select name="role" id="" class="form-control">
                                    <option {{ ($getRecord->role == 1) ? 'selected' : '' }} value="1">Super Admin</option>
                                    <option {{ ($getRecord->role== 2) ? 'selected' : '' }} value="2">Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="pull-right">                                                                                                                                        
                               <input type="submit" value="update" class="btn btn-primary">
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