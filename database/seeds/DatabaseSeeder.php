<?php

use App\Admin;
use App\Models\Info;
use App\Models\Team;
use App\Models\Word;
use App\Models\Slide;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Seed du premier image comme slide
        Slide::create([
            'image' => '/default-slide.jpg'
        ]);

        // Seed du directeur des programs
        Team::create([
            'lastname' => 'Sow',
            'firstname' => 'Monsieur Thierno Ishakh',
            'job' => 'Director of Program',
            'image' => '/images/dg.jpg'
        ]);

        // Seed du mot de bienvenue
        Word::create([
            'content' => "Bienvenue à l’internat « DAARA LUQMANE AL HAKIIM », l’établissement au service de l’éducation. <br>
                    « L’engagement pour l’excellence est chose qui nous définit. La richesse de notre programme pédagogique confer aux internés de notre établissement une éducation leurs garantissant une réussite dans la vie et l’aptitude de vivre en société selon les enseignements de l’Islam et la Sunnah ». <br>
                    « Un Daara, Une Ecole et trois Programmes »
                    ",
            'team_id' => 1,
        ]);

        // Seed des infos concernant luqmane Al Hakiim ( address, BP, phone)
        Info::create([
            'phone' => "+221 77 388 38 00",
            'address' => "Rufisque Ouest, Cité Gabon",
            'email' => "daara@luqmanealhakiim.com",
            'bp' => "20000",
        ]);

        // Seed du compte d'administrateur
        Admin::create([
            'name' => "Administrateur",
            'email' => "admin@admin.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        $this->call(ModalSeeder::class);
        $this->call(SlugSeeder::class);

    }
}
