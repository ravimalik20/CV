<?php

use Illuminate\Database\Seeder;

use \DB;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["name" => "facebook"],
            ["name" => "email"],
            ["name" => "twitter"],
            ["name" => "skype"],
            ["name" => "phone"],
            ["name" => "linkedin"],
        ];

        DB::table("contact_type")->insert($data);
    }
}
