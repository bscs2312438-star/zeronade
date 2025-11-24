@extends('layouts.app')

@section('title', 'Admin - Members')

@section('content')
<div class="container" style="margin-top: 100px; padding-bottom: 50px;">
    <h1 style="margin-bottom: 20px;">Members</h1>

    <table border="1" width="100%" cellpadding="10" style="border-collapse: collapse; text-align: center;">
        <thead>
            <tr style="background: #ff1e00; color: #fff;">
                <th>Member ID</th>
                <th>Name</th>
                <th>Member Since</th>
                <th>Last Oil Change</th>
                <th>Bikes Owned</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $member->member_id }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->member_since_formatted }}</td>
                <td>{{ $member->last_oil_change_formatted }}</td>
                <td>{{ $member->bikes_owned ?? '-' }}</td>
                <td>
                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-primary" style="margin-right:5px;">Edit</a>

                    <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top: 20px; text-align: center;">
        <a href="{{ route('members.create') }}" class="btn btn-success" style="padding:10px 20px; font-size:16px;">Add New Member</a>
    </div>
</div>

<!-- Optional inline CSS for buttons -->
<style>
    .btn {
        display: inline-block;
        text-decoration: none;
        color: white;
        padding: 8px 15px;
        border-radius: 5px;
        font-weight: bold;
    }
    .btn-primary { background-color: #007bff; }
    .btn-danger { background-color: #dc3545; }
    .btn-success { background-color: #28a745; }
    .btn:hover { opacity: 0.9; }
</style>
@endsection
