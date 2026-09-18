<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabel Kategori Ukuran Pot
        Schema::create('pot_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: Mini (Ø 8-12 cm), Sedang (Ø 15-20 cm), Besar (Ø 25-40 cm)
            $table->string('slug')->unique();
            $table->string('diameter_range');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Tabel Jenis Media Tanam / Tanah
        Schema::create('soil_types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Contoh: Campuran Sukulen/Kaktus, Humus Porous Aroid, Akadama & Kanuma
            $table->string('slug')->unique();
            $table->string('texture_drainage'); // e.g., Sangat Poros / Drainase Cepat
            $table->text('best_for_plants'); // e.g., Monstera, Anthurium, Philodendron
            $table->timestamps();
        });

        // Tabel Produk Pot & Bundling Tanah
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pot_size_id')->constrained()->cascadeOnDelete();
            $table->foreignId('soil_type_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('material'); // e.g., Terracotta Tanah Liat, Keramik Glazed, Semen Teraso
            $table->string('target_plant'); // e.g., Bonsai & Sukulen, Monstera Variegata, Anggrek Premium
            $table->decimal('price', 12, 2);
            $table->integer('stock')->default(10);
            $table->string('image_url')->nullable();
            $table->text('description');
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('soil_types');
        Schema::dropIfExists('pot_sizes');
    }
};