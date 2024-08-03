<?php

namespace App\Observers;

use App\Enums\ProfileTypeEnum;
use App\Events\CustomerProfileCreated;
use App\Models\Profile;

class ProfileObserver
{
    /**
     * Handle the Profile "created" event.
     */
    public function created(Profile $profile): void
    {
        if (
            $profile->type === ProfileTypeEnum::CUSTOMER()
            || $profile->type === ProfileTypeEnum::LEGAL_CUSTOMER()
        ) {
            CustomerProfileCreated::dispatch($profile);
        }
    }

    /**
     * Handle the Profile "updated" event.
     */
    public function updated(Profile $profile): void
    {
        //
    }

    /**
     * Handle the Profile "deleted" event.
     */
    public function deleted(Profile $profile): void
    {
        //
    }

    /**
     * Handle the Profile "restored" event.
     */
    public function restored(Profile $profile): void
    {
        //
    }

    /**
     * Handle the Profile "force deleted" event.
     */
    public function forceDeleted(Profile $profile): void
    {
        //
    }
}
