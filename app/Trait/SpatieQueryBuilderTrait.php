<?php

namespace App\Trait;

use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;

trait SpatieQueryBuilderTrait
{
    private Model $model;

    protected $filters = [];

    protected $sorts = [];

    protected $fields = [];

    protected $includes = [];

    protected $appends = [];

    public function getModel(): Model
    {
        return $this->model;
    }

    public function setModel(Model $model): void
    {
        $this->model = $model;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

    public function setFilters(array $filters): void
    {
        $this->filters = $filters;
    }

    public function getSorts(): array
    {
        return $this->sorts;
    }

    public function setSorts(array $sorts): void
    {
        $this->sorts = $sorts;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    public function getIncludes(): array
    {
        return $this->includes;
    }

    public function setIncludes(array $includes): void
    {
        $this->includes = $includes;
    }

    public function getAppends(): array
    {
        return $this->appends;
    }

    public function setAppends(array $appends): void
    {
        $this->appends = $appends;
    }

    public function getSpatieQuery(): QueryBuilder
    {
        return QueryBuilder::for(get_class($this->model))
            ->allowedFilters($this->getFilters())
            ->allowedSorts($this->getSorts())
            ->allowedFields($this->getFields())
            ->allowedIncludes($this->getIncludes())
            ->allowedAppends($this->getSorts());
    }
}