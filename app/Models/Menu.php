<?php

namespace App\Models;

class Menu extends BaseModel
{
    protected $fillable = ['kk_title', 'ru_title', 'en_title', 'kk_link', 'ru_link', 'en_link', 'type', 'order', 'published', 'created_at', 'updated_at'];

    const MENU_TYPES = [
        'TOP_LEFT' => 0,
        'TOP_RIGHT' => 1,
        'BOTTOM_LEFT' => 2,
        'BOTTOM_RIGHT' => 3,
        'SIDEBAR' => 4
    ];

    public static function boot()
    {
        parent::boot();

        self::updated(function ($model) {
            $menus = self::where('parent_id', $model->id)->get();

            $menus->map(function ($item) use ($model) {
                $item->type = $model->type;
                $item->save();
            });
        });

        self::deleting(function ($model) {
            $menus = self::where('parent_id', $model->id)->get();

            $menus->each->delete();

            return $model;
        });
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id')->orderBy('order');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('order');
    }

    // recursive, loads all descendants
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive')->orderBy('order');
    }

    public function scopeOfType($query, $type)
    {
        if (isset(self::MENU_TYPES[$type])) {
            return $query->where('type', self::MENU_TYPES[$type]);
        }
        return $query;
    }

    public function hasChildren()
    {
        return self::where('parent_id', $this->id)->exists();
    }
}
