@extends('backend.layouts.app')
@section('content')
<h1 class="page-title">view employe</h1>
<div class="row">
    <div class="col-md-12">
         
     <div class="row">
        <div class="col-md-6">
            @if (!empty($getRecord->getProfile()))
            <img style="" width="550px" height="550px"  src="{{ $getRecord->getProfile() }}" alt="">
            @endif 
      </div>
      <div class="col-md-6">
        <p> Name: {{$getRecord->name}}</p>
        <p> Last Name: {{$getRecord->last_name}}</p>
        <p> Email: {{$getRecord->email}}</p>
        <p> Gender: {{$getRecord->sexe}}</p>
        <p> Phone number:{{$getRecord->tel}}</p>
        <p> Address{{$getRecord->address}}</p>
        <p> Date birth:{{ date('d-m-y', strtotime($getRecord->date_birth)) }}</p>
        <p> Date Join: {{ date('d-m-y H:i A', strtotime($getRecord->date_of_joining)) }}</p>
        <p> Job:{{ $getRecord->getJob->name }}</p>
        <p> Department: {{ $getRecord->getDepartment->name }}</p>
        <p> Salary: {{$getRecord->salary}}</p>
        {{-- <p>{{$getRecord->name}}</p> --}}
      
        <p>
            statut  : {{ ($getRecord->status == 1) ? 'Active' : 'inative' }}
        </p>
     </div>
     </div>
      
    </div>
</div> 



@endsection