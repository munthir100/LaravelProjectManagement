<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class ProjectFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['title'];
}
