<?php

use Illuminate\Database\Seeder;
use App\Make;

class MakesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $makes = ['Audi', 'BMW', 'Ford Australia', 'Holden', 'Hyundai', 'Kia', 'Mazda', 'Mercedes-Benz', 'Mitsubishi', 'Nissan', 'Subaru', 'Toyota', 'Volkswagen'];

        Make::whereIn('name', $makes)->update(['is_common' => '1']);
    }
}
