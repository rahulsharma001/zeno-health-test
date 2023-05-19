<?php

namespace Database\Seeders;

use App\Helper\Helper\Helper;
use App\Models\Drug;
use Illuminate\Database\Seeder;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 'drugs';
        $file = public_path("/seeders/$table".".csv");
        $records = Helper::importCSV($file);
        
        foreach ($records as $record) {
            Drug::create([
                'id' => $record['id'],
                'drug-name' => $record['drug-name'],
                'mrp' => $record['mrp'],
                'ptr' => $record['ptr'],
                'expiry' => $record['expiry'],
                'barcode' => $record['barcode'],
                'type' => $record['type'],
            ]);
        }
    }
}
