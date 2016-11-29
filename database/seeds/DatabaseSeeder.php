<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(EventsTableSeeder::class);
	    $this->call(projectTabelSeeder::class);


        $this->call(DonateEventSeeder::class);
        $this->call(DonateProjectSeeder::class);

        $this->call(UserPaymentTable::class);
        $this->call(UserCardseeder::class);
        $this->call(ReceiptTableSeeder::class);
    }
}
