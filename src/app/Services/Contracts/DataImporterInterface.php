<?php

namespace App\Services\Contracts;

interface DataImporterInterface
{
    public function import() : array;
}
