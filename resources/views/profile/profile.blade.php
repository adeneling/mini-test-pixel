@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        {!! Form::model($user, ['route' => ['profile.update', $user],'method' =>'put', 'files' => true,'role'=>'form','class'=>'form-horizontal'])!!}
        {{ csrf_field() }}
            <div class="col-md-4"> 
                <div class="panel panel-primary">
                    <div class="panel-heading"><center>Avatar</center></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <center><img src="{{ asset($user->photo ? $user->photo : 'images/user.png') }}" class="img-responsive"></center>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <td>{!! Form::file('photo', null, ['class'=>'btn btn-primary']) !!}</td>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading">Personal Data</div>
                        <div class="panel-body">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-3 control-label">Name</label>
                                <div class="col-md-9">
                                    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Name']) !!}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-3 control-label">E-Mail Address</label>
                                <div class="col-md-9">
                                    {!! Form::text('email', null, ['class'=>'form-control','placeholder'=>'Email']) !!}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-3 control-label">Password</label>
                                <div class="col-md-9">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-10">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
