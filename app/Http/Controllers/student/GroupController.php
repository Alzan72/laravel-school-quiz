<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\groupstudent;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        
        return view('student.group',[
            'post'=>groupstudent::all(),
            'title'=>'group'
        ]);
    }
    public function group(groupstudent $id)
    {
        return view('student.group_list',[
            
            'post'=>$id,
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
}
