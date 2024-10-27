<?php
namespace Database\Seeders;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = collect(['Fantastique', 'Fantaisie', 'Policier', 'Horreur', 'Epouvante', 'Action', 'Romance','Dark-Romance','Couple','FootBall','Rubgy','Football-Americain','Basket','MMA','Célibrité',]);
        $tags->each(fn ($tag) => Tag::create([
            'name' => $tag,
            'slug' => Str::slug($tag),
        ]));
    }
}