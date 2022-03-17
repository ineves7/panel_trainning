<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable as AuditableTrait;
use OwenIt\Auditing\Contracts\Auditable;

// phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
class City extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use AuditableTrait;

    protected $table = 'cities';

    protected $fillable = [
        'name',
        'state_id',
    ];

    /*
     * MUTATORS AND ACESSORS
     */

    /*
     * METHODS
     */

    /*
     * RELATIONS
     */

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
