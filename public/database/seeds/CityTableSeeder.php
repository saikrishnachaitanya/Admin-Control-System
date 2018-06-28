<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city')->delete();

        $city = array(
        	          array(
        	                'id'       => 1,
        	                'name'     =>'ANANTAPUR',
        	                'code'     => 'ANA',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 2,
        	                'name'     =>'CHITTOOR',
        	                'code'     => 'CHI',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 3,
        	                'name'     =>'EAST GODAVARI',
        	                'code'     => 'EGO',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 4,
        	                'name'     =>'GUNTUR',
        	                'code'     => 'GUN',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 5,
        	                'name'     =>'KRISHNA',
        	                'code'     => 'KRI',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 6,
        	                'name'     =>'KURNOOL',
        	                'code'     => 'KUR',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 7,
        	                'name'     =>'PRAKASAM',
        	                'code'     => 'PRA',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 8,
        	                'name'     =>'SRIKAKULAM',
        	                'code'     => 'SKL',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 9,
        	                'name'     =>'SRI POTTI SRIRAMULU NELLORE',
        	                'code'     => 'SSN',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 10,
        	                'name'     =>'VISAKHAPATNAM',
        	                'code'     => 'VSK',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 11,
        	                'name'     =>'VIZIANAGARAM',
        	                'code'     => 'VIZ',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 12,
        	                'name'     =>'WEST GODAVARI',
        	                'code'     => 'WGO',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 13,
        	                'name'     =>'Y.S.R (CUDDAPAH)',
        	                'code'     => 'YSR',
        	                'state_id' => 2
        	               ),
        	          array(
        	                'id'       => 14,
        	                'name'     =>'BOKARO',
        	                'code'     => 'BSC',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 15,
        	                'name'     =>'CHATRA',
        	                'code'     => 'CHA',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 16,
        	                'name'     =>'DEOGHAR',
        	                'code'     => 'DEO',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 17,
        	                'name'     =>'DHANBAD',
        	                'code'     => 'DHN',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 18,
        	                'name'     =>'DUMKA',
        	                'code'     => 'DUM',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 19,
        	                'name'     =>'GARHWA',
        	                'code'     => 'GAR',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 20,
        	                'name'     =>'GIRIDIH',
        	                'code'     => 'GIR',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 21,
        	                'name'     =>'GODDA',
        	                'code'     => 'GOD',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 22,
        	                'name'     =>'GUMLA',
        	                'code'     => 'GUM',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 23,
        	                'name'     =>'HAGARIBAGH',
        	                'code'     => 'HAG',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 24,
        	                'name'     =>'JAMTARA',
        	                'code'     => 'JAM',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 25,
        	                'name'     =>'KHUNTI',
        	                'code'     => 'KUN',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 26,
        	                'name'     =>'KODARMA',
        	                'code'     => 'KOD',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 27,
        	                'name'     =>'LATEHAR',
        	                'code'     => 'LAR',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 28,
        	                'name'     =>'LOHARDAGA',
        	                'code'     => 'LOH',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 29,
        	                'name'     =>'PAKUR',
        	                'code'     => 'PKU',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 30,
        	                'name'     =>'PALAMU',
        	                'code'     => 'PAL',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 31,
        	                'name'     =>'PASHCHIMI SINGHBHUM',
        	                'code'     => 'PSB',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 32,
        	                'name'     =>'PURBI SINGHBHUM',
        	                'code'     => 'PSM',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 33,
        	                'name'     =>'RAMGARH',
        	                'code'     => 'RAG',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 34,
        	                'name'     =>'RANCHI',
        	                'code'     => 'RAN',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 35,
        	                'name'     =>'SAHIBGANJ',
        	                'code'     => 'SBJ',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 36,
        	                'name'     =>'SARAIKELA KHARSAWAN',
        	                'code'     => 'SKK',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 37,
        	                'name'     =>'SIMDEGA',
        	                'code'     => 'SMD',
        	                'state_id' => 16
        	               ),
        	          array(
        	                'id'       => 38,
        	                'name'     =>'PATNA',
        	                'code'     => 'PAT',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 39,
        	                'name'     =>'GAYA',
        	                'code'     => 'GAY',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 40,
        	                'name'     =>'BHAGALPUR',
        	                'code'     => 'BHA',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 41,
        	                'name'     =>'MUZAFFARPUR',
        	                'code'     => 'MUZ',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 42,
        	                'name'     =>'PURNIA',
        	                'code'     => 'PUN',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 43,
        	                'name'     =>'DARBHANGA',
        	                'code'     => 'DBG',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 44,
        	                'name'     =>'BIHAR SHARIF',
        	                'code'     => 'BSF',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 45,
        	                'name'     =>'ARRAH',
        	                'code'     => 'ARH',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 46,
        	                'name'     =>'BEGUSARAI',
        	                'code'     => 'BEG',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 47,
        	                'name'     =>'KATIHAR',
        	                'code'     => 'KAT',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 48,
        	                'name'     =>'MUNGER',
        	                'code'     => 'MUG',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 49,
        	                'name'     =>'CHHAPRA',
        	                'code'     => 'CHR',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 50,
        	                'name'     =>'DANAPUR',
        	                'code'     => 'DPR',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 51,
        	                'name'     =>'BETTIAH',
        	                'code'     => 'BTH',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 52,
        	                'name'     =>'SAHARSA',
        	                'code'     => 'SRA',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 53,
        	                'name'     =>'SASARAM',
        	                'code'     => 'SRM',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 54,
        	                'name'     =>'HAJIPUR',
        	                'code'     => 'HJR',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 55,
        	                'name'     =>'SIWAN',
        	                'code'     => 'SWN',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 56,
        	                'name'     =>'MOTIHARI',
        	                'code'     => 'MHR',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 57,
        	                'name'     =>'NAWADA',
        	                'code'     => 'NWD',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 58,
        	                'name'     =>'BAGAHA',
        	                'code'     => 'BGA',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 59,
        	                'name'     =>'BUXAR',
        	                'code'     => 'BXR',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 60,
        	                'name'     =>'KISHANGANJ',
        	                'code'     => 'KGJ',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 61,
        	                'name'     =>'SITAMARHI',
        	                'code'     => 'SMH',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 62,
        	                'name'     =>'JAMALPUR',
        	                'code'     => 'JLR',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 63,
        	                'name'     =>'JEHANABAD',
        	                'code'     => 'JNB',
        	                'state_id' => 5
        	               ),
        	          array(
        	                'id'       => 64,
        	                'name'     =>'AURANGABAD',
        	                'code'     => 'AGD',
        	                'state_id' => 5
        	               )

        	          );

        DB::table('city')->insert($city);
    }
}
