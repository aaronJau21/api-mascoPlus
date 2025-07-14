<?php

namespace App\Dto\System\Category;

class CategoryDto
{
    public function __construct(
        public readonly string $name,
    ) {}
}
