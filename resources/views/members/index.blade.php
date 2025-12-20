@extends('layouts.app')

@section('title', 'Admin - Members')

@section('content')
<div class="container" style="margin-top: 100px; padding-bottom: 50px;">
    <div style="display:flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h1 style="color: white; text-shadow: 2px 2px 0 #000, -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Members</h1>
        <a href="{{ route('products.index') }}" class="btn btn-info" style="padding:10px 15px; background:#6c757d;">Back to Dashboard</a>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
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
                        <a href="{{ route('members.edit', $member->id) }}" class="btn-action btn-edit">Edit</a>

                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn-action btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px; text-align: center;">
        <a href="{{ route('members.create') }}" class="btn-action btn-add">Add New Member</a>
    </div>
</div>

<style>
    body {
        background-image: url("{{ asset('images/boom.jpg') }}");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }
    .admin-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #1e1e1e; /* Dark Bg */
        color: #ffffff; /* White text */
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.5);
    }
    .admin-table th, .admin-table td {
        padding: 15px;
        text-align: center;
        border-bottom: 1px solid #333;
        color: #ffffff;
        vertical-align: middle;
    }
    .admin-table th {
        background-color: #ff1e00;
        color: #ffffff;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 1px;
    }
    .admin-table tr:hover {
        background-color: #2d2d2d;
    }
    
    /* Action Buttons */
    .btn-action {
        display: inline-block;
        padding: 6px 15px;
        border-radius: 4px;
        margin: 0 5px;
        text-decoration: none;
        font-weight: bold;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }
    .btn-edit { background-color: #007bff; color: white; }
    .btn-delete { background-color: #dc3545; color: white; }
    .btn-add { background-color: #28a745; color: white; padding: 10px 20px; font-size: 16px; }
    
    .btn-action:hover { opacity: 0.9; }
</style>
@endsection
