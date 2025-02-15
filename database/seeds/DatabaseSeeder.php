<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(AccessTableSeeder::class);
//        $this->call(HistoryTypeTableSeeder::class);
        $this->call(LanguageTableSeeder::class);
//        $this->call(TranslationTableSeeder::class);
//        $this->call(ClientTranslationTableSeeder::class);

        Model::reguard();
    }
}
