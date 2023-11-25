<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $fillable = ['id', 'account_id', 'transaction_date', 'amount', 'description', 'category_id', 'transaction_type'];
    

    public function account() {
        return $this->belongsTo(BankAccount::class, 'account_id');
    }
    
    public function category() {
        return $this->belongsTo(ExpenseCategory::class, 'category_id');
    }
}
