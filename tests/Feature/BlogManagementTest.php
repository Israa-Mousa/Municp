<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Database\Seeders\BlogsTableSeeder;
use Tests\TestCase;

class BlogManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_a_blog(): void
    {
        $this->actingAs(User::factory()->create())
            ->post(route('dashboard.blogs.store'), $this->blogData())
            ->assertRedirect(route('dashboard.blogs.index'));

        $this->assertDatabaseHas('blogs', [
            'name' => 'Community update',
            'locale' => 'en',
        ]);
    }

    public function test_authenticated_user_can_update_a_blog(): void
    {
        $blog = Blog::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('dashboard.blogs.edit', $blog))
            ->assertOk();

        $this->get(route('dashboard.blogs.create'))
            ->assertOk();

        $this->post(route('dashboard.blogs.update', $blog), $this->blogData())
            ->assertRedirect(route('dashboard.blogs.index'));

        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
            'name' => 'Community update',
            'locale' => 'en',
        ]);
    }

    public function test_browser_language_header_is_normalised_before_saving_a_blog(): void
    {
        $blog = Blog::factory()->create();
        Storage::fake('public');

        $this->actingAs(User::factory()->create())
            ->withHeader('Accept-Language', 'ar,en-US;q=0.9,en;q=0.8')
            ->post(route('dashboard.blogs.update', $blog), array_merge(
                $this->blogData(),
                ['image' => UploadedFile::fake()->image('news.jpg')]
            ))
            ->assertRedirect(route('dashboard.blogs.index'));

        $blog->refresh();
        $this->assertDatabaseHas('blogs', [
            'id' => $blog->id,
            'locale' => 'ar',
        ]);
        Storage::disk('public')->assertExists($blog->image);
    }

    public function test_homepage_lists_only_active_news(): void
    {
        Blog::factory()->create([
            'name' => 'Published update',
            'name_ar' => 'خبر منشور',
            'status' => 'active',
        ]);
        Blog::factory()->create([
            'name' => 'Hidden update',
            'name_ar' => 'خبر مخفي',
            'status' => 'nonactive',
        ]);

        $this->get('/ar')
            ->assertOk()
            ->assertSee('خبر منشور')
            ->assertDontSee('خبر مخفي');
    }

    public function test_news_titles_follow_the_selected_page_language(): void
    {
        Blog::factory()->create([
            'name' => 'Seasonal tree planting',
            'name_ar' => 'حملة زراعة الأشجار',
            'introduction' => 'English introduction for the news.',
            'introduction_ar' => 'مقدمة عربية للخبر.',
            'status' => 'active',
        ]);

        $this->get('/ar')
            ->assertOk()
            ->assertSee('<span class="shrink-0 font-semibold text-white">حملة زراعة الأشجار</span>', false)
            ->assertDontSee('<span class="shrink-0 font-semibold text-white">Seasonal tree planting</span>', false);

        $this->get('/en')
            ->assertOk()
            ->assertSee('<span class="shrink-0 font-semibold text-white">Seasonal tree planting</span>', false)
            ->assertDontSee('<span class="shrink-0 font-semibold text-white">حملة زراعة الأشجار</span>', false);
    }

    public function test_news_seeder_repairs_arabic_fields_copied_from_english(): void
    {
        $article = \Database\Factories\BlogFactory::articles()[0];

        Blog::factory()->create(array_merge($article, [
            'name_ar' => $article['name'],
            'status' => 'active',
        ]));

        $this->seed(BlogsTableSeeder::class);

        $this->assertDatabaseHas('blogs', [
            'name' => $article['name'],
            'name_ar' => $article['name_ar'],
        ]);
    }

    public function test_inactive_news_cannot_be_opened_publicly(): void
    {
        $blog = Blog::factory()->create(['status' => 'nonactive']);

        $this->get(route('app.blogs', $blog))
            ->assertNotFound();
    }

    private function blogData(): array
    {
        return [
            'name' => 'Community update',
            'name_ar' => 'تحديث مجتمعي',
            'introduction' => 'An update for the local community.',
            'introduction_ar' => 'تحديث لأفراد المجتمع المحلي.',
            'description' => 'More information about this community update.',
            'description_ar' => 'معلومات إضافية حول هذا التحديث المجتمعي.',
            'status' => 'active',
        ];
    }
}
