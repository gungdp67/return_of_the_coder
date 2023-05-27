<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Services\Traits\CoderSupport;

class CoderController extends Controller
{
    private $killNotes = [];

    use CoderSupport;

    public function counterWitch(Request $request)
    {
        $request->validate([
            'person_year_of_birth' => 'required',
            'person_year_of_death' => 'required'
        ]);

        try {
            $personYearOfBirths = $request->person_year_of_birth;
            $personYearOfDeaths = $request->person_year_of_death;
            $averageKillNumber = $this->getAverageKillNumber($personYearOfBirths, $personYearOfDeaths);
            $data = [
                "killNotes" => $this->killNotes,
                "averageKillNumber" => $averageKillNumber
            ];
            return view('home', ['data' => $data]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}
