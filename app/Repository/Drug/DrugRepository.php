<?php
namespace App\Repository\Drug;

use App\Models\Drug;
use App\Repository\BaseRepository;

class DrugRepository extends BaseRepository implements DrugInterface
{
    /**
     * CoreData model object
     * @var UserSearchHistory
     */
    protected $model;

    /**
     * @param $model
     */
    public function __construct(Drug $model)
    {
        $this->model = $model;
    }
}
