<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages=['Hakkımızda','Kariyer','Vizyonumuz','Misyonumuz'];
        $count=0;
           
        foreach($pages as $page){
            $count++;
            DB::table('pages')->insert([
                'title'=>$page,
                'slug'=>Str::slug($page),
                'image'=>'https://assets.entrepreneur.com/content/3x2/2000/20160602195129-businessman-writing-planning-working-strategy-office-focus-formal-workplace-message.jpeg?width=700&crop=2:1',
                'Content'=>'
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis odit blanditiis quidem earum repellendus. 
                Omnis dolorum corrupti magnam sapiente voluptatum, vel unde a alias, sunt soluta facere dolorem natus maxime.',
                'order'=>$count,
                'created_at'=>now(),
                'updated_at'=>now(),
                
            ]);
        }

    }
}
