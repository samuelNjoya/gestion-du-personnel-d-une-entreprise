@extends('backend.layouts.app')
@section('content')
<h1 class="page-title">Edit new Job</h1>
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
                                    <input type="text" name="name" value="{{ old('name',$getRecord->name) }}" class="form-control" required />
                                </div>                                            
                            </div>
                            <div style="color: red">{{ $errors->first('name') }}</div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Min salary</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-user"> </i> </span>
                                    <input type="number" name="min_salary" value="{{ old('min_salary',$getRecord->min_salary) }}" class="form-control" required />
                                </div>                                            
                            </div>
                            <div style="color: red">{{ $errors->first('min_salary') }}</div>
                        </div>
                      
                        <div class="form-group">
                            <label class="col-md-3 control-label">Max salary</label>
                            <div class="col-md-9">                                            
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa fa-user"> </i> </span>
                                    <input type="number" name="max_salary" value="{{ old('max_salary',$getRecord->max_salary) }}" class="form-control" required />
                                </div>                                            
                            </div>
                            <div style="color: red">{{ $errors->first('max_salary') }}</div>
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
        </form>
    </div>
</div> 



@endsection