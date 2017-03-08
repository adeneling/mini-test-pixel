@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Status</div>
                <div class="panel-body">
                    <div class="row">
                    {!! Form::open(['url' => 'tweet']) !!}
                        <div class="col-lg-12">
                            <div class="input-group">
                                <input type="text" name="tweet" class="form-control" placeholder="Update status..">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-primary" type="button">Update</button>
                                </span>
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    {!! Form::close() !!}
                    </div><!-- /.row -->
                </div>
            </div>
        </div>
    </div>
    @foreach($tweets as $tweet)
    @if($tweet->user_id == Auth::user()->id)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <div class="col-md-10">
                            <p align="right">
                            <b>{{ $tweet->user->name }}</b>
                            <br>
                            {{ $tweet->tweet }}    
                            </p>
                            
                        </div>
                        <div class="col-md-1">
                            <a href="#">
                                <img src="{{ asset($tweet->user->photo ? $tweet->user->photo : 'images/user.png') }}" width="50" height="50">
                            </a>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <div class="col-md-1">
                            <a href="#">
                                <img src="{{ asset($tweet->user->photo ? $tweet->user->photo : 'images/user.png') }}" width="50" height="50">
                            </a>
                            
                        </div>
                        <div class="col-md-10">
                            <p>
                                <b>{{ $tweet->user->name }}</b>
                                <br>
                                {{ $tweet->tweet }}    
                            </p>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    @endif
    @endforeach
</div>
@endsection
