<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBossControlAcaoHumanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Identificador Unico para Estatisticas
         */
        Schema::create(
            'acao_humanas', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('fingerprint')->unique();
                $table->primary('fingerprint');
                $table->string('name')->nullable();
                $table->string('title')->nullable();
                $table->string('people_slug')->nullable();
                $table->string('start_init')->nullable();
                // $table->string('start_init')->nullable();
                // $table->string('start_init')->nullable();
                // $table->string('start_init')->nullable();
                $table->timestamps();
            }
        );

        // Para Previsões Futuras
        Schema::create(
            'estimates', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('originalEstimateSeconds')->nullable();
                $table->integer('remainingEstimateSeconds')->nullable();
                $table->integer('timeSpentSeconds')->nullable();
                $table->string('estimatable_id');
                $table->string('estimatable_type'); 
                $table->timestamps();
            }
        );

        // Para Previsões Futuras
        Schema::create(
            'spents', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->integer('collaborator_id')->nullable();
                $table->integer('user_id')->nullable();
                $table->timestamp('initwork')->nullable();
                $table->integer('tempo_gasto')->nullable();
                $table->timestamps();
            }
        );

        Schema::create(
            'spentables', function (Blueprint $table) {
                $table->integer('spent_id');
                $table->integer('spentable_id');
                $table->string('spentable_type'); 
                $table->timestamps();
            }
        );

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spentables');
        Schema::dropIfExists('spents');
        Schema::dropIfExists('estimates');
    }
}
