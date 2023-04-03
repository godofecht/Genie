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
        $existingEngine = \App\Models\Engine::where('value', 'gpt-3.5-turbo')->first();
        $isEnginesTableEmpty = \App\Models\Engine::count() === 0;

        if (!$isEnginesTableEmpty && !$existingEngine) {
            \App\Models\Engine::insertOrIgnore([
                'title' => 'GPT-3.5 Turbo',
                'value' => 'gpt-3.5-turbo'
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        \App\Models\Engine::where('value', 'gpt-3.5-turbo')->delete();
    }
};
