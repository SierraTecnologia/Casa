<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasaTaskTables extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		/**
		 * Tarefas
		 */
		Schema::create('tasks', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('name', 255)->nullable();
			$table->string('description', 255)->nullable();
			$table->string('date_estimated', 255)->nullable();
			$table->string('done', 255)->nullable();
			$table->string('taskable_id')->nullable();
			$table->string('taskable_type', 255)->nullable();
			$table->timestamps();
            $table->softDeletes();
		});



		Schema::create('displacements', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->string('username', 255)->nullable();
			$table->string('email')->nullable();
			$table->integer('status')->nullable();
			$table->integer('integration_id')->nullable();
			$table->timestamps();
            $table->softDeletes();
		});
        
		Schema::create('displacementables', function (Blueprint $table) {
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->boolean('is_sincronizado')->default(false);
			$table->string('displacementable_id');
			$table->string('displacementable_type', 255);

            $table->integer('displacement_id')->nullable();
            // $table->foreign('displacement_id')->references('id')->on('displacements');
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
		Schema::dropIfExists('displacementables');
		Schema::dropIfExists('displacements');
		Schema::dropIfExists('tasks');
	}

}
