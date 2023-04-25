@extends('layouts.app')

@section('content')
    <div class="bg-light p-3 rounded">
        <h1>Clients</h1>
        @foreach($clients as $client)
            <div class="py-3 text-gray-900">
                <h3 class="text-lg text-gray-500">
                    {{$client->name}}
                    <p>{{$client->redirect}}</p>
                </h3>
            </div>
        @endforeach
    </div>
@endsection
