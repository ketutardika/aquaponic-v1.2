@extends('layout.master')

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Users Management</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Data Users</li>
  </ol>
</nav>


<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        <h6 class="card-title">Edit Data User </h6>

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

            {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                @csrf
                <div class="row">

                <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">User Name</label>
                    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Email</label>
                    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                </div>
                </div>

                </div>

                <div class="row">

                <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Password</label>
                    {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                </div>
                </div>
                <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Confirm Password</label>
                    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                </div>
                </div>

                </div>
                <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Role User</label>
                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                </div>
                <button type="submit" class="btn btn-primary me-2">Save</button>
                <button class="btn btn-secondary">Cancel</button>
            {!! Form::close() !!}

      </div>
    </div>
  </div>
</div>
@endsection