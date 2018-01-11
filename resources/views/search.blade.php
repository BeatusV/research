@extends('layouts.app')

@section('content')
    <form  method="POST" action="{{ route('searchPost') }}">
        {{ csrf_field() }}
        <input type="text" name="searchValue"/>
        <input type="submit" value="search"/>
    </form>

    @if(!empty($results))
        <table>
            <thead>
                <th>Name</th>
                <th>Relation</th>
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
                            Is a friend
                        @endif
                </tr>
            @endforeach
        </table>
    @endif
@endsection
