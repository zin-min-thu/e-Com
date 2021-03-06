<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'parent_id',
        'section_id',
        'name',
        'image',
        'discount',
        'description',
        'url',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status'
    ];

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->where('status', 1);
    }

    public function section()
    {
        return $this->belongsTo('App\Section','section_id')->select('id','name');
    }

    public function parent_category()
    {
        return $this->belongsTo('App\Category', 'parent_id')->select('id','name');
    }

    public static function getCategoryDetails($url)
    {
        $catDetails = Category::select('id','parent_id','name','url','description')
                        ->where(['url' => $url, 'status' => 1])
                        ->with(['subcategories' => function($query) {
                                $query->select('id','parent_id','name','description')->where('status',1);
                            }])
                        ->first()->toArray();

        $catIds = array();
        $catIds[] = $catDetails['id'];
        foreach($catDetails['subcategories'] as $key=> $subId) {
            $catIds[] = $subId['id'];
        }

        if($catDetails['parent_id'] == 0) {
            $breadCrumbs = '<a href="'.url($catDetails['url']).'">'.$catDetails['name'].'</a>';
        } else {
            $getParantCategory = Category::select('id','name','url')->where('id', $catDetails['parent_id'])->first()->toArray();
            $breadCrumbs = '<a href="'.url($getParantCategory['url']). '">'.$getParantCategory['name'].'</a>'."&nbsp;/&nbsp;".
                            '<a href="'.url($catDetails['url']). '">'.$catDetails['name'].'</a>';
        }

        return compact('catIds','catDetails','breadCrumbs');
    }
}
