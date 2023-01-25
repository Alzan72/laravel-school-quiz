<?php

namespace App\Http\Controllers;

use App\Models\Latihan\article as artic;
use Illuminate\Http\Request;

class article extends Controller
{
    public function index()
    {
        return view('student.article',[
           'post'=> artic::all()
        ]);
    }

    public function add()
    {
        return view('student/article_insert');
    }

    public function create(Request $insert)
    {
        $this->validate($insert,[
            'title'=>'required|min:5',
            'content'=>'required|min:8',
            'img' => 'required|file|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        $image = $insert->file('img');
        $file=rand().'-'.$image->getClientOriginalName();
      
        $direktori = 'Student/img';
        $image->move($direktori,$file);
    
        artic::create([
            'title'     => $insert->title,
            'img'       =>$file,
            'content'  =>$insert->content
        ]);

        return redirect('/article/index')->with('success', 'Succes add your data');

    }

    public function edit(artic $id)
    {
       return view('student.article_edit',[
        'post'=>$id,
        'title'=> 'index'
       ]);
    }

    public function update(Request $update, artic $data)
    {
        $this->validate($update,[
            'title'=>'required|min:5',
            'content'=>'required|min:8',
            'img' => 'file|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($update->hasFile('img')) {

        $file=$update->file('img');
      
        $nameFile=rand().'-'.$file->getClientOriginalName();
        $direktori='Student/img';
        // dd($update->img_old);
        $file->move($direktori,$nameFile);
        // hapus file
        @unlink('Student/img/'.$update->img_old);

        $data->where('id',$update->id)->update([
            'title'     => $update->title,
            'img'     => $nameFile,
            'content'  =>$update->content
        ]);
}
else{
    $data->where('id',$update->id)->update([
        'title'     => $update->title,
        'content'  =>$update->content
    ]);
}

// if (URL::previousPath() == '/student/'.$update->id) {
//     return redirect()->intended("/student/")->with('success', 'Success update your data');
// }else{
//     return redirect()->intended("$update->url")->with('success', 'Success update your data');
// }
return redirect('/article/index')->with('success', 'Succes update your data');

    }


    public function delete(artic $delete)
    {
        unlink('Student/img/'.$delete->img);
        $delete->delete();
        return redirect('/article/index')->with('success', 'Succes delete your data');
    }
}
