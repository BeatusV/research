@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(!empty($results))
                <table>
                    <thead>
                    <th>Name</th>
                    <th></th>
                    </thead>
                    @foreach($results as $result)
                        <tr>
                            <td><a href="{{route("profile", ['id' => $result->id])}}">{{$result->name}}</a></td>
                            <td>
                                @if(is_null($result->friend_id))
                                    <form method="POST" action="{{ route('addFriend') }}">{{csrf_field()}}
                                        <input type="hidden" name="friend" value="{{$result->original_id}}"/>
                                        <input type="submit" value="add Friend"/>
                                    </form></td>
                            @else
                                is a {{$result->relation_type}}
                            @endif
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
