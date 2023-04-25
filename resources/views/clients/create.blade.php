@extends('layouts.app')

@section('content')
    <div class="row p-2">
        <h4>Create New Client</h4>
        <form action="{{ route('clients.store') }}" method="POST" class="row flex-column">
            @csrf
            <div class="col-3">
                <label for="client_name" class="form-label">Name</label>
                <input type="text" class="form-control border-bold m-p-1" name="name" id="client_name" value="{{old('name')}}">
            </div>
            <div class="col-3">
                <label for="client_redirect" class="form-label">Redirect</label>
                <input type="text" class="form-control border-bold m-p-1" name="redirect" id="client_redirect" value="{{old('redirect')}}">
            </div>
            <div class="col-3">
                <label for="client_type" class="form-label">Type</label>
                <select id="client_type" name="type" class="form-select border-bold m-p-1" >
                    <option @if(is_null(old('type'))) selected @endif>Choose...</option>
                    <option @if(old('type') === 'Personal_access_client') selected @endif value="Personal_access_client" name="personal_access_client">Personal_access_client</option>
                    <option @if(old('type') === 'Password_client') selected @endif value="Password_client" name="password_client">Password_client</option>
                </select>
            </div>
            <div class="col-3 mt-2">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
@endsection
