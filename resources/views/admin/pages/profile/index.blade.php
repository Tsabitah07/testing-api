@extends('layout.main')
@section('container')

    <div style="width: 85vw; height: 100vh; display: flex; align-items: center; justify-content: center">
        <div style="height: 70vh; width: 40vw; display: flex; flex-direction: column; justify-content: center; align-items: center; border: #1a202c 1px dashed; border-radius: 7px">
            <h4>Data Profile {{ $user->username }}</h4>

            <div style="width: 35vw; height: 40vh; display: flex; flex-direction: row; align-items: center; justify-content: space-evenly">
                <div>
                    <p>Full name</p>
                    <p>Email</p>
                    <p>Gender</p>
                    <p>School Name</p>
                    <p>Address</p>
                </div>
                <div>
                    <p>: {{ $user->name }}</p>
                    <p>: {{ $user->email }}</p>
                    <p>: {{ $user->gender }}</p>
                    <p>: {{ $user->school_name }}</p>
                    <p>: {{ $user->address }}</p>
                </div>
            </div>

            <div style="width: 35vw; height: 5vh; display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 25px">
{{--                <a href="/admin/user/list" class="btn btn-outline-dark" style="width: 130px">Back</a>--}}
                <a href="/admin/profile/edit" class="btn btn-outline-primary" style="width: 130px">Edit</a>
        </div>
    </div>

@endsection
