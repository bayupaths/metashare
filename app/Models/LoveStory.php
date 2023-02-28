<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoveStory extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;

    protected $table = 'love_stories';

    protected $fillable = [
        'uuid', 'invitations_id', 'title', 'story', 'date'
    ];

    protected $hidden = [];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class, 'invitations_id', 'id');
    }
}
