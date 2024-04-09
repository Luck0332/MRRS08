@extends('layout.Employee')

@section('title', 'Account')
@section('content')

<div class="container mt-5">
    <h1>Account Details</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Line ID</th>
                    <th>Reserver ID</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->us_name }}</td>
                    <td>{{ $user->us_fname }}</td>
                    <td>{{ $user->us_lname }}</td>
                    <td>{{ $user->us_tel }}</td>
                    <td>{{ $user->us_email }}</td>
                    <td>{{ $user->roles }}</td>
                    <td>{{ $user->us_lineid }}</td>
                    <td>{{ $user->reserver_id }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
