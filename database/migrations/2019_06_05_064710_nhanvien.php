<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nhanvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact_number');
            $table->timestamps();
        });

        $faker = Faker\Factory::create();

        $limit = 33;

        for ($i = 0 ; $i < $limit ; $i++) {
            DB::table('nhanvien')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'contact_number'=>$faker->phoneNumber,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nhanvien');
    }
}
