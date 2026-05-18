<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Project;

class ProjectApplied extends Notification
{
    use Queueable;

    public $applicant;
    public $project;

    public function __construct(User $applicant, Project $project)
    {
        $this->applicant = $applicant;
        $this->project = $project;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'message' => "{$this->applicant->name} applied to your project: {$this->project->title}",
            'url' => route('network.show', $this->applicant),
            'user_id' => $this->applicant->id,
            'type' => 'application'
        ];
    }
}
