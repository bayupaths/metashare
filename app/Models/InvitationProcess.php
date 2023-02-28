<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitationProcess extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'invitation_process';

    protected $fillable = ['uuid', 'users_id', 'transaction_details_id'];

    protected $hidden = [];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function transaction_detail()
    {
        return $this->hasOne(TransactionDetail::class, 'id', 'transaction_details_id');
    }
}
