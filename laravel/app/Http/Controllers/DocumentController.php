<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Http\Resources\DocumentResource;
use App\Http\Resources\DocumentResourceCollection;
use App\Jobs\DocumentUpload;
use App\Models\Document;

class DocumentController extends Controller
{
    public function index(): DocumentResourceCollection
    {
        return new DocumentResourceCollection(Document::all());
    }

    public function show(Document $document): DocumentResource
    {
        return new DocumentResource($document);
    }

    public function create(DocumentRequest $document)
    {
        try {
            $file = Document::create($document->all());
            DocumentUpload::dispatch($file->uuid, $document->file);
            return response()->json(['message' => 'File uploaded successfully and queued for processing']);
        } catch (\Exception $e) {
            return response()->setStatusCode(500)->json([]);
        }
    }
}
