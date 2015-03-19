<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker  = Faker::create();

        for ( $i = 0; $i < 99; $i++ )
        {
            $id    = \Db::table( 'users' )->insertGetId( [
                'first_name'    => $faker->firstName(),
                'last_name'     => $faker->lastName(),
                'full_name'     => $faker->firstName() . ' ' . $faker->lastName(),
                'email'         => $faker->unique()->email(),
                'password'      => \Hash::make( '123456' ),
                'type'          => 'user'
            ] );

            \DB::table( 'user_profiles' )->insert( [
                'user_id'   => $id,
                'bio'       => $faker->paragraph( rand( 2, 5 ) ),
                'website'   => 'http://www.' . $faker->domainName(),
                'twitter'   => 'http://www.twitter.com/' . $faker->userName(),
                'birthdate' => $faker->dateTimeBetween( '-45 years', '-15 years' )->format( 'Y-m-d' )
            ] );
        }
    }

}
