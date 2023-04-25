@extends('layouts.app')

@section('content')
    <div class="row p-2">
        <h4>Edit {{ $client->name }}</h4>
        <form action="{{ route('clients.update',$client) }}" method="POST" class="row flex-column">
            @csrf
            @method('put')
            <div class="col-3">
                <label for="client_name" class="form-label">Name</label>
                <input type="text" class="form-control border-bold m-p-1" name="name" id="client_name" value="{{old('name',$client->name)}}">
            </div>
            <div class="col-3">
                <label for="client_redirect" class="form-label">Redirect</label>
                <input type="text" class="form-control border-bold m-p-1" name="redirect" id="client_redirect" value="{{old('redirect',$client->redirect)}}">
            </div>
            <div class="col-3">
                <label for="client_type" class="form-label">Type</label>
                <select id="client_type" name="type" class="form-select border-bold m-p-1">
                    <option @if(is_null(old('type'))) selected @endif>Choose...</option>
                    <option @if(old('type',$client->personal_access_client) === true) selected @endif value="Personal_access_client" name="personal_access_client">Personal_access_client</option>
                    <option @if(old('type',$client->password_client) === true) selected @endif value="Password_client" name="password_client">Password_client</option>
                </select>
            </div>
            <div class="col-3 mt-2">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>
@endsection

