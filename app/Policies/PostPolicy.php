<?php

namespace App\Policies;

use App\User;
use App\post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the post.
     *
     * @return mixed
     */
    public function view()
    {
        return true;
    }

    /**
     * Determine whether the user can create posts.
     *
     * @return mixed
     */
    public function create()
    {
        return true;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param User $user
     * @param post $post
     * @return mixed
     */
    public function update(User $user, post $post)
    {
        return $user->id === $post->author_id;
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param User $user
     * @param post $post
     * @return mixed
     */
    public function delete(User $user, post $post)
    {
        return $user->id === $post->author_id;
    }

}
