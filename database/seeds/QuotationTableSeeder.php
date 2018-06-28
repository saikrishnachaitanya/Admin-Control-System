<?php

use Illuminate\Database\Seeder;

class QuotationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quotation')->delete();

        $Quotation = array(
	                    array(
					            'id'                         => 1,
					            'date'                       => '2017-10-11',
					            'ref_number'                 => 'P-2017-10-0',
					            'name'                       => 'Test',
					            'door_number'                => 'BJ001',
					            'street_name'                => 'Madhapur',
					            'area'                       => 'Madhapur',
					            'city_id'                    => 1,
					            'state_id'                   => 1,
					            'country_id'                 => 1,
					            'phone_number'               => 9999999999,
					            'mobile_number'              => 1111111111,
					            'description_1'              => 'Testing',
					            'description_2'              => 'Testing',
					            'description_3'              => 'Testing',
					            'ex_showroom_price'          => 1000,
					            'life_tax_qtrly_tax'         => 1000,
					            'insurance_approx'           => 500,
					            'incidental_and_tr_charges'  => 500,
					            'extended_warranty'          => 500,
					            'maxicare'                   => 500,
					            'delivery_date'              => '2017-10-16',
					            'total'                      => 4000,
		        	         )
	            
	            );

        DB::table('quotation')->insert($Quotation);
    }
   
}
