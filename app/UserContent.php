<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserContent
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $type
 * @property string $body
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContent whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContent whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContent whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContent whereUserId($value)
 * @mixin \Eloquent
 */
class UserContent extends Model
{
    //
    protected $fillable= ['user_id', 'title', 'type', 'body'];
    //
    function user(){
       return $this->belongsTo(User::class);
    }
    function requests(){
       return $this->hasMany(UserContentRequest::class);
    }
    function getUserRequest($user_id){
        $ucr= UserContentRequest::where([
            ['user_content_id', '=', $this->id],
            ['user_id', '=', $user_id],
        ])->get()->first();
        return $ucr ? $ucr : [];
    }
}
