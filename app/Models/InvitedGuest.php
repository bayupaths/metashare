<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvitedGuest extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;

    protected $table = 'invited_guests';

    protected $fillable = [
        'uuid', 'invitations_id', 'name', 'address', 'links'
    ];

    protected $hidden = [];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class, 'invitations_id', 'id');
    }
}
