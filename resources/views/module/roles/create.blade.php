@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Roles Management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Data Role and Permission</li>
  </ol>
</nav>


<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Edit Data Role and Permission</h6>


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif


            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                @csrf
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Role Name</label>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Permission</label>
                    <br/>
                    <div class="row mt-2">
                    @foreach($permission as $value)
                    <div class="col-3 mb-3">
                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }} {{ $value->name }}</label>
                    </div>
                    @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary me-2">Add Role</button>
                <a href="{{url()->previous()}}" class="btn btn-secondary">Cancel</a>
            {!! Form::close() !!}
        </div>
    </div>
  </div>
</div>
@endsection