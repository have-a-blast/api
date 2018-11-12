<?php

namespace App\Model\Entity;

trait AuthorizationTrait
{
    /**
     * @param User $user
     * @return bool
     */
    public function isViewableBy(User $user) {
        if ($this->user)
            return $this->user->id === $user->id;
        return $this->user_id === $user->id;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function isCreatableBy(User $user) {
        return true;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function isEditableBy(User $user) {
        if ($this->user)
            return $this->user->id === $user->id;
        return $this->user_id === $user->id;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function isDeletableBy(User $user) {
        if ($this->user)
            return $this->user->id === $user->id;
        return $this->user_id === $user->id;
    }
}