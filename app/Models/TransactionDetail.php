<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'transaction_details';

    protected $fillable = ['uuid', 'transactions_id', 'invitation_designs_id', 'price', 'invitation_status'];

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'id', 'transactions_id');
    }

    public function invitation_design()
    {
        return $this->hasOne(InvitationDesign::class, 'id', 'invitation_designs_id');
    }
}
