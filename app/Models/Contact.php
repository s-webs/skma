<?php

namespace App\Models;

class Contact extends BaseModel
{

    const TYPE_SOCIAL = 0;
    const TYPE_ABOUT = 1;

    protected $fillable = ['ru_title', 'kk_title', 'en_title', 'ru_link', 'kk_link', 'en_link', 'external', 'type', 'created_at', 'updated_at'];

    public function getType()
    {
        $types = [
            self::TYPE_SOCIAL => 'Мы в социальных сетях',
            self::TYPE_ABOUT => 'Про нас'
        ];

        return $types[$this->type] ?? 'Неизвестный тип';
    }
}
