<?php

namespace App\Services\Traits;

use Exception;

trait CoderSupport
{
    protected function getAverageKillNumber($personYearOfBirths, $personYearOfDeaths)
    {
        $isError = false;

        for ($i = 0; $i < count($personYearOfBirths); $i++) {
            try {
                if (!$this->isValidYear($personYearOfDeaths[$i]) || !$this->isValidYear($personYearOfBirths[$i])) {
                    $year = -1;
                    $isError = true;
                } else {
                    $year = ($personYearOfDeaths[$i] - $personYearOfBirths[$i]);
                }
            } catch (\Throwable $th) {
                $year = -1;
            }

            if ($year < 0) {
                $isError = true;
            }

            $personNo = $i + 1;
            $killNumbers[] = ($yearKillNumber = $this->getWitchKillNumberByYear($year)); // integer or null
            $this->killNotes[] = "Person {$personNo} : year of birth {$personYearOfBirths[$i]}, year of death {$personYearOfDeaths[$i]}, so year is {$year}, number of people killed is {$yearKillNumber}";
        }
        if ($isError) {
            return -1;
        }

        return array_sum($killNumbers) / (count($killNumbers));
    }

    private function isValidYear($year)
    {
        return $year > 0 && is_numeric($year);
    }

    private function getWitchKillNumberByYear(int $year): int
    {
        $fiboNumbers = [];

        for ($i = 1; $i <= $year; $i++) {
            $fiboNumbers[] = $this->fibo($i);
        }

        return array_sum($fiboNumbers);
    }

    /**
     * return fibonacci numbers that the witch use it.
     */
    private function fibo(int $num)
    {
        if ($num == 0) {
            return 0;
        }

        if ($num == 1) {
            return 1;
        }

        return ($this->fibo($num - 1) + $this->fibo($num - 2));
    }
}
