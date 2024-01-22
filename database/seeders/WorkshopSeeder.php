<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Workshop;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WorkshopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $datas = [
            [
                'title' => 'Workshop ke 1',
                'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati atque molestiae incidunt, nulla, doloremque, tenetur veritatis earum magni ducimus cum similique explicabo commodi accusamus sit? Excepturi, totam. Cumque, officia nemo. Nobis nulla quis, nam corporis ipsam placeat praesentium ipsa necessitatibus facilis minus veritatis accusamus provident, accusantium sit, eaque sint ducimus.',
                'penutup' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati atque molestiae incidunt, nulla, doloremque, tenetur veritatis earum magni ducimus cum similique explicabo commodi accusamus sit?'
            ],
            [
                'title' => 'Workshop ke 2',
                'content' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati atque molestiae incidunt, nulla, doloremque, tenetur veritatis earum magni ducimus cum similique explicabo commodi accusamus sit? Excepturi, totam. Cumque, officia nemo. Nobis nulla quis, nam corporis ipsam placeat praesentium ipsa necessitatibus facilis minus veritatis accusamus provident, accusantium sit, eaque sint ducimus.',
                'penutup' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Obcaecati atque molestiae incidunt, nulla, doloremque, tenetur veritatis earum magni ducimus cum similique explicabo commodi accusamus sit?'
            ],
        ];

        foreach ($datas as $data) {
            Workshop::insert([
                'title' => $data['title'],
                'content' => $data['content'],
                'penutup' => $data['penutup'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

    }
}
