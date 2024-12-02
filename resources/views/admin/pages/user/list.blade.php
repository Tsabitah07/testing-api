@extends('layout.main')
@section('container')

    <div style="width: 85vw; display: flex; flex-direction: column; align-items: start; margin-top: 5px; padding: 20px">
        <h4 class="text-center" style="margin-bottom: 20px">List of User</h4>
        <table class="table table-hover" style="border: #1a202c 1px solid">
            <thead>
                <tr class="table-active">
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $users)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $users->username }}</td>
                        <td>{{ $users->email }}</td>
                        <td>{{ $users->gender }}</td>
                        <td>
                            <a href="/admin/user/detail/{{ $users->id }}" class="btn btn-outline-primary">Detail</a>
                            <form action="/admin/user/delete/{{ $users->id }}" method="post" class="d-inline">
                                @method('post')
                                @csrf
                                <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
