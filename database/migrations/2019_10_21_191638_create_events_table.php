<?php
use App\Event;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description', 2000);
            $table->string('status')->default(Event::TASK_AVAILABLE);
            $table->string('image');
            $table->integer('expert_id')->unsigned();
            $table->foreign('expert_id')->references('id')->on('experts');
            $table->string('brochure');
            $table->text('objetives');
            $table->text('target');
            $table->text('information');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
