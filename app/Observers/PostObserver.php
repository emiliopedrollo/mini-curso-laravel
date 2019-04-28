<?php

namespace App\Observers;

use App\Post;
use Illuminate\Support\Str;

class PostObserver
{
    public function creating(Post $post) {
        $post->author_id = app('request')->user()->id;
    }

    public function updating(Post $post) {
        $post->author_id = app('request')->user()->id;
    }

    public function saving(Post $post) {

        $baseSlug = Str::slug($post->title);
        $slug = $baseSlug;
        $i = 1;

        while(Post::whereSlug($slug)->exists()) {
            $slug = "$baseSlug-".$i++;
        }

        $post->slug = $slug;
    }
}
