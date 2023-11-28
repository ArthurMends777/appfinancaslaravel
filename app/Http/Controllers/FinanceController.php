<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obter o ID do usuário logado (você pode já ter isso de alguma forma)
        $userId = auth()->user()->id;

        // Consultar as transações do usuário
        $transactions = Transaction::where('account_id', $userId)
            ->orderBy('transaction_date', 'desc')
            ->limit(5)
            ->get();

        // Calcular os totais de gastos e ganhos separadamente
        $totalExpenses = Transaction::where('account_id', $userId)
            ->where('transaction_type', 'expense')
            ->sum('amount');

        $totalIncome = Transaction::where('account_id', $userId)
            ->where('transaction_type', 'income')
            ->sum('amount');

        // Calcular o saldo total
        $totalBalance = $totalIncome - $totalExpenses;

        return view('home', [
            'transactions' => $transactions,
            'totalExpenses' => $totalExpenses,
            'totalIncome' => $totalIncome,
            'totalBalance' => $totalBalance,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
