<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Services\Traits\CoderSupport;

class CoderControllerTest extends TestCase
{
    use CoderSupport;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    private $killNotes = [];

    public function test_response_is_ok()
    {
        $requestParams = [
            'person_year_of_birth' =>  [4, 5],
            'person_year_of_death' =>  [7, 9]
        ];
        $response = $this->call('GET', 'counter-witch', $requestParams);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function test_fibonacci_numbers_are_correct()
    {
        $expectedResult = [1, 1, 2, 3, 5];
        $num = 5;
        $samples = [];
        for ($i = 1; $i <= $num; $i++) {
            $samples[] = $this->fibo($i);
        }
        $this->assertTrue($samples == $expectedResult);
    }

    public function test_sum_kill_by_year_is_correct()
    {
        $year = 5;
        $expectedResult = 12;
        $result = $this->getWitchKillNumberByYear($year);
        $this->assertEquals($expectedResult, $result);
    }

    public function test_average_kill_number_is_correct()
    {
        $person_year_of_births =  [10, 13];
        $person_year_of_deaths =  [12, 17];
        $expectedResult = 4.5;
        $result = $this->getAverageKillNumber($person_year_of_births, $person_year_of_deaths);
        $this->assertEquals($expectedResult, $result);
    }

    public function test_person_data_is_invalid_and_return_minus_one()
    {
        $person_year_of_births =  [10, 18];
        $person_year_of_deaths =  [12, 17];
        $expectedResult = -1;
        $result = $this->getAverageKillNumber($person_year_of_births, $person_year_of_deaths);
        $this->assertEquals($expectedResult, $result);
    }
}
