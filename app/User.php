<?php

namespace App;

use App\Traits\ImageTrait;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

/**
 * App\Models\User.
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property Carbon|null $email_verified_at
 * @property string|null $password
 * @property int|null $created_by
 * @property bool $set_password
 * @property int $is_email_verified
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIsEmailVerified($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereSetPassword($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @property string $image
 * @method static Builder|User whereImagePath($value)
 * @mixin Eloquent
 * @property string $image_path
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 */
class User extends Authenticatable
{
    use Notifiable, ImageTrait;
    use ImageTrait {
        deleteImage as traitDeleteImage;
    }

    public $table = 'users';
    const IMAGE_PATH = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'email_verified_at',
        'image_path',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'set_password'      => 'boolean',
        'image_path'      => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name'                  => 'required|unique:users,name',
        'email'                 => 'required|email|unique:users,email|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/',
        'phone'                 => 'nullable|numeric|digits:10',
        'password'              => 'nullable|min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'nullable|min:6',
    ];

    public static $messages = [
        'phone.digits'     => 'The phone number must be 10 digits long.',
        'email.regex'      => 'Please enter valid email.',
        'photo.mimes'      => 'The profile image must be a file of type: jpeg, jpg, png.',
    ];

    public static $setPasswordRules = [
        'user_id'               => 'required',
        'password'              => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6',
    ];

    /**
     * @param $value
     *
     * @return string
     */
    public function getImagePathAttribute($value)
    {
        if (!empty($value)) {
            return $this->imageUrl(self::IMAGE_PATH.DIRECTORY_SEPARATOR.$value);
        }

        return getUserImageInitial($this->id, $this->name);
    }

    /**
     * @return bool
     */
    public function deleteImage()
    {
        $image = $this->getOriginal('image_path');
        if (empty($image)) {
            return true;
        }

        return $this->traitDeleteImage(self::IMAGE_PATH.DIRECTORY_SEPARATOR.$image);
    }
}
