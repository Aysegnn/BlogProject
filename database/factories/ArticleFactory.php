<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       
        return [
            'category_id'=>rand(1,7),
            'title'=>$this->faker->sentence(6),
            'image'=>$this->faker->imageUrl(100, 100, 'cats', true, 'Faker'),
            'content'=>$this->faker->text,
            'slug'=>Str::slug($this->faker->sentence(6)),
            'created_at'=>$this->faker->dateTime('now'),
            'updated_at'=>now(),
        ];
    }
}
