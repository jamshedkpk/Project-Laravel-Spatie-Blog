<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
public function definition(): array
{
return 
[
'category_id'=>random_int(1,5),
'user_id'=>random_int(1,2),
'title'=>$this->faker->name(),
'description'=>$this->faker->text(50),
'photo'=>$this->faker->imageUrl(),
];
}
}