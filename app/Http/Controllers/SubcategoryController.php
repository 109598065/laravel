<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\SubcategoryRequest;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$subcategories = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('subcategories.*', 'categories.number')
            ->get();*/

        $subcategories = Subcategory::with('category')->orderBy('id')->get();

        //return $subcategories;
        return view('subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('subcategories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryRequest $request)
    {
        /*$subcategory = new Subcategory();
        $category_number = $request->input('category_number');
        $category_id = Category::where('number', $category_number)->select('id')->first()->id;
        $subcategory->category_id = $category_id;
        $subcategory->name = $request->name;
        $subcategory->save();*/
        //return $request->input('category_id');

        $validated = $request->validated();
        Subcategory::create($validated);

        return redirect('/subcategories');
    }

    /**
     * Display the specified resource.
     *
     * @param Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        return view('subcategories.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        //return  compact('subcategory','categories');
        return view('subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SubcategoryRequest $request
     * @param Subcategory $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryRequest $request, Subcategory $subcategory)
    {
        $validated = $request->validated();
        $subcategory->update($validated);
        return redirect('/subcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Subcategory $subcategory
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect('/subcategories');
    }

    /*protected function validateSubcategory()
    {
        return request()->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required'
        ]);
    }*/
}
