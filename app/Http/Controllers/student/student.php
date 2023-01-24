<?php

namespace App\Http\Controllers\student;

use App\Models\Latihan\Student as ModelStudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\groupstudent;

class student extends Controller
{
    public function index()
    {
        return view('student.index',[
           'post'=> ModelStudent::all()
        ]);
    }

    public function add()
    {
        return view('student/insert',['group'=>groupstudent::all()]);
    }

    public function create(Request $insert)
    {
        $this->validate($insert,[
            'name'=>'required|min:5',
            'email'=>'required|min:8',
            'number'=>'required|min:7|max:10',
            'phone'=>'required|min:10|max:12',
            'photo' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'group' => 'required'
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
            'photo'     =>$file,
            'group_id'  =>$insert->group
        ]);

        return redirect('/student/index')->with('success', 'Succes add your data');

    }

    public function edit(ModelStudent $id)
    {
       return view('student.edit',[
        'id'=>$id,
        'group'=> groupstudent::all()
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
        $direktori='Student/img';
        
        $file->move($direktori,$nameFile);
        // hapus file
        @unlink('Student/img/'.$update->old_photo);

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

// if (URL::previousPath() == '/student/edit/'.$update->id) {
//     return redirect()->intended("/student/index")->with('success', 'Success update your data');
// }else{
//     return redirect()->intended("$update->url")->with('success', 'Success update your data');
// }
return redirect()->intended("$update->url")->with('success', 'Success update your data');


    }


    public function delete(Request $delete , ModelStudent $data)
    {
        if ($delete->has('remove')) {
            $del=$delete->remove;
            foreach( $del as $rem){
                $dualdata=explode(',',$rem);
                $id=$dualdata[0];
                $file=$dualdata[1];
                @unlink('Student/img/'.$file);
                $data->where('id',$id)->delete();
    
            }
            return redirect()->back()->with('success', "Success delete your data");
        }
       
         
         return redirect('/student/index')->with('error', "Choose data are you want to delete!!");
    }

    

}