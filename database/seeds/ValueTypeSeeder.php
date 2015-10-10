<?php

use Illuminate\Database\Seeder;

class ValueTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["type" => "string"],
            ["type" => "integer"],
            ["type" => "float"],
            ["type" => "url"],
            ["type" => "alpha_num"],
            ["type" => "email"],
        ];

        DB::table("value_type")->insert($data);
    }
}
