<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'content','channel_id', 'slug'];

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function scopeFilterByChannels($builder)
    {
        if(request()->query('channel')){
            $channel = Channel::where('slug', request()->query('channel'))->first();

            if($channel)
            {
                return $builder->where('channel_id',$channel->id);
            }
        }

        return $builder;
    }
}
