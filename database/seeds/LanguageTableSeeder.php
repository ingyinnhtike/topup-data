<?php

use Carbon\Carbon;
use Database\DisableForeignKeys;
use Database\TruncateTable;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('languages');

        $languages = [
            [
                'id'                => 1,
                'language_name'     => 'English',
                'locale_code'       => 'en',
                'php_locale_code'   => 'en_US',
                'rtl'               => false,
                'enabled'           => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]
        ];

        DB::table('languages')->insert($languages);

        $this->enableForeignKeys();
    }
}
