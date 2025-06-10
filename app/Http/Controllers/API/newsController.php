<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\newsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\newsResource;
use Illuminate\Support\Facades\Storage;

class newsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return newsModel::all();
    }

    // versi 1
    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'judul' => 'required|string|max:255',
    //         'isi' => 'required|string',
    //         'gambar' => 'required|string',
    //         'tanggal' => 'required|date',
    //     ]);

    //     $news = newsModel::create($validated);

    //     return response()->json($news, 201);
    // }

    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal' => 'required|date'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('news', $image->hashName());

        //create product
        $news = newsModel::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'gambar' => $image->hashName(),
            'tanggal' => $request->tanggal,
        ]);

        //return response
        return new newsResource(true, 'Data Product Berhasil Ditambahkan!', $news);
    }

    /**
     * Display the specified resource.
     */
    public function show(newsModel $news)
    {
        return $news;
    }

    /**
     * Update the specified resource in storage.
     */
    // versi 1
    // public function update(Request $request, newsModel $news)
    // {
    //     $validated = $request->validate([
    //         'judul' => 'sometimes|required|string|max:255',
    //         'isi' => 'sometimes|required|string',
    //         'gambar' => 'sometimes|required|string',
    //         'tanggal' => 'sometimes|required|date',
    //     ]);

    //     $news->update($validated);

    //     return response()->json($news);
    // }

    /**
     * Remove the specified resource from storage.
     */

    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'judul' => 'sometimes|required|string|max:255',
            'isi' => 'sometimes|required|string',
            'gambar' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tanggal' => 'sometimes|required|date'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find news by ID
        $news = newsModel::find($id);

        //check if image is not empty
        if ($request->hasFile('gambar')) {

            //delete old image
            Storage::delete('news/' . basename($news->image));

            //upload image
            $image = $request->file('gambar');
            $image->storeAs('news', $image->hashName());

            //update news with new image
            $news->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'gambar' => $image->hashName(),
                'tanggal' => $request->tanggal,
            ]);
        } else {

            //update news without image
            $news->update([
                'judul' => $request->judul,
                'isi' => $request->isi,
                'tanggal' => $request->tanggal,
            ]);
        }

        //return response
        return new newsResource(true, 'Data News Berhasil Diubah!', $news);
    }

    // public function update(Request $request, $id)
    // {
    //     // Validasi data
    //     $validator = Validator::make($request->all(), [
    //         'judul' => 'sometimes|required|string|max:255',
    //         'isi' => 'sometimes|required|string',
    //         'gambar' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'tanggal' => 'sometimes|required|date',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json($validator->errors(), 422);
    //     }

    //     // Temukan data
    //     $news = newsModel::find($id);
    //     if (!$news) {
    //         return response()->json(['message' => 'Data tidak ditemukan'], 404);
    //     }

    //     // Proses update gambar jika ada
    //     if ($request->hasFile('gambar')) {
    //         // Hapus gambar lama jika ada
    //         if ($news->gambar) {
    //             Storage::delete('news/' . $news->gambar);
    //         }

    //         // Simpan gambar baru
    //         $image = $request->file('gambar');
    //         $image->storeAs('news', $image->hashName());

    //         $news->gambar = $image->hashName();
    //     }

    //     // Update field lain jika dikirim
    //     if ($request->filled('judul')) {
    //         $news->judul = $request->judul;
    //     }

    //     if ($request->filled('isi')) {
    //         $news->isi = $request->isi;
    //     }

    //     if ($request->filled('tanggal')) {
    //         $news->tanggal = $request->tanggal;
    //     }

    //     // Simpan perubahan
    //     $news->save();

    //     // Return response
    //     return new newsResource(true, 'Data News Berhasil Diubah!', $news);
    // }

    // public function destroy(newsModel $news)
    // {
    //     $news->delete();

    //     return response()->json(null, 204);
    // }

    public function destroy($id)
    {

        //find product by ID
        $product = newsModel::find($id);

        //delete image
        Storage::delete('news/' . basename($product->gambar));

        //delete product
        $product->delete();

        //return response
        return new newsResource(true, 'Data Product Berhasil Dihapus!', null);
    }
}
