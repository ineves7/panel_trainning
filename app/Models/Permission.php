<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'guard_name'
    ];

    public function information(): HasOne
    {
        return $this->hasOne(PermissionInformation::class);
    }
}
