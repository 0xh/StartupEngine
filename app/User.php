<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Contracts\UserResolver;

class User extends Authenticatable implements AuditableContract, UserResolver, \Illuminate\Contracts\Auth\Authenticatable
{
    use Auditable;

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditInclude = [
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * Auditable events.
     *
     * @var array
     */
    protected $auditableEvents = [
        'created',
        'updated',
        'deleted',
        'restored',
    ];

    public function role()
    {
        $role = Role::where('id', '=', \Auth::user()->role_id)->first();
        return $role;
    }

    /**
     * {@inheritdoc}
     */
    public static function resolveId()
    {
        return \Auth::check() ? \Auth::user()->getAuthIdentifier() : null;
    }

}