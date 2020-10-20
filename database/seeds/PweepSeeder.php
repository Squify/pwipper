<?php

use Illuminate\Database\Seeder;

class PweepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pweeps = [
            ['UN Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eius eligendi eveniet ipsa, ipsum maiores maxime odio officiis, optio possimus quisquam voluptate! Aliquam at atque commodi minus nisi qui sunt?', null,  null,  null,  null, false, null, 1],
            ['DEUX Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eius eligendi eveniet ipsa, ipsum maiores maxime odio officiis, optio possimus quisquam voluptate! Aliquam at atque commodi minus nisi qui sunt?', null,  null,  null,  null, false, null, 1],
            ['TROIS Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eius eligendi eveniet ipsa, ipsum maiores maxime odio officiis, optio possimus quisquam voluptate! Aliquam at atque commodi minus nisi qui sunt?', null,  null,  null,  null, false, null, 1],
            ['QUATRE Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eius eligendi eveniet ipsa, ipsum maiores maxime odio officiis, optio possimus quisquam voluptate! Aliquam at atque commodi minus nisi qui sunt?', null,  null,  null,  null, false, null, 1],
            ['CINQ Lorem ipsum dolor sit amet, consectetur adipisicing elit. A eius eligendi eveniet ipsa, ipsum maiores maxime odio officiis, optio possimus quisquam voluptate! Aliquam at atque commodi minus nisi qui sunt?', null,  null,  null,  null, false, null, 1],
        ];

        foreach ($pweeps as $pweep) {
            \App\Pweep::create([
                'message' => $pweep[0],
                'image_path_1' => $pweep[1],
                'image_path_2' => $pweep[2],
                'image_path_3' => $pweep[3],
                'image_path_4' => $pweep[4],
                'is_deleted' => $pweep[5],
                'initial_pweep_id' => $pweep[6],
                'author_id' => $pweep[7],
                    ]);

        }
    }
}
