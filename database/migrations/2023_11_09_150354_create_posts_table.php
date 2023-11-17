<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->bigInteger('category_id')->constrained('category')->onUpdated('casecade')->onDeleted('cascade');
    $table->bigInteger('user_id')->constrained('users')->onUpdated('casecade')->onDeleted('cascade');
    $table->string('title');
    $table->text('description');
    $table->text('photo')->nullable();
    $table->string('status')->default(1);
    $table->timestamps();
});
}

public function down(): void
{
Schema::dropIfExists('posts');
}
};
