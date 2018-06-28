<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state')->delete();

        $state = array(
                      array(
                            'id'         => 1,
                            'name'       => 'ANDAMAN AND NICOBAR ISLAND',
                            'code'       => 'AN',
                            'country_id' => 1 
                            ),
                      array(
                      	    'id'         => 2,
                      	    'name'       => 'ANDHRA PRADESH',
                      	    'code'       => 'AP',
                      	    'country_id' => 1 
                      	   ),
                      array(
                            'id'         => 3,
                      	    'name'       => 'ARUNACHAL PRADESH',
                      	    'code'       => 'AR',
                      	    'country_id' => 1 
                      	   ),
                      array(
                            'id'         => 4,
                      	    'name'       => 'ASSAM',
                      	    'code'       => 'AS',
                      	    'country_id' => 1 
                      	    ),
                      array(
                            'id'         => 5,
                      	    'name'       => 'BIHAR',
                      	    'code'       => 'BH',
                      	    'country_id' => 1 
                      	    ),
                      array(
                            'id'         => 6,
                      	    'name'       => 'CHANDIGARH',
                      	    'code'       => 'CH',
                      	    'country_id' => 1 
                      	    ),
                      array(
                            'id'         => 7,
                      	    'name'       => 'CHATTISGARH',
                      	    'code'       => 'CT',
                      	    'country_id' => 1 
                      	    ),
                      array(
                            'id'         => 8,
                      	    'name'       => 'DARDA AND NAGAR HAVELI',
                      	    'code'       => 'DN',
                      	    'country_id' => 1 
                      	    ),
                      array(
                            'id'         => 9,
                      	    'name'       => 'DAMAN AND DIU',
                      	    'code'       => 'DD',
                      	    'country_id' => 1 
                      	    ),
                      array(
                            'id'         => 10,
                      	    'name'       => 'DELHI',
                      	    'code'       => 'DL',
                      	    'country_id' => 1 
                      	    ),
                      array(
                            'id'         => 11,
                      	    'name'       => 'GOA',
                      	    'code'       => 'GA',
                      	    'country_id' => 1 
                      	    ),
                      array(
                            'id'         => 12,
                            'name'       => 'GUJARAT',
                            'code'       => 'GJ',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 13,
                            'name'       => 'HARYANA',
                            'code'       => 'HR',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 14,
                            'name'       => 'HIMACHAL PRADESH',
                            'code'       => 'HP',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 15,
                            'name'       => 'JAMMU AND KAS',
                            'code'       => 'JK',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 16,
                            'name'       => 'JHARKHAND',
                            'code'       => 'JH',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 17,
                            'name'       => 'KARNATAK',
                            'code'       => 'KA',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 18,
                            'name'       => 'KERALA',
                            'code'       => 'KL',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 19,
                            'name'       => 'LAKSHADWEEP ISLAND',
                            'code'       => 'LD',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 20,
                            'name'       => 'MADHYA PRADESH',
                            'code'       => 'MP',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 21,
                            'name'       => 'MAHARASHTRA',
                            'code'       => 'MH',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 22,
                            'name'       => 'MANIPUR',
                            'code'       => 'MN',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 23,
                            'name'       => 'MEGHALAYA',
                            'code'       => 'ME',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 24,
                            'name'       => 'MIZORAM',
                            'code'       => 'MI',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 25,
                            'name'       => 'NAGALAND',
                            'code'       => 'NL',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 26,
                            'name'       => 'ODISHA',
                            'code'       => 'OR',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 27,
                            'name'       => 'PONDICHERRY',
                            'code'       => 'PY',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 28,
                            'name'       => 'PUNJAB',
                            'code'       => 'PB',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 29,
                            'name'       => 'RAJASTHAN',
                            'code'       => 'RJ',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 30,
                            'name'       => 'SIKKIM',
                            'code'       => 'SK',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 31,
                            'name'       => 'TAMIL NADU',
                            'code'       => 'TN',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 32,
                            'name'       => 'TELANGANA',
                            'code'       => 'TS',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 33,
                            'name'       => 'TRIPURA',
                            'code'       => 'TR',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 34,
                            'name'       => 'UTTAR PRADESH',
                            'code'       => 'UP',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 35,
                            'name'       => 'UTTRAKHAND',
                            'code'       => 'UT',
                            'country_id' => 1 
                            ),
                      array(
                            'id'         => 36,
                            'name'       => 'WEST BENGAL',
                            'code'       => 'WB',
                            'country_id' => 1 
                            ),
                      
        	        );
        DB::table('state')->insert($state);
    }
}
