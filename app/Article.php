<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model
{
    protected $fillable = ['name','body','user_id','published_at'];

    public function getNameAttribute(){
        if(request()->has('search')){
            return str_replace(request('search'),'<mark>'. request('search').'</mark>',$this->attributes['name']);
        }
        else return $this->attributes['name'];
        
    }

    public function getPublished_atAttribute(){
        return Carbon::parse($this->attributes['published_at'])->diffForHumans();
    }


    public function scopeRechercher($q,$search){

        $q->where('name', 'like', "%$search%")
                          ->orWhere('body', 'like', "%$search%");
                    
    }

    public function user(){
        return $this->belongsTo(User::class)->withDefault(); // article appartient à un seul user
    }
}
