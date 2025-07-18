<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->foreignIdFor(\App\Models\User::class)->constrained();
            $table->timestamps();
        });

        Schema::table('jobs', function(Blueprint $table){
            $table->foreignIdFor(\App\Models\Employer::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            // Remove a foreign key primeiro
            $table->dropForeign(['employer_id']);

            // Depois remove a coluna
            $table->dropColumn('employer_id');
        });

        Schema::dropIfExists('employers');
    }
};
