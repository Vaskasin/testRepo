<?php

namespace App\Jobs;

use App\Models\FormData;

class ProcessForm extends Job
{
    protected $formData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(FormData $formData)
    {
        $this->formData = $formData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Process the form data here, for example, send an email
        // You can also add any other processing logic you need
    }
}
