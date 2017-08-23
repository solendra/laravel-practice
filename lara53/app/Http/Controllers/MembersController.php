<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MembersController extends Controller {

    public function index() {
        $members = Member::paginate(10);

        return view('pages.member')->with('members', $members);
    }

    public function create() {

        return view('pages.add-member');
    }

    public function store(Request $request) {
    

        $rules=[
            'name'=>'required|min:3|max:20|alpha',
                'address'=>'required|max:20',
                'email'=>'required|email'
                        
        ];

        $customMsg=[
        'name.required'=>'Please specify name',
        'name.alpha'=>'Please enter alpha value only',
        'address.required'=>'Please provide full address',
        'email.required'=>'Please enter email',
        'email.email'=>'Please enter valid email format'
        ];

        $this->validate($request,$rules,$customMsg);

        Member::create($request->all());


        session()->flash('notify_created', 'Member added Successfully');

        return redirect('members');
    }

    public function show($id) {
        $members = Member::FindOrFail($id);
        return $members;
    }

    public function edit($id) {
        $members = Member::FindOrFail($id);
        return view('pages.edit-member', compact('members'));
    }

    public function update(Request $request, $id) {


        $members = Member::FindOrFail($id);

        $members->update($request->all());

        session()->flash('notify_updated', 'Updated Successfully');

        return redirect('members');
    }

    public function destroy($id) {
        Member::destroy($id);
        session()->flash('notify_deleted', 'Member Deleted Successfully');
        return redirect('members');
    }

    // public function search(Request $request)
    // {
    //   return Member::search('Raj')->raw();
    // }
}
