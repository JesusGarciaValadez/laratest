<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker  = Faker::create();

        for ( $i = 0; $i < 30; $i++ )
        {
            \DB::table( 'tags' )->insert( [
                'name'          => $faker->unique()->text( 140 ),
                'description'   => $faker->optional()->paragraph()
            ] );
        }
    }

}
