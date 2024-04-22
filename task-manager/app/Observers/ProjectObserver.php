<?php

namespace App\Observers;

use App\Models\Project;

class ProjectObserver
{

    public function created(Project $project): void
    {
        $project->members()->attach([$project->user_id]);
    }


    public function updated(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $project): void
    {
        //
    }
}
