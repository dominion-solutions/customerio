<?php

namespace DominionSolutions\CustomerIO;

use Illuminate\Contracts\Support\Arrayable;

class User implements Arrayable
{
    public function __construct(
        public ?string $userId = null,
        public ?string $anonymousId = null,
        public ?array $additionalFields = [],
        public ?array $traits = [],
    ) {}

    public function toArray() : array
    {
        $baseData = collect([
            'userId' => $this->userId,
            'anonymousId' => $this->anonymousId,
            'traits' => $this->traits,
        ]);
        return $baseData->merge($this->additionalFields)->toArray();
    }
}
