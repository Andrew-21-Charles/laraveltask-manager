<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration # Migration file generated from artisian command "php artisan make:migration create_taskmanager"
{
    /**
     * Run the migrations.
     */
    public function up(): void # Database schema for taskmanager db
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); 
            $table->string('title', 255); 
            $table->text('description')->nullable(); 
            $table->enum('priority', ['low', 'medium', 'high']); 
            $table->date('due_date')->nullable(); 
            $table->boolean('completed')->default(false); 
            $table->timestamps(); 
            $table->timestamp('completed_at')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
?>