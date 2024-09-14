<?php

namespace App\Traits;

use App\Scopes\TranslationScope;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait TranslationTrait
{
    public function translations(): HasMany
    {
        return $this->hasMany($this->getClassName(), $this->translationForeignKey(), $this->translationLocalKey());
    }

    public function activeLanguage(): HasOne
    {
        return $this->hasOne($this->getClassName(), $this->translationForeignKey(), $this->translationLocalKey());
    }

    public function translationForeignKey()
    {
        return null;
    }

    public function translationLocalKey()
    {
        return null;
    }

    public function translationClass()
    {
        return null;
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new TranslationScope());
    }

    /**
     * @return string
     */
    private function getClassName(): string
    {
        if (! is_null($this->translationClass())) {
            return $this->translationClass();
        }

        $explodeClassName = $this->getExplodeClassName();
        $lastItem = count($explodeClassName) - 1;

        $className = $explodeClassName[$lastItem] . 'Translation';

        unset($explodeClassName[$lastItem]);

        array_push($explodeClassName, 'Translations', $className);

        return implode('\\', $explodeClassName);
    }

    private function getExplodeClassName(): array
    {
        return explode('\\', get_class($this));
    }
}
