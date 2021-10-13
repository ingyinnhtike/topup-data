<?php

namespace App\Models\Setting\Language;

use App\Models\Setting\Language\Traits\Attribute\LanguageAttribute;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use LanguageAttribute;

    protected $fillable = [
        'language_name' , 'locale_code' , 'php_locale_code' , 'rtl' , 'enabled'
    ];
}
