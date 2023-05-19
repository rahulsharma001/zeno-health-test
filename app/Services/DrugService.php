<?php

namespace App\Services;

use App\Repository\Drug\DrugInterface;

class DrugService
{
    private $drugRepository;

    public function __construct(DrugInterface $drugRepository)
    {
        $this->drugRepository = $drugRepository;
    }

    public function getAllDrugs()
    {
       return $this->drugRepository->all();
    }
}
