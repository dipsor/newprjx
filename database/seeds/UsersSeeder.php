<?php

use Illuminate\Database\Seeder;
use App\Users\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'name' => 'Miroslav  Masek',
            'email' => 'miroslav@digitonic.co.uk',
            'password' => 'password123',
            'first_name' => 'Miroslav',
            'last_name' => 'Masek',
            'phone_number' => '07709837117',
            'city' => 'Edinburgh',
            'street' => '2/4 westfield court',
            'postal_code' => 'EH112RJ',
            'country_code' => 'UK',
        ]);

        $user->attachTeam(1);
        $user->assignRole('admin');
        $user->assignRole('customer');
    }
}
