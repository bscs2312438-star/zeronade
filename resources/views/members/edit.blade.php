@extends('layouts.app')

@section('title','Edit Member')

@section('content')
<div class="container" style="margin-top:100px; padding-bottom:50px;">
    <h1 style="text-align: center; margin-bottom: 20px; color: white; text-shadow: 2px 2px 0 #000, -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;">Edit Member</h1>

    @if ($errors->any())
        <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="form-card">
        <form action="{{ route('members.update', $member->id) }}" method="POST" class="admin-form">
            @csrf
            @method('PUT')
    
            <div class="form-group">
                <label>Member ID</label>
                <input type="text" name="member_id" value="{{ $member->member_id }}" class="form-input" required>
            </div>
    
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ $member->name }}" class="form-input" required>
            </div>
    
            <div class="form-group">
                <label>Member Since</label>
                <input type="date" name="member_since" value="{{ $member->member_since?->format('Y-m-d') }}" class="form-input">
            </div>
    
            <div class="form-group">
                <label>Last Oil Change</label>
                <input type="date" name="last_oil_change" value="{{ $member->last_oil_change?->format('Y-m-d') }}" class="form-input">
            </div>
    
            <div class="form-group">
                <label>Bikes Owned</label>
                <input type="text" name="bikes_owned" value="{{ $member->bikes_owned }}" class="form-input">
            </div>
    
            <div class="form-actions">
                <button type="submit" class="btn-submit">Update Member</button>
                <a href="{{ route('members.index') }}" class="btn-cancel">Cancel</a>
            </div>
        </form>
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
    .form-card {
        background: #1e1e1e; /* Dark Card */
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.5);
        max-width: 600px;
        margin: 0 auto;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #fff; /* White Label */
        font-weight: bold;
    }
    .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #444; /* Dark Border */
        border-radius: 5px;
        background: #2d2d2d; /* Dark Input */
        color: #fff; /* White Text */
        font-size: 16px;
    }
    .form-actions {
        margin-top: 25px;
        text-align: center;
        display: flex;
        gap: 10px;
        justify-content: center;
    }
    .btn-submit {
        background: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
    }
    .btn-cancel {
        background: #6c757d;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
    }
    .btn-submit:hover, .btn-cancel:hover { opacity: 0.9; }
</style>
@endsection
