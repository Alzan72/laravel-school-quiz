<?php

namespace App\Http\Controllers\student;

use App\Models\Student as ModelStudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class student extends Controller
{
    public function index()
    {
        return view('student/index',[
           'post'=> ModelStudent::all()
        ]);
    }


    public function create(Request $insert)
    {
        $this->validate($insert,[
            'name'=>'required|min:5',
            'email'=>'required|min:8',
            'number'=>'required|min:7|max:10',
            'phone'=>'required|min:10|max:12',
            'photo' => 'required|file|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        $image = $insert->file('photo');
        $file=rand().'-'.$image->getClientOriginalName();
        $direktori = 'Student/img';
        $image->move($direktori,$file);
    
        ModelStudent::create([
            'name'     => $insert->name,
            'email'    => $insert->email,
            'number'   =>$insert->number,
            'phone'    =>$insert->phone,
            'photo'     =>$file
        ]);

        return redirect('/student/index')->with('success', 'Succes add your data');

    }

    public function edit(ModelStudent $id)
    {
       return view('student/edit',[
        'id'=>$id
       ]);
    }

    public function update(Request $update, ModelStudent $data)
    {
        $this->validate($update,[
            'name'=>'required|min:5',
            'email'=>'required|min:8',
            'number'=>'required|min:7|max:10',
            'phone'=>'required|min:10|max:12',
            'photo' => 'file|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($update->hasFile('photo')) {

            $file=$update->file('photo');
        $nameFile=rand().'-'.$file->getClientOriginalName();
        $direktori='student/img';
        
        $file->move($direktori,$nameFile);
        // hapus file
        @unlink('/Student/img'.$update->old_photo);

        $data->where('id',$update->id)->update([
            'name'=> $update->name,
            'number'=>$update->number,
            'phone'=>$update->phone,
            'email'=>$update->email,
            'photo'=>$nameFile
        ]);
}
else{
    $data->where('id',$update->id)->update([
        'name'=> $update->name,
        'number'=>$update->number,
        'phone'=>$update->phone,
        'email'=>$update->email
    ]);
}
return redirect('/student/index')->with('success', 'Success update your data');


    }


    public function delete(ModelStudent $delete)
    {
        @unlink('Student/img/'.$delete->photo);

        $delete->delete();
     
         return redirect('/student/index')->with('success', "Success delete your data with name {$delete->name}");
    }

}