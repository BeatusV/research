@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(!empty($users))
                <table>
                    <thead>
                    <th>Name</th>
                    <th></th>
                    </thead>
                    @foreach($users as $result)
                        <tr>
                            <td><a href="{{route("profile", ['id' => $result->id])}}">{{$result->name}}</a></td>
                            <td>

                                    <form method="POST" action="{{ route('addFriend') }}">{{csrf_field()}}
                                        <input type="hidden" name="friend" value="{{$result->id}}"/>
                                        <input type="submit" value="add Friend"/>
                                    </form></td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
