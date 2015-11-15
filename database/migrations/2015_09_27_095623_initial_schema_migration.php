<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialSchemaMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("education", function ($table)
        {   $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("title");
            $table->text("description");
            $table->date("from");
            $table->date("to");
            $table->timestamps();
        });

        Schema::create("skill", function ($table)
        {   $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("name");
            $table->text("description");
            $table->integer("proficiency");
            $table->timestamps();
        });

        Schema::create("company", function ($table)
        {   $table->increments("id");
            $table->string("name");
            $table->timestamps();
        });

        Schema::create("experience", function ($table)
        {   $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");
            $table->integer("company_id")->unsigned();
            $table->foreign("company_id")->references("id")->on("company");
            $table->string("title");
            $table->text("description");
            $table->date("from");
            $table->date("to");
            $table->timestamps();
        });

        Schema::create("hobby", function ($table)
        {   $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");
            $table->string("name");
            $table->timestamps();
        });

        Schema::create("language", function ($table)
        {   $table->increments("id");
            $table->string("name");
            $table->timestamps();
        });

        Schema::create("user_language", function ($table)
        {   $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->foreign("user_id")->references("id")->on("users");
            $table->integer("language_id")->unsigned();
            $table->foreign("language_id")->references("id")->on("language");
            $table->integer("proficiency");
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("education");
        Schema::drop("skill");
        Schema::drop("company");
        Schema::drop("experience");
        Schema::drop("hobby");
        Schema::drop("language");
        Schema::drop("user_language");
    }
}
