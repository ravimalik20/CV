<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use \DB;
use \Exception;

class DescriptionContactMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("users", function ($table)
        {   $table->text("description");
        });

        Schema::create("contact_type", function ($table)
        {   $table->increments("id");
            $table->string("name");
            $table->timestamps();
        });

        Schema::create("value_type", function ($table)
        {   $table->increments("id");
            $table->string("type");
            $table->timestamps();
        });

        Schema::create("user_contacts", function ($table)
        {   $table->increments("id");
            $table->integer("contact_type_id")->unsigned();
            $table->foreign("contact_type_id")->references("id")->on("contact_type");
            $table->string("value");
            $table->integer("value_type_id")->unsigned();
            $table->foreign("value_type_id")->references("id")->on("value_type");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("users", function ($table)
        {   $table->dropColumn("description");
        });

        Schema::drop("contact_type");

        Schema::drop("value_type");

        Schema::drop("user_contacts");
    }
}
