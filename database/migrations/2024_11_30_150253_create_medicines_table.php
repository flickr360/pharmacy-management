<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class);
            $table->string('medicine_name');
            $table->string('category_id');
            $table->boolean('otc');
            $table->string('supplier');
            $table->integer('quantity');
            $table->timestamp('expires_at')->nullable();
            $table->decimal('unit_price', 10, 2);
            $table->decimal('sell_price', 10, 2);
            $table->timestamps();
        });
        DB::table('medicines')->update([
            'expires_at' => Carbon::now()->addYear(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};
