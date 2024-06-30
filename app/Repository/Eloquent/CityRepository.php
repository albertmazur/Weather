<?php

namespace App\Repository\Eloquent;

use App\Models\City;
use App\Repository\CityRepository as Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CityRepository implements Repository{
    private City $cityModel;

    public function __construct(City $city){
        $this->cityModel = $city;
    }

    public function get(int $id): City{
        return $this->cityModel->findOrFail($id);
    }

    public function allPaginated(int $limit): LengthAwarePaginator{
        return $this->cityModel->orderBy("name")->paginate($limit);
    }

    public function all(): Collection{
        return $this->cityModel->all();
    }

    public function filterBy(?string $name, $limit = 20): LengthAwarePaginator{
        $query = $this->cityModel->orderBy("name");
        if($name) $query->whereRaw("name like ?", ["$name%"]);
        return $query->paginate($limit);
    }
}
