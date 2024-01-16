<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\ActiveScope;

class SubSection extends Model
{
    use HasFactory;

    protected $table = 'sub_sections';

    protected $fillable = [
        'section_id',
        'title_ar',
        'title_en',
        'description_ar', 
        'description_en',
        'url',
        'active',
        'is_banner',
        'image',
        'category_id',
        'created_at'
    ];
    
    //public $timestamps = false;

    protected $appends = ['description','title'];

    public function getDescriptionAttribute()
    {
        return $this->{'description_'. app()->getLocale()};
    }

    public function getTitleAttribute()
    {
        return $this->{'title_'. app()->getLocale()};
    }

    public function sections()
    {
        return $this->belongsTo(Section::class);
    }

    public function subSectionImages()
    {
        return $this->hasMany(SubSectionImage::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }
    
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ActiveScope());
    }

}
