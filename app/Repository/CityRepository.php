<?php

namespace App\Repository;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface CityRepository{
    public function get(int $id): City;
    public function allPaginated(int $limit): LengthAwarePaginator;
    public function all(): Collection;
    public function filterBy(string $name): LengthAwarePaginator;
}
