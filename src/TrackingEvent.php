<?php

namespace DominionSolutions\CustomerIO;

use Illuminate\Contracts\Support\Arrayable;

class TrackingEvent implements Arrayable
{
    public function __construct(
        public ?string $userId = null,
        public ?string $event = null,
        public ?array $properties = [],
        public ?array $additionalFields = [],
        public ?array $context = [],
    ) {}

    public function toArray(): array
    {
        return collect([
            'userId' => $this->userId,
            'event' => $this->event,
            'properties' => $this->properties,
            'context' => $this->context,
        ])->merge($this->additionalFields)->toArray();
    }
}
