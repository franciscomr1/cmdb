<?php

namespace Database\Seeders\Company;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'SAGAJI',
            'business_name' => 'Distribuciones SAGAJI SA de CV',
            'address' => 'Anahuac #120 Col El Mirador',
            'city' => 'Coyoacan',
            'state' => 'CDMX',
            'postal_code' => '04950',
            'created_by' => 'Administrador',
            'updated_by' => 'Administrador'
        ]);

        Company::create([
            'name' => 'REGION MIXTECA',
            'business_name' => 'Region Mixteca Tierra del Sol S.A. DE C.V',
            'address' => 'Anahuac #120 Col El Mirador',
            'city' => 'Coyoacan',
            'state' => 'CDMX',
            'postal_code' => '04950',
            'created_by' => 'Administrador',
            'updated_by' => 'Administrador'
        ]);
    }
}
