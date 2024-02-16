<?php

namespace App\Services;

use App\Models\Crate;

class CrateService
{
    protected $crate;

    public function __construct(Crate $crate)
    {
        $this->crate = $crate;
    }

    public function createCrate(array $data)
    {
        return $this->crate->create($data);
    }

    public function getAllCrates()
    {
        return $this->crate->all();
    }

    public function getCrateById($id)
    {
        return $this->crate->findOrFail($id);
    }

    public function updateCrate($id, array $data)
    {
        $crate = $this->getCrateById($id);
        $crate->update($data);
        return $crate;
    }

    public function deleteCrate($id)
    {
        $crate = $this->getCrateById($id);
        $crate->delete();
    }
}
