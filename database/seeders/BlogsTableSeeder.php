<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Database\Factories\BlogFactory;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    public function run(): void
    {
        $createdUserId = User::query()->value('id');

        foreach (BlogFactory::articles() as $article) {
            $blog = Blog::query()->firstOrNew(['name' => $article['name']]);

            if (! $blog->exists) {
                $blog->fill($article + [
                    'status' => 'active',
                    'created_userID' => $createdUserId,
                ])->save();

                continue;
            }

            foreach ([
                'name_ar' => 'name',
                'introduction_ar' => 'introduction',
                'description_ar' => 'description',
            ] as $translation => $source) {
                if (trim($blog->{$translation}) === trim($blog->{$source})) {
                    $blog->{$translation} = $article[$translation];
                }
            }

            if ($blog->isDirty()) {
                $blog->save();
            }
        }
    }
}
