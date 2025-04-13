@extends('backend.layouts.app')
@section('content')
  
  <div class="container">
    <div class="container-fluid">
        <h1 class="page-title">Filter employe</h1>
      
          <div class="panel panel-default">
              <div class="panel-body">
                 
                  <form action="" method="get">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">ID</label>
                                <input type="text" class="form-control" value="{{ Request::get('id') }}" placeholder="ID" name="id">
                            </div>
                            <div class="col-md-2">
                                <label for="">name</label>
                                <input type="text" class="form-control" value="{{ Request::get('name') }}" placeholder="name" name="name">
                            </div>
                            <div class="col-md-2">
                                <label for="">Email</label>
                                <input type="text" class="form-control" value="{{ Request::get('email') }}" placeholder="Email" name="email">
                            </div>
                            <div class="col-md-2">
                                <label for="">Address</label>
                                <input type="text" class="form-control" value="{{ Request::get('address') }}" placeholder="Address" name="address">
                            </div>
                          
                            <div class="col-md-2">
                                <label for="">Status</label>
                            <select  class="form-control" name="status" id="">
                                <option value="">Select</option>
                                <option {{ (Request::get('status') == '1') ? 'selected' : '' }} value="1">Active</option>
                                <option {{ (Request::get('status') == '100') ? 'selected' : '' }} value="100">Inactive</option>
                            </select>
                            </div>
                            <div style="clear: both;"></div>
                            <br><br>
                            <div class="col-md-12 mt-2">
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="{{url('panel/employe')}}" class="btn btn-success">Reset</a>
                            </div>
                        </div>
                </form>

              </div>
          </div>
      

      
      @include('_MessageES')

      {{-- <div class="d-flex justify-content-between py-3">
          <h3 class="">List of Employe</h3>
          <a href="" class="btn btn-primary">Create Employe</a>
      </div> --}}
      <div class="page-header mt-2">
        <h1 class="page-title">employe</h1>
        <div class="page-actions">
           
            <a href="" class="btn btn-success">
                <i class="fas fa-file-export"></i>
                 Export
            </a>
              
            <a href="{{url('panel/employe/create')}}" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Add
             </a>
            
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                       <table class="table table-striped">
                           <thead>
                               <tr>
                                  <th>ID</th>
                                  <th>Profile</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>Address</th>
                                  <th>Job</th>
                                  <th>getDepartment</th>
                                  <th>Status</th>
                                  <th>Created Date</th>
                                  <th>Actions</th>
                               </tr>
                           </thead>
                           <tbody>
                            @forelse ($getRecord as $item)
                                <tr>
                                   <td >{{$item->id}}</td>
                                   <td >
                                        @if (!empty($item->getProfile()))
                                            <img style="border-radius: 50%" width="50px" height="50px"  src="{{ $item->getProfile() }}" alt="">
                                        @endif
                                   </td>
                                   <td >{{$item->name}}</td>
                                   <td >{{$item->email}}</td>
                                   <td >{{$item->address}}</td>
                                   <td>
                                        {{-- {{ $item->getClass ? $item->getJob->name : 'Classe non disponible' }} --}}
                                        {{ $item->getJob->name }}
                                   </td>
                                   <td>
                                     {{-- {{ $item->getClass ? $item->getJob->name : 'Classe non disponible' }} --}}
                                      {{ $item->getDepartment->name }}
                                  </td>
                                   <td >
                                       @if ($item->status == 1)
                                           <span class="label label-success">Active</span>
                                       @else
                                           <span class="label label-danger">Inactive</span>
                                       @endif
                                   </td>
                                   <td >{{ date('d-m-y H:i', strtotime($item->created_at)) }}</td>
                                   <td>
                                    <a href="{{ url('panel/employe/view', $item->id) }}" class="btn btn-primary btn-sm"><span class="fa fa-search"></span></a>
                                      <a href="{{ url('panel/employe/edit', $item->id) }}" class="btn btn-primary btn-sm"><span class="fa fa-pencil"></span></a>
                                      <a href="{{ url('panel/employe/delete', $item->id) }}" onclick="return confirm('Are you sure do you want to delete ?');" class="btn btn-danger  btn-sm" ><span class="fa fa-times"></span></a>
                                   </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%">Record not found</td>
                                </tr>
                          @endforelse
                           </tbody>
                       </table>
                    
                    <div class="d-flex justify-content-between">
                      <h3 class=""></h3>
                      <div style="float:right; padding:10px;" >
                          <span class="pull-rightxxx"> {{$getRecord->links()}}</span>
                      </div>
                  </div>
                
              </div>
        </div>
    </div>
</div>

@endsection