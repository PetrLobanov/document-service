<?php

namespace App\Jobs;

use App\Models\Document;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DocumentUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected string $uuid, protected mixed $file)
    {
        //
    }

    public function handle(): void
    {
        $document = \Storage::putFile('documents', $this->file);
        Document::find($this->uuid)->update([
            'file_path' => \Storage::path($document),
        ]);
    }
}
