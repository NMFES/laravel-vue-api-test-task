<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Apartments;

class ApartmentsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = Storage::disk('local')->get('other/property-data.csv');

        $lines = explode(PHP_EOL, $content);

        for ($i = 1; $i < count($lines); $i++) {
            $fields = explode(',', $lines[$i]);

            $apartment = new Apartments;
            $apartment->name = $fields[0];
            $apartment->price = $fields[1];
            $apartment->bedrooms = $fields[2];
            $apartment->bathrooms = $fields[3];
            $apartment->storeys = $fields[4];
            $apartment->garages = $fields[5];

            $apartment->save();
        }
    }

}
