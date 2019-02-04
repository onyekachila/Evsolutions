<?php

use Illuminate\Database\Seeder;

use App\Modules\Event\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class)->create([
            'name' => 'Onyekachi Stanley',
            'email' => 'me@me.com',
            'password' => bcrypt('secret'),
            'is_active' => 1,
        ]);

        factory(Event::class, 20)->create();
    }
}
