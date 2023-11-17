<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
Schema::create('categories', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->string('status')->nullable();
$table->bigInteger('user_id')->constrained('users')->onUpdated('casecade')->onDeleted('cascade')->nullable();
$table->timestamps();
});
}
public function down(): void
{
Schema::dropIfExists('categories');
}
};
