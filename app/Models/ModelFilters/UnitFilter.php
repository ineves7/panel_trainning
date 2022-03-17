<?php 

namespace App\Models\ModelFilters;

use EloquentFilter\ModelFilter;

class UnitFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];
    
    public function name($name)
    {
        return $this->where('name', '=', $name);
    }

    public function sigla($sigla)
    {
        return $this->where('sigla', '=', $sigla);
    }

    public function city($city_id)
    {
        return $this->where('city_id', '=', $city_id);
    }
}
