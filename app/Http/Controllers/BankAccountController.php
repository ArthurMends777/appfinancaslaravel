<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $accounts = $user->accounts()->get();
        return view('accounts.index',compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $requestData = $request->all();
            $requestData['user_id'] = Auth::id(); 
            $requestData['balance'] = 0; 
            BankAccount::create($requestData);
            Session::flash('success', 'Conta bancária cadastrada!');
            return redirect()->back();
        }catch(\Exception $error){
            Session::flash('error', 'Erro ao cadastrar a conta bancária!');
            return redirect()->back()->withErrors($error->getMessage());
        }
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
        $account = BankAccount::find($id);
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $account = BankAccount::find($id);
        try{
            $account->update($request->all());
            Session::flash('success', 'Atualizado com sucesso!');
            return redirect()->back();
        }catch(\Exception $error){
            Session::flash('error', 'Erro ao atualizar a conta bancária!');
            return redirect()->back()->withErrors($error->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
          $account = BankAccount::find($id);
        if($account) {
            $account->delete();
            Session::flash('success', 'Conta bancária deletada com sucesso!'); 
            return redirect()->back(); 
        }
        }catch(\Exception $error){
            Session::flash('error', 'Erro ao deletar a conta bancária!');
        } 
        return redirect()->back();
    }
}
