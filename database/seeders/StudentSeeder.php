<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker; 

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
     
            Student::create([
                'name' => 'Sneha',
                'email'=> 'sneha123@gmail.com',
                'password'=> Hash::make('password'),
                'alt_contact'=> '1234567890',
                'contact_no' => '1234567890',
                'gender' => "Female",
                'student_class' => 'UnderGraduate',
                'address' => 'Hellabotalla',
                'subject_id' => null
            ]); 
       
        
       
    }
}
