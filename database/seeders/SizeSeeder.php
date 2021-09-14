<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = Collect(['s', 'm', 'l', 'xl', 'xxl']);
        $sizes->each(function($size){
            $newSize = new Size();
            $newSize->title = $size;
            $newSize->save();
        });
    }
}
