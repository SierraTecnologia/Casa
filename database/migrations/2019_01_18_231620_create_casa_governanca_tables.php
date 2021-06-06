<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasaGovernancaTables extends Migration
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
        Schema::create(
            'governanca_wiki_categories', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('code')->unique();
                $table->primary('code');
                $table->string('name', 255)->nullable();
                $table->string('description', 255)->nullable();
                $table->string('published_at', 255)->nullable();
                $table->boolean('active')->default(true);
                $table->timestamps();
                $table->softDeletes();
            }
        );
        Schema::create(
            'governanca_wiki_categoriables', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('governanca_wiki_category_code');
                $table->string('governanca_wiki_categoriable_id');
                $table->string('governanca_wiki_categoriable_type', 255);
                $table->timestamps();
                $table->softDeletes();
            }
        );

        Schema::create(
            'governanca_rotulos', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('code')->unique();
                $table->primary('code');
                $table->string('name', 255)->nullable();
                $table->string('description', 255)->nullable();
                $table->string('published_at', 255)->nullable();
                $table->boolean('active')->default(true);
                $table->timestamps();
                $table->softDeletes();
            }
        );
        Schema::create(
            'governanca_rotulables', function (Blueprint $table) {
                $table->engine = 'InnoDB';
                $table->string('governanca_rotulo_code');
                $table->string('governanca_rotulable_id');
                $table->string('governanca_rotulable_type', 255);
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('governanca_rotulables');
        Schema::dropIfExists('governanca_rotulos');
        Schema::dropIfExists('governanca_wiki_categoriables');
        Schema::dropIfExists('governanca_wiki_categories');
    }

}
