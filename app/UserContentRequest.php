<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserContentRequest
 *
 * @mixin \Eloquent
 * test
 * @property int $id
 * @property int $user_content_id
 * @property int $patient_id
 * @property int $user_id
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContentRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContentRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContentRequest wherePatientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContentRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContentRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContentRequest whereUserContentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserContentRequest whereUserId($value)
 */
class UserContentRequest extends Model
{
    //
    protected $fillable= ['user_content_id', 'patient_id', 'user_id', 'status'];
    //
    function user_content()
    {
        return $this->belongsTo(UserContent::class);
    }
    function user()
    {
        return $this->belongsTo(User::class);
    }
    function isApproved($user_id)
    {
        return $this->user_id == $user_id && $this->status == 'Approved';
    }
}
