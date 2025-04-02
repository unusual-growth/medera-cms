<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Get all FAQ translations where answer is not null
        $faqTranslations = DB::table('faq_translations')
            ->whereNotNull('answer')
            ->get();

        // Loop through each translation and wrap the answer in <p> tags if not already wrapped
        foreach ($faqTranslations as $translation) {
            $answer = $translation->answer;

            // Only wrap if not already wrapped in <p> tags
            if (!preg_match('/^<p>.*<\/p>$/s', trim($answer))) {
                // Wrap the answer in <p> tags
                $wrappedAnswer = '<p>' . $answer . '</p>';

                // Update the record
                DB::table('faq_translations')
                    ->where('id', $translation->id)
                    ->update(['answer' => $wrappedAnswer]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
