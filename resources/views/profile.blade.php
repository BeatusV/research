@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="profile-picture">
                <img src="{{$picture->url}}"/>
            </div>

        </div>
        <div class="col-md-7">
            <h3>{{$user->name}}</h3>
            <ul>
                <li>{{$user->place_of_birth}}</li>
                <li>{{$user->date_of_birth}}</li>
            </ul>
        </div>

    </div>
    </div>
@endsection