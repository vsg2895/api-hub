@extends('layouts.app')

@section('content')
    <div class="p-3 rounded">
        <h4>{{ Auth::user()->name }}</h4>
        <form action="{{ route('microsoft.teams.users') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-info btn-lg">Upload Users</button>
        </form>
    </div>
@endsection
