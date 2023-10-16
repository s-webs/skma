<?php

namespace App\Models;

class Banner extends BaseModel
{
    protected $fillable = ['kk_link', 'ru_link', 'en_link', 'kk_image', 'ru_image', 'en_image', 'type', 'external', 'created_at', 'updated_at'];

    public function getType()
    {
        if ((int) $this->type === 1) {
            return 'Под вопросы-ответы';
        } else if ((int) $this->type === 2) {
            return 'Нижнее';
        } else if ((int) $this->type === 0) {
            return 'Под меню';
        } else {
            return 'Над футером';
        }
    }

    public function scopeUnderSidebarMenu($query)
    {
        return $query->where('type', 0);
    }

    public function scopeUnderQuestion($query)
    {
        return $query->where('type', 1);
    }

    public function scopeAboveFooter($query)
    {
        return $query->where('type', 3);
    }

    public function scopeBottom($query)
    {
        return $query->where('type', 2);
    }
}
