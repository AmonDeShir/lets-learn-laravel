<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create("comments", function (Blueprint $table): void {
            $table->id();
            $table->foreignId("idea_id")->constrained()->cascadeOnDelete();
            $table->string("content", 240);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists("comments");
    }
};
