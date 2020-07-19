<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.category.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.category.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    Category::create($this->validateCategory($request));

    return redirect()->route('admin.category.index')->withSuccess('Data berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    return view('admin.category.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category)
  {
    $category->update($this->validateCategory($request, $category->id));

    return redirect()->route('admin.category.index')->withInfo('Data berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    $category->delete();

    return redirect()->route('admin.category.index')->withDanger('Data berhasil dihapus');
  }

  public function validateCategory($request, $id = null)
  {
    $validateCategory = $request->validate([
      'name' => [
        'required', 'min:3', 'max:255',
        Rule::unique('categories')->ignore($id)
      ],
    ]);

    $validateCategory['name'] = strtolower($validateCategory['name']);
    $validateCategory['slug'] = Str::slug($validateCategory['name']);

    return $validateCategory;
  }
}
