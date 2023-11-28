<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    public function index(){
        $categories = ExpenseCategory::all();
        return view('categories.index', ['categories' => $categories]);
    }

    // Criar nova categoria
    public function store(Request $request){
        $category = new ExpenseCategory();
        $category->name = $request->input('name');
        $category->transaction_type = $request->input('transaction_type');
        $category->description = $request->input('description');
        $category->color = $request->input('color');
        $category->save();

        return redirect()->route('categories.index');
    }
    // Excluir uma categoria
    public function destroy($id){
        $category = ExpenseCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
