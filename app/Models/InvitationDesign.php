<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvitationDesign extends Model
{
    use HasFactory;
    use softDeletes;
    use Uuid;

    protected $table = 'invitation_designs';

    protected $fillable = [
        'uuid',
        'name',
        'slug',
        'type',
        'price',
        'code_view',
        'code_demo',
        'cover_one',
        'cover_two',
        'categories_id'
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
