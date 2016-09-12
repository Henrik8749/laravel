<?php

class SettingsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::table('settings')->truncate();

        DB::table('settings')->insert(array(
            'flashcard_count'       =>  10,
            'answer_ability_count'  =>  7
        ));
    }

}
