<?php

namespace App\Traits;

use Livewire\WithFileUploads;
use Livewire\FileUploadConfiguration;

trait WithLivewireFileUploads //this trait is used to override default cleanupOldUploads of the original WithFileUploads
{
    use WithFileUploads;

    protected function cleanupOldUploads()
    {
        if (FileUploadConfiguration::isUsingS3()) return;

        $storage = FileUploadConfiguration::storage();

        foreach ($storage->allFiles(FileUploadConfiguration::path()) as $filePathname) {
            // On busy websites, this cleanup code can run in multiple threads causing part of the output
            // of allFiles() to have already been deleted by another thread.
            if (!$storage->exists($filePathname)) continue;

            //README : Here i am changing yesterday to only last hour in order to clean up temp files every hour
            $lastHourStamp = now()->subHour()->timestamp;
            if ($lastHourStamp > $storage->lastModified($filePathname)) {
                $storage->delete($filePathname);
            }
        }
    }
}
