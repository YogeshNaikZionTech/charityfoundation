<?php

use Illuminate\Database\Seeder;

class ReceiptTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



            DB::table('projectd_receipt')->insert([
              [  'ucard_id'=>1,
                'amount_cents'=>30,
                  'type'=>'original',
                'receipt_num'=>'A3453433223',
                'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
                'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),],

              [  'ucard_id'=>2,
                'amount_cents'=>360,
                  'type'=>'original',
                'receipt_num'=>'A348733223',
                'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
                'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),],

                [  'ucard_id'=>3,
                    'amount_cents'=>900,
                    'type'=>'original',
                    'receipt_num'=>'A308733223',
                    'created_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),
                    'updated_at'      => \Carbon\Carbon::now()->format( 'Y-m-d H:i:s' ),]
            ]);


    }
}
