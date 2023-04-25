@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2">
            <a href="{{ route('clients.create') }}"
               class="w-lg-75 btn btn-success d-flex align-items-center justify-content-around">Add Client <i
                    class="material-icons opacity-10">person_add</i></a>
        </div>
        <div class="col-12 d-flex gap-5">
            @foreach($clients as $client)
                <div class="col-5">
                    <div class="card">
                        <div
                            class="card-header bg-gradient-faded-info text-white font-weight-bold d-flex align-items-center justify-content-between">
                            {{ $client->name }}
                            <div class="actions">
                                <a href="{{ route('clients.edit',$client) }}">
                                    <i class="material-icons text-white opacity-10 cursor-pointer edit-client">border_color</i>
                                </a>
                                <i type="button"
                                   class="material-icons opacity-10 color-red cursor-pointer delete-client"
                                   data-bs-toggle="modal"
                                   data-id="{{$client->id}}" data-bs-target="#client_delete">delete</i>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item font-weight-bold client-copy-data">ID -
                                <strong>{{ $client->id }}</strong>
                                <button
                                    class="copy float-end d-flex align-items-center p-1 mb-0 btn btn-outline-success">
                                    Copy text
                                </button>
                            </li>
                            <li class="list-group-item font-weight-bold client-copy-data">Secret -
                                <strong>{{ $client->secret }}</strong>
                                <button
                                    class="copy float-end d-flex align-items-center p-1 mb-0 btn btn-outline-success">
                                    Copy text
                                </button>
                            </li>
                            <li class="list-group-item font-weight-bold">Personal_access_client
                                - <strong>{{$client->personal_access_client ? "ON" : "OF"}}</strong></li>
                            <li class="list-group-item font-weight-bold">Password_client
                                - <strong>{{$client->password_client ? "ON" : "OF"}}</strong></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('modal.delete')
@endsection

