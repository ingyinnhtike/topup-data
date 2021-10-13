<?php

namespace App\Models\Setting\Language;

use Spatie\TranslationLoader\LanguageLine as Lang;

class LanguageLine extends Lang
{
    protected $fillable = ['default_text','group','key','text'];

    protected $casts = [
        'text' => 'json'
    ];
}
