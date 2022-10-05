<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'description', 'status', 'finished_at', 'slug']; //Controller'da kullanabilmek için, verileri tabloya aktarabilmek için kullanıldı
    protected $dates = ['finished_at'];
    protected $appends = ['details','my_rank'];

    public function getMyRankAttribute(){
        $rank=0;
        foreach($this->result()->orderByDesc('point')->get() as $result){
            $rank+=1;
            if(auth()->user()->id==$result->user_id){
                return $rank;
            }
        }
    }

    public function getDetailsAttribute()
    {
        if ($this->result()->count() > 0) {
            return [
                'average' => round($this->result()->avg('point')),
                'join_count' => $this->result()->count()
            ];
        } else {
            return null;
        }
    }

    public function topTen(){
        return $this->result()->orderByDesc('point')->take(10) ;
    }

    public function my_result()
    {
        return $this->hasOne('App\Models\Result')->where('user_id', auth()->user()->id);
    }

    public function result()
    {
        return $this->hasMany('App\Models\Result');
    }

    public function getFinishedAtAttribute($date)
    {
        return $date ? Carbon::parse($date) : null;
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
