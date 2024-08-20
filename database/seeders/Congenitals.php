<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Congenital;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Congenitals extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // โรค
        // Congenital::create([
        //     'id'=>1,
        //     'congenitalname'=>''
        // ]);
        Congenital::create([
            'id'=>1,
            'congenitalname'=>'ไข้หวัด'
        ]);
        Congenital::create([
            'id'=>2,
            'congenitalname'=>'ความดันโลหิตสูง'
        ]);
        Congenital::create([
            'id'=>3,
            'congenitalname'=>'มะเร็ง'
        ]);
        Congenital::create([
            'id'=>4,
            'congenitalname'=>'เบาหวาน'
        ]);
        Congenital::create([
            'id'=>5,
            'congenitalname'=>'COVID'
        ]);
        Congenital::create([
            'id'=>6,
            'congenitalname'=>'โรคหัวใจ'
        ]);
        Congenital::create([
            'id'=>7,
            'congenitalname'=>'วัณโรค'
        ]);
        Congenital::create([
            'id'=>8,
            'congenitalname'=>'โรคภูมิแพ้'
        ]);

        // อาคาร
        Building::create([
            'id'=>1,
            'buildingName'=>'Daisy',
            'building_photo'=>'https://img.freepik.com/free-vector/people-walking-sitting-hospital-building-city-clinic-glass-exterior-flat-vector-illustration-medical-help-emergency-architecture-healthcare-concept_74855-10130.jpg?w=740&t=st=1664792367~exp=1664792967~hmac=c2af88de9d963efd19c69bbf3ad03d29e19c2d86aa7547273c22d1623a135acc',
        ]);
        Building::create([
            'id'=>2,
            'buildingName'=>'Tulip',
            'building_photo'=>'https://img.freepik.com/free-vector/city-hospital-building_74855-6301.jpg?w=740&t=st=1664792364~exp=1664792964~hmac=38181b2616e9fefd5dc8d8c782467b9ab770ecbc7bc32fc400e3324c0f2f431b',
        ]);

        // ห้อง
        Room::create([
            'id'=>1,
            'roomName'=>'Patient room 1',
            'roomType'=>'Patient room',
            'building_id'=>1,
        ]);
        Room::create([
            'id'=>2,
            'roomName'=>'Patient room 2',
            'roomType'=>'Patient room',
            'building_id'=>1,
        ]);
        Room::create([
            'id'=>3,
            'roomName'=>'Patient room 3',
            'roomType'=>'Patient room',
            'building_id'=>1,
        ]);
    }
}
