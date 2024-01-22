<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 2,
                'categori_id' => 1,
                'name' => 'water melon',
                'harga' => 12000,
                'describe' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis earum, cumque consequuntur quis distinctio necessitatibus illo. Quas, necessitatibus maxime. Doloremque, facere iste excepturi ea deserunt a blanditiis numquam pariatur optio quae quasi laudantium, nobis expedita odio doloribus. Quaerat necessitatibus ullam, laudantium tenetur unde provident dolores dolorum animi tempora ad officia asperiores. A omnis consequatur voluptas dolorem. Vero commodi asperiores eaque libero perspiciatis perferendis ratione aspernatur voluptatibus hic fuga exercitationem labore id, ipsum officiis dignissimos laboriosam nostrum repudiandae tempore magnam modi.',
            ],
            [
                'user_id' => 2,
                'categori_id' => 1,
                'name' => 'Melon Baru bro',
                'harga' => 42000,
                'describe' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis earum, cumque consequuntur quis distinctio necs numquam pariatur optio quae quasi laudantium, nobis expedita odio essitatibus ullam, laudantium tenetur unde provident dolores dolorum animi tempora ad officia asperiores. A omnis consequatur voluptas dolorem. Vero commodi asperiores eaque libero perspiciatis perferendis ratione aspernatur voluptatibus hic fuga exercitationem labore id, ipsum officiis dignissimos laboriosam nostrum repudiandae tempore magnam modi.',
            ],
            [
                'user_id' => 2,
                'categori_id' => 1,
                'name' => 'Melon bro',
                'harga' => 52000,
                'describe' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis earum, cumque consequuntur quis distinctio necs numquam pariatur optio quae quasi laudantium, nobis expedita odio essitatibus ullam, laudantium tenetur unde provident dolores dolorum animi tempora ad officia asperiores. A omnis consequatur voluptas dolorem. Vero commodi asperiores eaque libero perspiciatis perferendis ratione aspernatur voluptatibus hic fuga exercitationem labore id, ipsum officiis dignissimos laboriosam nostrum repudiandae tempore magnam modi.',
            ],
            [
                'user_id' => 2,
                'categori_id' => 1,
                'name' => 'bro',
                'harga' => 8000,
                'describe' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis earum, cumque consequuntur quis distinctio necs numquam pariatur optio quae quasi laudantium, nobis expedita odio essitatibus ullam, laudantium tenetur unde provident dolores dolorum animi tempora ad officia asperiores. A omnis consequatur voluptas dolorem. Vero commodi asperiores eaque libero perspiciatis perferendis ratione aspernatur voluptatibus hic fuga exercitationem labore id, ipsum officiis dignissimos laboriosam nostrum repudiandae tempore magnam modi.',
            ],
            [
                'user_id' => 2,
                'categori_id' => 1,
                'name' => 'Melonaru bro',
                'harga' => 42900,
                'describe' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis earum, cumque consequuntur quis distinctio necs numquam pariatur optio quae quasi laudantium, nobis expedita odio essitatibus ullam, laudantium tenetur unde provident dolores dolorum animi tempora ad officia asperiores. A omnis consequatur voluptas dolorem. Vero commodi asperiores eaque libero perspiciatis perferendis ratione aspernatur voluptatibus hic fuga exercitationem labore id, ipsum officiis dignissimos laboriosam nostrum repudiandae tempore magnam modi.',
            ],
            [
                'user_id' => 2,
                'categori_id' => 1,
                'name' => 'Melon Bro',
                'harga' => 49000,
                'describe' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis earum, cumque consequuntur quis distinctio necs numquam pariatur optio quae quasi laudantium, nobis expedita odio essitatibus ullam, laudantium tenetur unde provident dolores dolorum animi tempora ad officia asperiores. A omnis consequatur voluptas dolorem. Vero commodi asperiores eaque libero perspiciatis perferendis ratione aspernatur voluptatibus hic fuga exercitationem labore id, ipsum officiis dignissimos laboriosam nostrum repudiandae tempore magnam modi.',
            ],
            [
                'user_id' => 2,
                'categori_id' => 1,
                'name' => 'Mero',
                'harga' => 4200,
                'describe' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis earum, cumque consequuntur quis distinctio necs numquam pariatur optio quae quasi laudantium, nobis expedita odio essitatibus ullam, laudantium tenetur unde provident dolores dolorum animi tempora ad officia asperiores. A omnis consequatur voluptas dolorem. Vero commodi asperiores eaque libero perspiciatis perferendis ratione aspernatur voluptatibus hic fuga exercitationem labore id, ipsum officiis dignissimos laboriosam nostrum repudiandae tempore magnam modi.',
            ],
            [
                'user_id' => 2,
                'categori_id' => 1,
                'name' => 'Mon Baru bro',
                'harga' => 4000,
                'describe' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis earum, cumque consequuntur quis distinctio necs numquam pariatur optio quae quasi laudantium, nobis expedita odio essitatibus ullam, laudantium tenetur unde provident dolores dolorum animi tempora ad officia asperiores. A omnis consequatur voluptas dolorem. Vero commodi asperiores eaque libero perspiciatis perferendis ratione aspernatur voluptatibus hic fuga exercitationem labore id, ipsum officiis dignissimos laboriosam nostrum repudiandae tempore magnam modi.',
            ],
            [
                'user_id' => 1,
                'categori_id' => 1,
                'name' => 'Mon Baru bro',
                'harga' => 42000,
                'describe' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis earum, cumque consequuntur quis distinctio necs numquam pariatur optio quae quasi laudantium, nobis expedita odio essitatibus ullam, laudantium tenetur unde provident dolores dolorum animi tempora ad officia asperiores. A omnis consequatur voluptas dolorem. Vero commodi asperiores eaque libero perspiciatis perferendis ratione aspernatur voluptatibus hic fuga exercitationem labore id, ipsum officiis dignissimos laboriosam nostrum repudiandae tempore magnam modi.',
            ],
            [
                'user_id' => 2,
                'categori_id' => 1,
                'name' => 'Melon Baru bro',
                'harga' => 42000,
                'describe' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis earum, cumque consequuntur quis distinctio necs numquam pariatur optio quae quasi laudantium, nobis expedita odio essitatibus ullam, laudantium tenetur unde provident dolores dolorum animi tempora ad officia asperiores. A omnis consequatur voluptas dolorem. Vero commodi asperiores eaque libero perspiciatis perferendis ratione aspernatur voluptatibus hic fuga exercitationem labore id, ipsum officiis dignissimos laboriosam nostrum repudiandae tempore magnam modi.',
            ],
        ];

        foreach ($data as $value) {
            Product::insert([
                'user_id' => $value['user_id'],
                'categori_id' => $value['categori_id'],
                'name' => $value['name'],
                'harga' => $value['harga'],
                'describe' => $value['describe'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
