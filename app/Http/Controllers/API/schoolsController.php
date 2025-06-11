<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\schoolsResource;
use App\Models\schoolsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class schoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return schoolsModel::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        return($request);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $logo = $request->file('logo');
        $logo->storeAs('schools', $logo->hashName());

        //create product
        $schools = schoolsModel::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'logo' => $logo->hashName()
        ]);

        return new schoolsResource(true, 'Data berhasil di tambahkan', $schools);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $d = schoolsModel::find($id);

        return $d;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function update(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
           'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find news by ID
        $schools = schoolsModel::find($id);

        //check if image is not empty
        if ($request->hasFile('logo')) {

            //delete old image
            Storage::delete('schools/' . basename($schools->logo));

            //upload image
            $logo = $request->file('logo');
            $logo->storeAs('schools', $logo->hashName());

            //update news with new image
            $schools->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'kontak' => $request->kontak,
                'logo' => $logo->hashName()
            ]);
        } else {

            //update news without image
            $schools->update([
               'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'alamat' => $request->alamat,
                'kontak' => $request->kontak,
            ]);
        }

        //return response
        return new schoolsResource(true, 'Data Schools Berhasil Diubah!', $schools);
    }


    public function destroy($id)
    {

        //find product by ID
        $product = schoolsModel::find($id);

        //delete image
        Storage::delete('schools/' . basename($product->logo));

        //delete product
        $product->delete();

        //return response
        return new schoolsResource(true, 'Data Product Berhasil Dihapus!', null);
    }
}
