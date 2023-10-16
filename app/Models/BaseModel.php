<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    /**
     * Получает локализованное значение свойства на основе текущей локали.
     *
     * @param string $property Название исходного свойства.
     * @return string|null Локализованное значение свойства или null, если свойство не существует.
     */
    public function getProperty(string $property): ?string
    {
        $localizedProperty = app()->getLocale() . '_' . $property;

        // Вернуть локализованное свойство, если оно существует, иначе null.
        return $this->attributes[$localizedProperty] ?? null;
    }
}
