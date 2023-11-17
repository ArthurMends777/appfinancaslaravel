<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use App\Models\ExpenseCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userID = Auth::id();
        $accounts = BankAccount::where('user_id', $userID)->get();
        $categories = ExpenseCategory::all();
        return view('transactions.create', compact('categories', 'accounts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            Transaction::create($request->all());
            Session::flash('success', 'Transação cadastrada!');
            redirect()->back();
        }catch(\Exception $error){
            Session::flash('error', 'Erro ao cadastrar a transação!');
            redirect()->back()->withErrors($error->getMessage());
        }
        








        return redirect()->route('transactions.create');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
