<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        return [
            'title' => $this->faker->jobTitle,
            'category_id' => rand(1,10),
            'place' => $this->faker->city,
            'job_type' => rand(0,1),
            'experience' => rand(0,2),
            'salary' => rand(0,10) . 'k - ' . rand(10,20) .'k / mouth / nett',
            'date_end' => $this->faker->dateTime($max = 'now', $timezone = null),
            'description' => $this->faker->text($maxNbChars = 1200), 
        ];
    }
}
