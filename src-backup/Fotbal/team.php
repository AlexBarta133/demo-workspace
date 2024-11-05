<?php 

declare(strict_types=1);

namespace App\Fotbal;

class Team
{
public function __construct(
    public readonly string $name,
    public readonly int $city, 
    public readonly string $managerName,
    public readonly string $Players,


) {
}
}