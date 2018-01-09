@extends('layouts.app')

@section('content')
    <form  method="POST" action="{{ route('searchPost') }}">
        {{ csrf_field() }}
        <input type="text" name="searchValue">
        <input type="submit" value="search">
    </form>

    @if(!$results->isEmpty())
        <table>
            <thead>
                <th>Name</th>
                <th>Relation</th>
            </thead>
            @foreach($results as $result)
                <tr>
                    <td>{{$result->name}}</td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    @endif
@endsection
