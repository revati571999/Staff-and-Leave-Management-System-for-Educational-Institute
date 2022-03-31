<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class dept_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            [
              'dept_name'=>'CS'
            ],
            [
                'dept_name'=>'IT'
            ],
            
            
              
        ]);
    }
}
