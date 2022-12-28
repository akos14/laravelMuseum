<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Item;
use App\Models\Label;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = collect();
        $users -> add(User::factory()->create(
            ['name' => 'Admin Admin',
            'email' => 'admin@szerveroldali.hu',
            'password' => Hash::make('adminpwd'),
            'is_admin' => True
            ]
        ));

        $n = rand(5,10);
        for ($i = 1; $i <= $n; $i++){
            $users -> add(User::factory()->create(
                ['email' => 'user'.$i.'@szerveroldali.hu']
            ));
        }
        
        $items = Item::factory(rand(10, 20))->create();
        $labels = Label::factory(rand(10, 25))->create();
        
        $comments = Comment::factory(rand(($items -> count()) * 2,($items -> count()) * 4))->create();

        $comments -> each(function ($c) use (&$users, &$items) {
            $c -> author() -> associate($users -> random()) -> save();
            $c -> item() -> associate($items -> random()) -> save();
        });

        $items -> each(function($i) use (&$labels) {
            $i -> labels() -> attach($labels -> random(rand(1, $labels -> count())));
        });
    }
}
