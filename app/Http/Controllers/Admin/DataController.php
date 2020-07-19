<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
  public function categories()
  {
    return datatables()->of(Category::latest())
      ->addColumn('action', 'admin.category.action')
      ->addIndexColumn()
      ->rawColumns(['action'])
      ->toJson();
  }
}
