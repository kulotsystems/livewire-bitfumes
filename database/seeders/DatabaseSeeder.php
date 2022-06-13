<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\SupportTicket;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name'   => 'Kulot Systems',
             'email'  => 'test@kulotsystems.tech',
         ]);

         SupportTicket::factory(3)->create();

        Comment::factory()->create([
            'body'    => 'This is first comment',
            'user_id' => 1,
            'support_ticket_id' => 1
        ]);
    }
}
