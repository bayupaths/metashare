<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'payments';

    protected $fillable = [
        'uuid', 'name', 'code', 'icon', 'digit'
    ];

    protected $hidden = [];

    public function weddingGift()
    {
        return $this->hasMany(WeddingGift::class);
    }
}
