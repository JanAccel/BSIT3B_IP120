<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\UserSubjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('add');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required',
            'role'     => 'required',
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $validated['password'] = Hash::make($request->password);

        User::create($validated);

        return redirect('/home');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $data = User::find($id);

        return view('update', ['user' => $data]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required',
            'role'  => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find($request->id);
        $user->update($validated);

        return redirect('/home');
    }

    public function delete($id)
    {
        $data = User::find($id);

        return view('delete', ['user' => $data]);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();

        return redirect('/home');
    }

    public function user_subjects($id)
    {
        $subjects = Subject::whereHas('user_subjects', function ($q) use ($id) {
            $q->where('user_id', $id);
        })->get();

        return view('user_subjects', [
            'id'       => $id,
            'subjects' => $subjects,
        ]);
    }

    public function add_user_subject($id)
    {
        $subjects = Subject::whereDoesntHave('user_subjects', function ($q) use ($id) {
            $q->where('user_id', $id);
        })->get();

        return view('add_subjects', [
            'id'       => $id,
            'subjects' => $subjects,
        ]);
    }

     public function assign_subject($user_id,$subject_id) {
        $exist = UserSubjects::where('user_id',$user_id)
                            ->where('subject_id', $subject_id)
                            ->first();

    if (!$exist){
        UserSubjects::create(['user_id' => $user_id, 'subject_id' => $subject_id,]);
    }

    return redirect()->route('user_subjects', ['id' => $user_id]); 
 }
}

