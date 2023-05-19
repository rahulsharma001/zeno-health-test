<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DrugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $drugPrice = $this->faker->randomFloat(2,100,500);
        $minDisc = $drugPrice / 2;
        $maxDisc = $drugPrice - 5;

        return [
            // $table->bigIncrements('drug_id');
            // $table->string('drug_name');
            // $table->decimal('mrp');
            // $table->decimal('price_to_retailer');
            // $table->date('expiry_date');
            // $table->string('barcode');
            // $table->enum('type',['ethical','generic']);

            'drug_name' => $this->faker->name(),
            'mrp' => $drugPrice,
            'price_to_retailer' => $this->faker->numberBetween($minDisc,$maxDisc),
            'expiry_date' => $this->faker->dateTimeThisYear(),
            'barcode' => $this->faker->isbn10(),
            'type' => $this->faker->randomElement(['ethical','generic']),
        ];
    }
}
