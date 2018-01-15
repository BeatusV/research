@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-md-2">
            <div>
                <img src="{{$picture->url}}"/>
            </div>

        </div>
        <div class="col-md-push-1 col-md-9">
            <h3>{{Auth::user()->name}}</h3>
            <ul>
                <li>{{Auth::user()->place_of_birth}}</li>
                <li>{{Auth::user()->date_of_birth}}</li>
            </ul>
        </div>

    </div>
    </div>
@endsection