<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AjaxCrud;
use Validator;

class AjaxCrudController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(AjaxCrud::latest()->get())
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('ajax_index');
    }

    public function store(Request $request)
    {
        $rules = array(
            'nama'    =>  'required|unique:ajax_cruds',
            'nim'     =>  'required|numeric|unique:ajax_cruds',
            'kelas'   =>  'required',
            'jurusan'   =>  'required',

        );

        $messages = array(
            'nama.required' => 'Inputan Nama Harus Di Isi Ya !',
            'nama.unique' => 'Nama Sudah Terdaftar !',
            'nim.required' => 'Inputan NIM Harus Di Isi Ya !',
            'nim.unique' => 'NIM Sudah Terdaftar !',
            'nim.numeric' => 'Inputan NIM Harus Di Isi Pakai Nomer !',
            'kelas.required' => 'Inputan Kelas Harus Di Isi Ya !',
            'jurusan.required' => 'Inputan Jurusan Harus Di Isi Ya !',
           );

        $errors = Validator::make($request->all(), $rules, $messages);

        if($errors->fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $form_data = array(
            'nama'        =>  ucwords($request->nama),
            'nim'         =>  $request->nim,
            'kelas'         =>  ucwords($request->kelas),
            'jurusan'         =>  ucwords($request->jurusan),
        );

        AjaxCrud::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);
    }

    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = AjaxCrud::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'nama'    =>  'required|unique:ajax_cruds',
            'nim'     =>  'required|numeric|unique:ajax_cruds',
            'kelas'   =>  'required',
            'jurusan'   =>  'required',

        );

        $messages = array(
            'nama.required' => 'Inputan Nama Harus Di Isi Ya !',
            'nama.unique' => 'Nama Sudah Terdaftar !',
            'nim.required' => 'Inputan NIM Harus Di Isi Ya !',
            'nim.unique' => 'NIM Sudah Terdaftar !',
            'nim.numeric' => 'Inputan NIM Harus Di Isi Pakai Nomer !',
            'kelas.required' => 'Inputan Kelas Harus Di Isi Ya !',
            'jurusan.required' => 'Inputan Jurusan Harus Di Isi Ya !',
           );

        $errors = Validator::make($request->all(), $rules, $messages);

        if($errors->fails())
        {
            return response()->json(['errors' => $errors->errors()->all()]);
        }

        $form_data = array(
            'nama'        =>  ucwords($request->nama),
            'nim'         =>  $request->nim,
            'kelas'         =>  ucwords($request->kelas),
            'jurusan'         =>  ucwords($request->jurusan),
        );

        AjaxCrud::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);
    }

    public function destroy($id)
    {
        $data = AjaxCrud::findOrFail($id);
        $data->delete();
    }
}