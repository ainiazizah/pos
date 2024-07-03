<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::all();
        return view('category.create', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_category' => 'required|string|min:2|max:50'
        ], [
            'name_category.required' => 'Nama Kategori harus diisi',
            'name_category.min' => 'Nama Kategori minimal diisi 2 karakter',
            'name_category.max' => 'Nama Kategori maksimal diisi 50 karakter'
        ]);

        Category::create($validatedData);
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_category)
    {
        $data['category'] = Category::find($id_category);
        return view('category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name_category' => 'required|min:2|max:50',
        ], [
            'name_category.required' => 'Nama Kategori harus diisi',
            'name_category.min:2' => 'Nama Kategori minimal diisi 2 karakter',
            'name_category.max:50' => 'Nama Kategori maksimal diisi 50 karakter',
        ]);
        Category::where('id', $id)->update($validatedData);
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_category)
    {
        $fotoProduk = Product::select('*')
            ->where('id_category', $id_category)
            ->get();

        foreach ($fotoProduk as $foto) {
            $path = 'storage/' . $foto->image_product;
            // unlink($path);
        }

        Category::destroy($id_category);
        return redirect('/category');
    }
}
