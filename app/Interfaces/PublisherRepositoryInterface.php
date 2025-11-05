<?php

namespace App\Interfaces;

use App\Models\Publisher;

interface PublisherRepositoryInterface
{
    public function getAllPublishers();

    public function getPublisherById(int $id): ?Publisher;

    public function deletePublisher(int $id): void;

    public function createPublisher(array $publisherDetails): Publisher;

    public function updatePublisher(int $id, array $newDetails): Publisher;

    
}