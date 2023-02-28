<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BrideGroom extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;

    protected $table = 'bridegrooms';

    protected $fillable = [
        'uuid', 'invitations_id',
        'bride_name', 'bride_nickname', 'bride_address', 'bride_instagram', 'bride_photos',
        'bride_daughter', 'bride_father', 'bride_mother',
        'groom_name', 'groom_nickname', 'groom_address', 'groom_instagram', 'groom_photos',
        'groom_son', 'groom_father', 'groom_mother',
    ];

    protected $hidden = [];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class, 'invitations_id', 'id');
    }
}
