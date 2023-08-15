<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 注意、このseederクラスは次回、何かしらのseederを実行時は必ずコメントアウトすること
        // 同じ内容が多重にinsertされてしまうため
        $this->call(PlacesMapSeeder::class);
    }
}
