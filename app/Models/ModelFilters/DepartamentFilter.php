<?php 

namespace App\Models\ModelFilters;

use EloquentFilter\ModelFilter;

class DepartamentFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];
    
    public function name($departament)
    {
        return $this->where('departament', '=', $departament);
    }

    public function sigla($sigla)
    {
        return $this->where('sigla', '=', $sigla);
    }

    public function unit($unit_id)
    {
        return $this->where('unit_id', '=', $unit_id);
    }

    public function reports($date_start, $date_end)
    {
        return $this->whereBetween('travel.initialized_at', [$date_start, $date_end]);
    }
}
