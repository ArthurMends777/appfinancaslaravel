<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use Illuminate\Support\Facades\Session;

use function Laravel\Prompts\error;

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
        try{
            $category = ExpenseCategory::findOrFail($id);
            $category->delete();
            Session::flash('success', 'Removido com sucesso!');
            return redirect()->back();
        } catch(\Exception $error){
            Session::flash('error', 'Não foi possível deletar a categoria porque existe transações vinculadas a ela!');
        }

        return redirect()->route('categories.index');
    }
}
