<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'transactions';

    protected $fillable = ['uuid', 'users_id', 'total_price', 'transaction_status', 'code'];


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function transaction_detail()
    {
        return $this->belongsTo(TransactionDetail::class, 'transaction_id', 'id');
    }
}
