@extends('layout.main')
@section('container')

    <div style="width: 85vw; height: 100vh; display: flex; align-items: center; justify-content: center">
        <div style="width: 55vw; height: 70vh; border: #1a202c 1px dashed">
            <h4>{{ $user->username }}</h4>
        </div>
    </div>

@endsection
