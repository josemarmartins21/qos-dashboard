<?php


namespace App\strategys\page_resources\contracts;

interface PageResourceInterface
{
    public function get();
    public function getInformationKey(): string;
}