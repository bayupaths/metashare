<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invitation extends Model
{
    use HasFactory;
    use softDeletes;
    use Uuid;

    protected $table = 'invitations';

    protected $fillable = [
        'uuid',
        'transaction_details_id',
        'title',
        'image',
        'slug',
        'description',
        'active_date',
        'active_status'
    ];

    protected $hidden = [];

    public function brideGroom()
    {
        return $this->hasOne(BrideGroom::class, '', '');
    }

    public function wedding()
    {
        return $this->hasMany(Wedding::class);
    }

    public function weddingMedia()
    {
        return $this->hasMany(WeddingMedia::class);
    }

    public function invitedGuests()
    {
        return $this->hasMany(InvitedGuest::class);
    }

    public function loveStories()
    {
        return $this->hasMany(LoveStory::class);
    }

    public function weddingGifts()
    {
        return $this->hasMany(WeddingGift::class);
    }

    public function happyMessages()
    {
        return $this->hasMany(HappyMessage::class);
    }
}
