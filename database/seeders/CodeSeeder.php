<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Code;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code_cd' => 'STATUS_01', 'code_nm' => 'Laki-laki','code_group' => 'STATUS', 'code_value' => '' ],
            ['code_cd' => 'STATUS_02', 'code_nm' => 'Perempuan','code_group' => 'STATUS', 'code_value' => '' ],


        ];
        foreach ($data as $datum) {
            Code::create($datum);
        }
    }

}
