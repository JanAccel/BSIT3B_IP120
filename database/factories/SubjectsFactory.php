<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
 /**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subjects>
 */
 class SubjectsFactory extends Factory
 {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public $subject = ['Comsci','Itelect','Intech'];
  public $day = ['m','t','w','th','f','s'];
  public function definition(): array
  {
    $sub = fake()->randomElement($this->subject);
    return [
      'name' => $sub.rand(1000,4999),
      'day' => fake()->randomElement($this->day),
      'time' => $this->getRandomTimeRange(),
      'room' => $sub.' Lab Room', // password
    ];
  }
  public function getRandomTimeRange(){
    $start = rand(7,17);
    $start_time = $start.":"."00";
    $end_time = ($start+2).":"."00";
    return $start_time."-".$end_time;
  }
 }