<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('country')->delete();

        $country = array(
	            array(
			            'id'   => 1,
			            'name' => 'INDIA',
			            'code' => 'IND'
        	         ),
	            array(
			            'id'   => 2,
			            'name' => 'AUSTRALIA',
			            'code' => 'AUS'
	                 ),
	            array(
			            'id'   => 3,
			            'name' => 'BHUTAN',
			            'code' => 'BTN'
			          ),
	            array(
			            'id'   => 4,
			            'name' => 'BRAZIL',
			            'code' => 'BRA'
	                ),
	            array(
			            'id'   => 5,
			            'name' => 'CHINA',
			            'code' => 'CHN'
	            	 ),
	            array(
		                'id'   => 6,
			            'name' => 'FRANCE',
			            'code' => 'FRA'
	            	  ),
	            array(
		                'id'   => 7,
			            'name' => 'HONG KONG',
			            'code' => 'HKG'
	            	  ),
	            array(
		                'id'   => 8,
			            'name' => 'IRAQ',
			            'code' => 'IRQ'
	            	  ),
	            array(
		                'id'   => 9,
			            'name' => 'JAPAN',
			            'code' => 'JPN'
	            	  ),
	            array(
		                'id'   => 10,
			            'name' => 'OMAN',
			            'code' => 'OMN'
	            	 )
	            );

        DB::table('country')->insert($country);
    }
}
