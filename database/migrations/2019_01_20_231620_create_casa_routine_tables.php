<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasaRoutineTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		/**
		 * Mensal
		 */
		Schema::create('routines', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255)->nullable();
			$table->string('routinable_id')->nullable();
			$table->string('routinable_type', 255)->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
		Schema::create('workers', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255)->nullable();
			$table->string('init', 255)->nullable();
			$table->integer('time');
			$table->string('obs', 255)->nullable();
			$table->string('workerable_id')->nullable();
			$table->string('workerable_type', 255)->nullable();
			$table->timestamps();
            $table->softDeletes();
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('workers');
		Schema::dropIfExists('routines');
	}

}
