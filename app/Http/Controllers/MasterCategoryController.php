<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    //
    public function storecat(Request $request)
    {
        $validate_data = $request->validate([
            'category_name' => 'required|unique:categories,category_name|max:100|min:3',
        ]);

        Category::create($validate_data);

        return redirect()->back()->with('message','Category added successfully');
    }

    public function showcat($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    public function updatecat(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validate_data = $request->validate([
            'category_name' => 'required|unique:categories,category_name,'.$id.'|max:100|min:3',
        ]);

        $category->update($validate_data);

        return redirect()->back()->with('message','Category updated successfully');
    }

    public function deletecat($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->back()->with('message','Category delete successfully');
    }
}
