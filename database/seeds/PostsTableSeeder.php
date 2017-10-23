<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $post = $this->findPost('lorem-ipsum-post');
        if (!$post->exists) {
            $post->fill([
                'title'            => 'Introducing Startup Engine',
                'category_id' => 1,
                'author_id'        => 0,
                'seo_title'        => null,
                'excerpt'          => 'This is a test post.',
                'body'             => '<p>This is the body of the post.</p>',
                'image'            => null,
                'slug'             => 'lorem-ipsum-post',
                'meta_description' => 'Startup Engine is a CMS designed for startups.',
                'meta_keywords'    => 'keyword1, keyword2, keyword3',
                'status'           => 'PUBLISHED',
                'featured'         => 0,
            ])->save();
        }


    }

    /**
     * [post description].
     *
     * @param [type] $slug [description]
     *
     * @return [type] [description]
     */
    protected function findPost($slug)
    {
        return Post::firstOrNew(['slug' => $slug]);
    }
}
