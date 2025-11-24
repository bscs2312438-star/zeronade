<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('created_at', 'desc')->get();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'member_id' => 'required|string|max:255|unique:members,member_id',
            'name' => 'required|string|max:255',
            'bikes_owned' => 'nullable|string',
            'last_oil_change' => 'nullable|date',
            'member_since' => 'nullable|date',
        ]);

        Member::create($request->only([
            'member_id','name','bikes_owned','last_oil_change','member_since'
        ]));

        return redirect()->route('members.index')->with('success','Member created successfully.');
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $request->validate([
            'member_id' => 'required|string|max:255|unique:members,member_id,'.$member->id,
            'name' => 'required|string|max:255',
            'bikes_owned' => 'nullable|string',
            'last_oil_change' => 'nullable|date',
            'member_since' => 'nullable|date',
        ]);

        $member->update($request->only([
            'member_id','name','bikes_owned','last_oil_change','member_since'
        ]));

        return redirect()->route('members.index')->with('success','Member updated successfully.');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success','Member deleted successfully.');
    }
}

