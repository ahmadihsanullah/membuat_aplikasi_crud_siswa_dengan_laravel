<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_siswa = Student::where('nama_lengkap', 'like', '%'.$request->cari.'%')->get();
        }else{
            $data_siswa = Student::all();
        }
        return view('siswa.index', [
            "data_siswa" => $data_siswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //validasi
        $request->validate(
            [
                'nama_lengkap' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'kelas' => 'required'
            ]
        );

        //simpan data
        Student::create($request->all());

        //redirect
        return redirect()->route('siswa')->with("success", "data berhasil ditambahkan");
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = Student::find($id);
        return view('siswa.edit', ['siswa' => $siswa]);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

         //validasi
         $request->validate(
            [
                'nama_lengkap' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'kelas' => 'required'
            ]
        );

        //simpan data
        $student->update($request->all());

        //redirect
        return redirect()->route('siswa')->with("success", "data berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //cari data
        $student = Student::find($id);

        //hapus data dengan id
        $student->delete($student);

        //redirect
        return redirect()->route('siswa')->with("success", "data berhasil dihapus");

    }
}
