<?php

namespace Database\Factories;

use App\Models\BrideGroom;
use Ramsey\Uuid\Uuid as Generator;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BrideGroom>
 */
class BrideGroomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
    */
    protected $model = BrideGroom::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => Generator::uuid4()->toString(),
            'invitations_id' => 1,
            'bride_name' => 'Ratna Sari Astuti',
            'bride_nickname' => 'Ratna',
            'bride_address' => 'Purwokerto Selatan',
            'bride_instagram' => 'http://instagram.com/ratnasariastt',
            'bride_photos' => 'invitations/images/bridegroom/bride.png',
            'bride_daughter' => 2,
            'bride_father' => 'Kifi Norhasis',
            'bride_mother' => 'Rumiati',
            'groom_name' => 'Runa Vha Ningit',
            'groom_nickname' => 'Runa',
            'groom_address' => 'Purwokerto Timur',
            'groom_instagram' => 'http://instagram.com/runavhan',
            'groom_photos' => 'invitations/images/bridegroom/groom.png',
            'groom_son' => 2,
            'groom_father' => 'Iwan Yuli Widianto',
            'groom_mother' => ' Heny Margarini',
        ];
    }
}
