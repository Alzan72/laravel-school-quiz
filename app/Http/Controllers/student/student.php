<?php

namespace App\Http\Controllers\student;

use App\Models\User;
use App\Models\groupstudent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\Latihan\Student as ModelStudent;



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
        $user=User::where('role','student')->get();
        // dd($user);
        return view('student.insert',[
            'group'=>groupstudent::all(),
            'user'=>$user
        ]);
    }

    public function create(Request $insert)
    {
        // dd($insert);
        $this->validate($insert,[
            'name'=>'required',
            'email'=>'required|min:8',
            'number'=>'required|min:7|max:10',
            'phone'=>'required|min:10|max:12',
            'photo' => 'required|file|mimes:jpeg,png,jpg|max:2048',
            'group' => 'required'
        ]);

        $user=User::create([
            'name'=>$insert->name,
            'password'=>Hash::make($insert->password),
            'email'=>$insert->email,
            'role'=>'student'
        ]);

        $image = $insert->file('photo');
        $file=rand().'-'.$image->getClientOriginalName();
        $direktori = 'Student/img';
        $image->move($direktori,$file);

        ModelStudent::create([
            'user_id'     => $user->id,
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
            'photo' => 'file|mimes:jpeg,png,jpg|max:2048',
            'group'=>'required'
        ]);

        if ($update->hasFile('photo')) {

            $file=$update->file('photo');
        $nameFile=rand().'-'.$file->getClientOriginalName();
        $direktori='Student/img';

        $file->move($direktori,$nameFile);
        // hapus file
        @unlink('Student/img/'.$update->old_photo);

        $data->where('id',$update->id)->update([
            'user_id'=> $update->name,
            'number'=>$update->number,
            'phone'=>$update->phone,
            'email'=>$update->email,
            'photo'=>$nameFile,
            'group_id'=>$update->group
        ]);
}
else{
    $data->where('id',$update->id)->update([
        'name'=> $update->name,
        'number'=>$update->number,
        'phone'=>$update->phone,
        'email'=>$update->email,
        'group_id'=>$update->group
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


    // Add user

    public function adduser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        // dd($request->role);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'=>$request->role
        ]);
            return back();
    }

}
