<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole implements Auditable
{
    use AuditableTrait;
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'name',
        'guard_name'
    ];
}
