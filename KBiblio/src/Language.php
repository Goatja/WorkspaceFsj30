<?php

namespace KBiblio;

class Language
{
    private $translations = [];

    public function __construct($lang)
    {
        $langFile = __DIR__ . '/../locales/' . $lang . '.json';
        if (file_exists($langFile)) {
            $this->translations = json_decode(file_get_contents($langFile), true);
        } else {
            // Fallback to English if language file not found
            $this->translations = json_decode(file_get_contents(__DIR__ . '/../locales/en.json'), true);
        }
    }

    public function get($key)
    {
        return $this->translations[$key] ?? $key;
    }
}
