<?php

namespace Database\Seeders;

use Faker\Provider\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servers = ['PHP', 'JS', 'Clojure', 'Java', 'Go', 'Ruby', 'Python', 'Kotlin', 'C++'];
        foreach ($servers as $server) {
            DB::table('_servers')->insert([
                'name' => $server,
                'color' => Color::hexColor(),
            ]);
        }
    }
}
