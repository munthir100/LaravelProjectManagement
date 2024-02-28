<?php

use App\Models\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('short_description', 100);
            $table->integer('number_of_team_members');
            $table->dateTime('deadline');
            $table->text('description')->nullable();
            $table->text('goals')->nullable();
            $table->text('vision')->nullable();
            $table->integer('priority')->nullable();
            $table->string('type')->nullable();
            $table->integer('progress_percentage')->nullable()->default(0);
            $table->decimal('budget', 10, 2)->nullable();
            $table->foreignId('status_id')->default(Status::NEW)->constrained();
            $table->foreignId('account_id')
                ->references('id')
                ->on('accounts')
                ->cascadeOnDelete();
            $table->foreignId('parent_id')
                ->nullable()
                ->references('id')
                ->on('projects')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
