<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartments extends Model
{

    /**
     * Disable timestamps
     * @var bool 
     */
    public $timestamps = false;

    /**
     * Returns filtered collection of apartments
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Support\Collection
     */
    public static function getApartments($request)
    {
        $request->validate([
            'name' => 'max:50',
            'price_from' => 'integer|nullable',
            'price_to' => 'integer|nullable',
            'bedrooms' => 'integer|nullable',
            'bathrooms' => 'integer|nullable',
            'storeys' => 'integer|nullable',
            'garages' => 'integer|nullable'
        ]);

        $table = Apartments::select('*');

        // if Name was filled
        if ($request->input('name')) {
            $name = $request->input('name');

            $name = preg_replace("/[\\+\\-\\=\\&\\|\\!\\(\\)\\{\\}\\[\\]\\^\\\"\\~\\*\\<\\>\\?\\:\\\\\\/]/", addslashes('\\$0'), $name);

            $table->where('name', 'LIKE', '%' . $name . '%');
        }

        // if Price_from was filled
        if ($request->input('price_from')) {
            $table->where('price', '>=', $request->input('price_from'));
        }

        // if Price_to was filled
        if ($request->input('price_to')) {
            $table->where('price', '<=', $request->input('price_to'));
        }

        // if Bedrooms was filled
        if ($request->input('bedrooms')) {
            $table->where('bedrooms', $request->input('bedrooms'));
        }

        // if Bathrooms was filled
        if ($request->input('bathrooms')) {
            $table->where('bathrooms', $request->input('bathrooms'));
        }

        // if Storeys was filled
        if ($request->input('storeys')) {
            $table->where('storeys', $request->input('storeys'));
        }

        // if Garages was filled
        if ($request->input('garages')) {
            $table->where('garages', $request->input('garages'));
        }

        return $table->get();
    }

}
