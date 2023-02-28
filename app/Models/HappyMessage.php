<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HappyMessage extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'happy_messages';

    protected $fillable = [
        'uuid', 'invitations_id', 'name', 'message', 'status'
    ];

    protected $hidden = [];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class, 'invitations_id', 'id');
    }
}
