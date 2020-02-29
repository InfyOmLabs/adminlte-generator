<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Collection;
use Spatie\Permission\Contracts\Permission as PermissionContract;
use Spatie\Permission\Exceptions\PermissionDoesNotExist;
use Spatie\Permission\Guard;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\Permission.
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property string|null $guard_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permission extends Model implements PermissionContract
{
    use HasRoles;
    public $table = 'permissions';
    const MANAGE_USERS = 'manage_users';

    public $fillable = [
        'name',
        'display_name',
        'description',
        'guard_name',
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'           => 'integer',
        'name'         => 'string',
        'display_name' => 'string',
        'description'  => 'string',
        'guard_name'   => 'string',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name'         => 'required|unique:permissions,name',
        'display_name' => 'required',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function (self $role) {
            if (empty($role->guard_name)) {
                $role->guard_name = Guard::getDefaultName(static::class);
            }
        });
    }

    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            config('permission.models.role'),
            config('permission.table_names.role_has_permissions'),
            'permission_id',
            'role_id'
        );
    }

    /**
     * A permission belongs to some users of the model associated with its guard.
     */
    public function users(): MorphToMany
    {
        return $this->morphedByMany(
            getModelForGuard($this->attributes['guard_name']),
            'model',
            config('permission.table_names.model_has_permissions'),
            'permission_id',
            config('permission.column_names.model_morph_key')
        );
    }

    /**
     * Find a permission by its name (and optionally guardName).
     *
     * @param string      $name
     * @param string|null $guardName
     *
     * @throws PermissionDoesNotExist
     *
     * @return PermissionContract
     */
    public static function findByName(string $name, $guardName = null): PermissionContract
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['name' => $name, 'guard_name' => $guardName])->first();
        if (!$permission) {
            throw PermissionDoesNotExist::create($name, $guardName);
        }

        return $permission;
    }

    /**
     * @param int         $id
     * @param null|string $guardName
     *
     * @return PermissionContract
     */
    public static function findById(int $id, $guardName = null): PermissionContract
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['id' => $id, 'guard_name' => $guardName])->first();

        if (!$permission) {
            throw PermissionDoesNotExist::withId($id);
        }

        return $permission;
    }

    /**
     * Find or create permission by its name (and optionally guardName).
     *
     * @param string      $name
     * @param string|null $guardName
     *
     * @return PermissionContract
     */
    public static function findOrCreate(string $name, $guardName = null): PermissionContract
    {
        $guardName = $guardName ?? Guard::getDefaultName(static::class);
        $permission = static::getPermissions(['name' => $name, 'guard_name' => $guardName])->first();

        if (!$permission) {
            return static::query()->create(['name' => $name, 'guard_name' => $guardName]);
        }

        return $permission;
    }

    /**
     * @param array $params
     *
     * @return Collection
     */
    protected static function getPermissions(array $params = []): Collection
    {
        return app(PermissionRegistrar::class)->getPermissions($params);
    }
}
