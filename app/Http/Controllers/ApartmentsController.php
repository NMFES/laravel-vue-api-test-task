<?php

namespace App\Http\Controllers;

use App\Apartments;
use Illuminate\Http\Request;

class ApartmentsController extends Controller
{

    /**
     * Looking for filtered apartments
     * @return json
     */
    public function search(Request $request)
    {
        return response()->json(Apartments::getApartments($request));
    }

}
