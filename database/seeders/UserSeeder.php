<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use A6digital\Image\Facades\DefaultProfileImage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@scb.cm',
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10)
            ]
        );

        $user->assign('admin');

        $img = DefaultProfileImage::create($user->name);
        Storage::put("avatars/profile.png", $img->encode());
        $imgPath = Storage::path("avatars/profile.png");
        $user->addMedia($imgPath)->toMediaCollection();
        Storage::delete("avatars/profile.png");
    }
}
