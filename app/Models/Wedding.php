<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wedding extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;

    protected $table = 'weddings';

    protected $fillable = [
        'uuid', 'invitations_id', 'title', 'slug', 'start_date', 'end_date',
        'address', 'place', 'maps_address'
    ];

    protected $hidden = [];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class, 'invitations_id', 'id');
    }
}
