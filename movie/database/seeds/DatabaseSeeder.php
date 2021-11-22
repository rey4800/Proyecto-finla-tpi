<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $pass = bcrypt('1234567*');
        $pass2 = bcrypt('abcdefghij*');
        
        DB::table('users')->insert([
            'name' => 'Miguel',
            'email' => 'miguel@ues.com',
            'password' => $pass,
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Rey',
            'email' => 'pr19004@ues.edu.sv',
            'password' => $pass2,
            'role' => 'admin'
        ]);
        // $this->call(UsersTableSeeder::class);
       
    }

    public function createAdmin(){
        $user = User::create('Miguel','miguel@ues.com', bcrypt('12345678*'));
    }
}
