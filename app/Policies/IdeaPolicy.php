<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
    public function update(User $user, Idea $idea): bool
    {
        return (bool) $user->is_admin || ($user->id === $idea->user_id);
    }

    public function delete(User $user, Idea $idea): bool
    {
        return (bool) $user->is_admin || ($user->id === $idea->user_id);
    }
}
