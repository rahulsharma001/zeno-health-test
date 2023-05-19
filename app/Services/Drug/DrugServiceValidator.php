<?php

declare(strict_types=1);

namespace App\Services\Drug;

use App\Services\BaseValidator;

/**
 * Class DrugServiceValidator - Validate drug service requests.
 *
 * @package App\Services\DrugService
 */
class DrugServiceValidator extends BaseValidator
{

    public const DRUG_STORE = "store";
    public const DRUG_DELETE = "remove";
    public const DRUG_UPDATE = "update";

    /**
     * DrugServiceValidator constructor.
     * Define rules and messages for drug service validation.
     */
    public function __construct()
    {
        $this->rules = [
            self::DRUG_STORE => [
                "drug-name"    => ['required', 'string'],
                "mrp"    => ['required', 'numeric'],
                "ptr"    => ['required', 'numeric', 'lt:mrp'],
                "expiry" => ['required', 'date'],
                "barcode"    => ['required', 'string'],
                "type"    => ['required', 'in:ethical,generic,general'],
            ],

            self::DRUG_UPDATE => [
                "mrp"    => ['required', 'numeric'],
                "ptr"    => ['required', 'numeric', 'lt:mrp'],
            ],


            $this->messages = [
                self::DRUG_STORE => [
                    'drug-name.required'    => 'Drug name cannot be empty',
                    'mrp.required'     => 'MRP cannot be empty',
                    'type.in' => "Type must be ethical, generic, general"
                    //similar way messages can be customised for other rules
                ],

                self::DRUG_UPDATE => [],
            ]
        ];
    }
}
