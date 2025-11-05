<?php

namespace App\Repositories;

use App\Interfaces\PublisherRepositoryInterface;
use App\Models\Publisher;

class EloquentPublisherRepository implements PublisherRepositoryInterface
{
    public function getAllPublishers()
    {
        return Publisher::all();
    }

    public function getPublisherById(int $id): ?Publisher
    {
        return Publisher::find($id);
    }

    public function deletePublisher(int $id): void
    {
        Publisher::destroy($id);
    }

    public function createPublisher(array $publisherDetails): Publisher
    {
        return Publisher::create($publisherDetails);
    }

    public function updatePublisher(int $id, array $newDetails): Publisher
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->update($newDetails);
        return $publisher;
    }
}