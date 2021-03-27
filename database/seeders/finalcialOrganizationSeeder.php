<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class finalcialOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('financial_organizations')->insert([
            [

              'id' => '1',
              'name' => 'ABC',
              'short_name' => 'abc',
              'address' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis',
            ],
            [
                'id' => '2',
              'name' => 'XYZ',
              'short_name' => 'xyz',
              'address' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis',
            ],
            [
            'id' => '3',
              'name' => 'PQR',
              'short_name' => 'pqr',
              'address' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis',
            ],
            [
              'id' => '4',
              'name' => 'OIS',
              'short_name' => 'ois',
              'address' => 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis',
            ],

        ]);

    }
}
