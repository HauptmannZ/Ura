<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tentang;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Bocil Ura',
            'username' => 'arkan',
            'email' => 'shibuya@gmail.com',
            'image' => 'default.png',
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'is_Admin' => 1
        ]);

        User::factory(5)->create();

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        Category::create([
            'name' => 'Web Dev',
            'slug' => 'web-dev'
        ]);

        Category::create([
            'name' => 'IOT Dev',
            'slug' => 'IOT-dev'
        ]);

        Tentang::create([
            'body' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatibus nostrum, ullam quaerat, error assumenda,</p><p>quos omnis accusantium beatae deserunt recusandae voluptas eaque et delectus aspernatur neque quod? Delectus, molestias ipsam! Error, perspiciatis veniam quo, reiciendis voluptatibus atque voluptatum voluptate soluta nisi quaerat aperiam. Blanditiis, similique praesentium amet eos, temporibus possimus quas omnis nihil consectetur sed officia nesciunt saepe ab laborum facilis assumenda quia esse quibusdam facere enim nobis exercitationem totam rerum.</p><p>Quod provident beatae autem iusto animi in maiores voluptate. Eos debitis voluptates facere est. Voluptas, similique molestiae. Blanditiis reprehenderit soluta, qui debitis accusantium commodi ullam saepe nesciunt dolorem, est aliquid libero possimus perspiciatis culpa! Ipsa ad inventore odit pariatur.</p><p>Quibusdam quia, accusamus dicta facilis ut illo voluptatibus, labore explicabo harum vel perferendis ipsa vero placeat nobis incidunt maxime magnam aliquam nulla cupiditate ea. Architecto cumque porro dicta natus alias animi, nihil, earum, voluptates pariatur</p><p>ipsum corrupti labore fugiat nisi. Alias placeat, est cumque neque et magnam quisquam dolorem error consequatur expedita architecto ad assumenda soluta quaerat earum optio voluptate non accusantium nam nisi doloremque doloribus esse! Iste sunt qui perferendis omnis, consectetur voluptatum modi tempore!</p><p>Iste cum numquam rerum optio quidem assumenda accusantium cumque voluptatibus? Molestiae officiis quod accusantium?</p>'
        ]);

        Post::factory(20)->create();


        // User::create([
        //     'name' => 'Anonymous',
        //     'email' => 'Anonymous@gmail.com',
        //     'password' => bcrypt('321')
        // ]);

        // Post::create([
        //     'title' => 'Judul pertama',
        //     'slug' => 'judul-pertama',
        //     'category_id' => '1',
        //     'user_id' => '1',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, saepe dolor.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, saepe dolor. Perferendis labore error minima voluptates dignissimos nemo eaque, cum amet soluta ex, pariatur quod facilis. Sunt magnam laborum perferendis, repellendus quas reiciendis at voluptatibus? Officiis qui officia repellendus iusto consequuntur vitae ut eius consequatur nostrum, tempore veniam exercitationem ipsam nisi, atque neque voluptate accusamus beatae aut possimus expedita ullam eaque magni repellat. Eaque consequuntur magni, mollitia doloremque illo ipsum in impedit ut aspernatur sequi debitis natus commodi distinctio obcaecati quae odit optio nam quisquam sunt error, molestiae expedita dolorum iure repellendus! Explicabo magnam autem, ipsam vel totam eveniet repellendus vitae aut voluptatibus illo quos? Qui ab vitae reprehenderit. Ad quam earum culpa odio provident dolorem. Pariatur quas eum nobis.',
        // ]);
    }
}
