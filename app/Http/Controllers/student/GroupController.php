<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\groupstudent;
use App\Models\Latihan\Quiz;
use App\Models\Latihan\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function index()
    {
        return view('student.group',[
            'post'=>groupstudent::where('user_id',Auth::user()->id)->get(),
            'title'=>'group'
        ]);
    }
    public function group(groupstudent $id)
    {  
        return view('student.group_list',[
            
            'post'=>$id,
            'student'=> Student::all(),
            'title'=>'group-list'
        ]);
    }

    public function add()
    {
        return view('student.group_add',[
            'user'=>User::all(),
            'title'=>'group'
        ]);
    }

    public function create(Request $insert)
    {
        $this->validate($insert,[
            'group'=>'required',
            'user'=>'required'
        ]);

        groupstudent::create([
            'user_id'=>$insert->user,
            'group_name'=>$insert->group
        ]);

        return redirect('/group')->with('success','Succes add the group');

    }

    public function edit(groupstudent $edit)
    {
        return view('student.group_edit',[
        'user'=>User::all(),
        'post'=>$edit,
        'title'=>'group']);
    }

    public function update(Request $update, groupstudent $data)
    {
        $this->validate($update,[
            'group'=>'required',
            'user'=>'required'
        ]);
        $data->where('id',$update->id)->update([
            'user_id'=>$update->user,
            'group_name'=>$update->group
        ]);
        return redirect('/group')->with('success','Succes add the group');
    }

    public function add_member(Request $insert, Student $data)
    {
        $this->validate($insert,[
            'group'=>'required',
            'student'=>'required'
        ]);
        $data->where('id',$insert->student)->update([
            'id'=>$insert->student,
            'group_id'=>$insert->group
        ]);

        return redirect("/group/$insert->group")->with('success','Succes add the group');
    }

    public function delete(groupstudent $delete)
    {
        $delete->delete();
        return redirect('/group')->with('success','Succes delete the group');
    }

    public function quiz($group)
    {
        $quiz=Quiz::where('group_id',$group)->get();
        // dd($quiz);
        return view('quiz.groupquiz', compact(['quiz','group']));

    }
}
