<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Psy\Util\Str;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [

            'title',
            'description',
            'surface',
            'rooms',
            'bedrooms',
            'floor',
            'price',
            'city',
            'adress',
            'postal_code',
            'sold',
            'image',
    ];

    protected $casts =[
        'sold'=> 'boolean'
    ];

    public function options():BelongsToMany
    {
        return $this->belongsToMany(Option::class);


    }

    public function getSlug():string
    {
       return \Illuminate\Support\Str::slug($this->title);
    }
    public function scopeAvailable(Builder $builder): Builder
    {
        return $builder->where('sold', false);
    }

    public function scopeRecent(Builder $builder): Builder
    {
        return $builder->orderBy('create_at', 'desc');
    }

    public function imageURL() : string
    {
        return Storage::url($this->image);
    }


}
