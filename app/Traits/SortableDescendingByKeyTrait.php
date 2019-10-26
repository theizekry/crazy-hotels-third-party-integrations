<?php

namespace App\Traits;

trait SortableDescendingByKeyTrait
{
    /**
     * @param $data array
     *
     * @param $sortBy
     *
     * @return array
     */
    public function sortDesc(array $data, $sortBy)
    {
        return collect($data)->sortByDesc($sortBy)->values()->all();
    }
}
