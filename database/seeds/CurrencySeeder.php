<?php

use App\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Currency::create([
            'code' => 'USD',
        ]);

        Currency::create([
            'code' => 'Euro',
        ]);
    }
}
