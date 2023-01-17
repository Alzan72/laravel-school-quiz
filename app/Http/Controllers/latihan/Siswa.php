<?php

namespace App\Http\Controllers\latihan;

use App\Http\Controllers\Controller;
use App\Models\Siswa as ModelsSiswa;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Siswa extends Controller
{
public function index()
{
    return view('/siswa/siswa' , [
        "data"=>ModelsSiswa::all()
    ]);
}

public function edit(ModelsSiswa $id)
{
    return view('/siswa/siswaEdit', [
        "id"=>$id
    ]);
}

public function update(Request $edit , ModelsSiswa $post)
{   
    // var_dump($edit->file);die;
    $this->validate($edit,[
        'nama'=>'required|min:5',
        'email'=>'required|min:8',
        'file' => 'mimes:png,jpeg,jpg|max:2048'
    ]);
    if ($edit->hasFile('file')) {
        $file=$edit->file('file');
        $nameFile=rand().'-'.$file->getClientOriginalName();
        $direktori='Siswa/img';
        
        $file->move($direktori,$nameFile);
        // hapus file
        @unlink('Siswa/img'.$post->foto);
        

        $post->where('id',$edit->id)->update([
            'Nama'=> $edit->nama,
            'email'=> $edit->email,
            'foto'=>$nameFile
        ]);

    }else{
        $post->where('id',$edit->id)->update([
            'Nama'=> $edit->nama,
            'email'=>$edit->email
        ]);
    }
   

    return redirect('/siswa/siswa');
}






public function create()
 {
    return view('siswa/siswaCreate');
 }

public function input(Request $upload)
{
    $this->validate($upload,[
        'nama'=>'required|min:5',
        'email'=>'required|min:8',
        'file' => 'required|file|mimes:jpeg,png,jpg|max:2048'
    ]);

    $image = $upload->file('file');
    $file=rand().'-'.$image->getClientOriginalName();
    $direktori = 'Siswa/img';
	$image->move($direktori,$file);

    ModelsSiswa::create([
        'Nama'     => $upload->nama,
        'email'    => $upload->email,
        'foto'     =>$file
    ]);
    // notif sukses
    // session()->flash('message', 'Data siswa telah berhasil dimasukkan');

    return redirect('/siswa/siswa')->with('success', 'Data Siswa Berhasil Ditambahkan');
}


public function delete(ModelsSiswa $id)
{
// var_dump('Siswa/img/'.$id->foto);die;
 @unlink('Siswa/img/'.$id->foto);

   $id->delete();

    return redirect('/siswa/siswa');
}


}

 
