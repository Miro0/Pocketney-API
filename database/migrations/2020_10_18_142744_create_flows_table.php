<?php

use App\Models\Goal;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->foreignIdFor(User::class);
            $table->unsignedBigInteger('goal_id')->foreignIdFor(Goal::class);
            $table->string('name', 100);
            $table->tinyInteger('direction');
            $table->decimal('value', 8, 2, true);
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
        Schema::dropIfExists('flows');
    }
}
