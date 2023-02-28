<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'wish_lists';

    protected $fillable = ['uuid', 'users_id', 'invitation_designs_id'];

    protected $hidden = [];


    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function model_invitation()
    {
        return $this->hasOne(InvitationDesign::class, 'id', 'invitation_designs_id');
    }
}
