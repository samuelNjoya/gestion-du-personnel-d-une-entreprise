@extends('backend.layouts.app')
@section('content')
<h1 class="page-title">Add new Admin</h1>
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
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required />
                                </div>                                            
                            </div>
                            <div style="color: red">{{ $errors->first('last_name') }}</div>
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
                                    <input type="file" name="profile_pic" class="form-control" required/>
                                </div>                                            
                            </div>
                            <div style="color: red">{{ $errors->first('last_name') }}</div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-envelope"> </i> </span>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" required />
                                </div>                                            
                            </div>
                            <div style="color: red">{{ $errors->first('email') }}</div>
                        </div>

                        <div class="form-group">                                        
                            <label class="col-md-3 control-label">Password</label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-unlock-alt"> </i> </span>
                                    <input type="password" name="password" class="form-control" required />
                                </div>            
                            </div>
                            <div style="color: red">{{ $errors->first('password') }}</div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Address</label>
                            <div class="col-md-9 col-xs-12">                                            
                                <textarea class="form-control" rows="5" name="address" required >{{ old('address') }}</textarea>
                            </div>
                            <div style="color: red">{{ $errors->first('address') }}</div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">status</label>
                            <div class="col-md-9">                                                                                                                                        
                                <select name="status" id="" class="form-control">
                                    <option value="1">active</option>
                                    <option value="0">inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Role</label>
                            <div class="col-md-9">                                                                                                                                        
                                <select name="role" id="" class="form-control">
                                    <option value="1">Super Admin</option>
                                    <option value="2">Admin</option>
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
        </form>
    </div>
</div> 



@endsection