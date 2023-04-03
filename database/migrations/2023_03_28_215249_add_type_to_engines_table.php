<?php

use App\Models\Engine;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('engines', function (Blueprint $table) {
            $table->string('type')->default('texten');
        });

        $existingEngine = \App\Models\Engine::where('value', 'gpt-4')->first();
        $isEnginesTableEmpty = \App\Models\Engine::count() === 0;

        if (!$isEnginesTableEmpty) {
            \App\Models\Engine::where('value', 'gpt-3.5-turbo')->update(['type' => 'chat']);
            \App\Models\Engine::where('value', '<>', 'gpt-3.5-turbo')->update(['type' => 'text']);
        }

        if (!$isEnginesTableEmpty && !$existingEngine) {
            \App\Models\Engine::insertOrIgnore([
                'type'  => 'chat',
                'title' => 'GPT-4',
                'value' => 'gpt-4'
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('engines', function (Blueprint $table) {
            $table->dropColumn(['type',]);
        });
    }
};
