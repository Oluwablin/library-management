<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Record;
use App\Models\User;

class RecordsandMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $records = [

            // Records
            [
                'id' => 1,
                'title' => 'John Record',
                'description' => 'This is a record for John',
                'library_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'title' => 'Ilesanmi',
                'description' => 'This is a record for Ilesanmi',
                'library_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'title' => 'Yoodule',
                'description' => 'This is a record for Yoodule',
                'library_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'title' => 'Neo',
                'description' => 'This is a record for Neo',
                'library_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'title' => 'Union',
                'description' => 'This is a record for Union',
                'library_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'title' => 'Gasline',
                'description' => 'This is a record for Gasline',
                'library_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'title' => 'Glory',
                'description' => 'This is a record for Glory',
                'library_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'title' => 'Lorem Ipsum',
                'description' => 'This is a record for Lorem Ipsum',
                'library_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'title' => 'Generous',
                'description' => 'This is a record for Generous',
                'library_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'title' => 'Wonderful',
                'description' => 'This is a record for Wonderful',
                'library_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];


        $students = [

            // Members
            [
                'id' => 1,
                'first_name' => 'Super',
                'last_name' => 'Administrator',
                'email' => 'super_admin@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 1,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 2,
                'first_name' => 'Ilesanmi',
                'last_name' => 'Oye',
                'email' => 'ilesanmi_oye@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 2,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 3,
                'first_name' => 'Yoodule',
                'last_name' => 'Tech',
                'email' => 'yoodule_tech@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 3,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 4,
                'first_name' => 'Neo',
                'last_name' => 'Bank',
                'email' => 'neo_bank@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 4,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 5,
                'first_name' => 'Union',
                'last_name' => 'Doe',
                'email' => 'union_doe@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 5,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 6,
                'first_name' => 'Gasline',
                'last_name' => 'John',
                'email' => 'galine_john@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 6,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 7,
                'first_name' => 'Glory',
                'last_name' => 'All',
                'email' => 'glory_all@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 7,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 8,
                'first_name' => 'Lorem',
                'last_name' => 'Ipsum',
                'email' => 'lorem_ipsum@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 8,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 9,
                'first_name' => 'Generous',
                'last_name' => 'Boy',
                'email' => 'generous_boy@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 9,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 10,
                'first_name' => 'Wonderful',
                'last_name' => 'Thing',
                'email' => 'wonderful_thing@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 10,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 11,
                'first_name' => 'Test',
                'last_name' => 'User11',
                'email' => 'test_user11@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 1,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 12,
                'first_name' => 'Test',
                'last_name' => 'User12',
                'email' => 'test_user12@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 2,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 13,
                'first_name' => 'Test',
                'last_name' => 'User',
                'email' => 'test_user13@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 3,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 14,
                'first_name' => 'Test',
                'last_name' => 'User14',
                'email' => 'test_user14@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 4,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 15,
                'first_name' => 'Test',
                'last_name' => 'User',
                'email' => 'test_user15@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 5,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 16,
                'first_name' => 'Test',
                'last_name' => 'User16',
                'email' => 'test_user16@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 6,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 17,
                'first_name' => 'Test',
                'last_name' => 'User17',
                'email' => 'test_user17@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 7,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 18,
                'first_name' => 'Test',
                'last_name' => 'User18',
                'email' => 'test_user18@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 8,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 19,
                'first_name' => 'Test',
                'last_name' => 'User19',
                'email' => 'test_user19@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 9,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 20,
                'first_name' => 'Test',
                'last_name' => 'User20',
                'email' => 'test_user20@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 10,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'id' => 21,
                'first_name' => 'Test',
                'last_name' => 'User21',
                'email' => 'test_user21@oluwablin.co',
                'password' => Hash::make('password'),
                'library_id' => 1,
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];

        $roles = [
            'SuperAdmin', 'Admin', 'Admin', 'Admin', 'Admin',
            'Admin', 'Admin', 'Admin', 'Admin', 'Admin',
            'Student', 'Student', 'Student', 'Student',
            'Student', 'Student', 'Student', 'Student',
            'Student', 'Student', 'Admin'

        ];

        foreach ($records as $key => $record) {
            $create_record = Record::firstOrCreate($record);
        }

        foreach ($students as $key => $student) {
            $create_student = User::firstOrCreate($student);

            $create_student->assignRole($roles[$key]);
        }
    }
}
