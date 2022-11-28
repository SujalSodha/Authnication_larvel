<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id("customer_id"); // id -> custome_id
            $table->string("name", 50);
            $table->string("email");
            $table->enum("gender", ['M', 'F', 'O']);
            $table->date("dob")->nullable();
            $table->text("address");
            $table->string("password");
            $table->boolean("status")->default(true);
            $table->integer("points")->default("0");
            $table->timestamps(); // create_at , update_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
