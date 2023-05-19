<?php

namespace App\Services\Drug;

use App\Repository\Drug\DrugInterface;
use App\Services\Drug\DrugServiceValidator;

class DrugService
{
    /**
     * @var drugRepository
     */
    private $drugRepository;

    private $validator;

    /**
     * @param DrugInterface $drugRepository
     */
    public function __construct(DrugInterface $drugRepository, DrugServiceValidator $validator)
    {
        $this->drugRepository = $drugRepository;
        $this->validator = $validator;
    }


    /**
     * @return [type]
     */
    public function getAllDrugs()
    {
        return $this->drugRepository->all();
    }

    /**
     * @param array $params
     * 
     * @return [type]
     */
    public function store(array $params)
    {
        $this->validator->validate($params, DrugServiceValidator::DRUG_STORE);
        return $this->drugRepository->store($params);
    }

    /**
     * @param mixed $id
     * 
     * @return [type]
     */
    public function getDrugById($id)
    {
        return $this->drugRepository->find($id);
    }

    /**
     * @param array $params
     * @param mixed $drug
     * 
     * @return [type]
     */
    public function updateDrug(array $params, $drug)
    {
        // dd($drug);
        $this->validator->validate($params, DrugServiceValidator::DRUG_UPDATE);
        return $this->drugRepository->update($drug->id, $params);
    }

    public function deleteDrug($drug)
    {
        return $this->drugRepository->delete($drug->id);
    }
}
