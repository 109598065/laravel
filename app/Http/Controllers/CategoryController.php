<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id')->get();

        //return $categories;
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        Category::create($validated);
        //return $validated;
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /*public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.show', compact('category'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /*public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */

    public function update(CategoryRequest $request, Category $category)
    {
        $validated = $request->validated();
        $category->update($validated);
        return redirect('/categories');
    }
    /*public function update(CategoryRequest $request, $id)
    {
        $validated = $request->validated();
        Category::findOrFail($id)->update($validated);
        return redirect('/categories');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/categories');
    }
    /*public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect('/categories');
    }*/

    /*protected function validateCategory()
    {
        return request()->validate([
            'number' => 'required|unique:categories',
            'name' => 'required'
        ]);
    }*/
}
