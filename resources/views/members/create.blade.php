@extends('layouts.app')

@section('title', 'Admin - Add Member')

@section('content')
<div class="container" style="margin-top: 100px; padding-bottom: 50px; max-width: 700px;">
    <h1 style="margin-bottom: 20px;">Add New Member</h1>

    @if ($errors->any())
        <div style="background: #f8d7da; padding: 10px; margin-bottom: 15px; border-radius:5px; color:#721c24;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
        @csrf
        <input type="text" name="member_id" placeholder="Member ID" class="form-input" required>
        <input type="text" name="name" placeholder="Full Name" class="form-input" required>
        <input type="date" name="member_since" placeholder="Member Since" class="form-input" required>
        <input type="date" name="last_oil_change" placeholder="Last Oil Change" class="form-input">
        <input type="number" name="bikes_owned" placeholder="Bikes Owned" class="form-input" min="0">

        <div style="text-align: center; margin-top: 20px;">
            <button type="submit" class="btn btn-success">Add Member</button>
            <a href="{{ route('members.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </form>
</div>

<style>
    .form-input {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        width: 100%;
        background: #fff;       /* White background */
        color: #000;            /* Black text */
        font-size: 1rem;
    }
    .form-input::placeholder {
        color: #888;            /* Gray placeholder */
    }
    .btn {
        display: inline-block;
        text-decoration: none;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        margin: 5px;
    }
    .btn-primary { background-color: #007bff; }
    .btn-success { background-color: #28a745; }
    .btn:hover { opacity: 0.9; }
</style>
@endsection
