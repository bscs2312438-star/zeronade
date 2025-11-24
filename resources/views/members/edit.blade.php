@extends('layouts.app')

@section('title','Edit Member')

@section('content')
<div class="container" style="margin-top:100px; padding-bottom:50px;">
    <h1>Edit Member</h1>

    @if ($errors->any())
        <div style="background:#f8d7da; color:#721c24; padding:10px; border-radius:5px; margin-bottom:15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('members.update', $member->id) }}" method="POST" class="admin-form">
        @csrf
        @method('PUT')

        <label>Member ID</label>
        <input type="text" name="member_id" value="{{ $member->member_id }}" required>

        <label>Name</label>
        <input type="text" name="name" value="{{ $member->name }}" required>

        <label>Member Since</label>
        <input type="date" name="member_since" value="{{ $member->member_since?->format('Y-m-d') }}">

        <label>Last Oil Change</label>
        <input type="date" name="last_oil_change" value="{{ $member->last_oil_change?->format('Y-m-d') }}">

        <label>Bikes Owned</label>
        <input type="text" name="bikes_owned" value="{{ $member->bikes_owned }}">

        <button type="submit">Update Member</button>
    </form>
</div>
@endsection
