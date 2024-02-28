<?php

namespace App\Filters;

use Essa\APIToolKit\Filters\QueryFilters;

class TaskFilters extends QueryFilters
{
    protected array $allowedFilters = [];

    protected array $columnSearch = ['title'];
}
