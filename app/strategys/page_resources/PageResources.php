<?php

namespace App\strategys\page_resources;

use App\strategys\page_resources\contracts\PageResourceInterface;

class PageResources  
{
    private $resources = [];

    public function addResource(PageResourceInterface $resource): void
    {
        $key = $resource->getInformationKey();
        $this->resources[$key] = $resource->get();
    }

    public function getResource(): array
    {
        return $this->resources;
    }
}