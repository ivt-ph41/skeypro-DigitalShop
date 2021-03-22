@extends('admin.layouts.app')
@section('content')
    <div class="table-responsive">
        <table class='table table-bodered shadow'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Balance</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                
                @endforeach
            </tbody>
        </table>
    </div>
@endsection