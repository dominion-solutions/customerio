<?php
namespace DominionSolutions\CustomerIO;

use Illuminate\Contracts\Support\Arrayable;

class TrackingEvent implements Arrayable{
    public function __construct(
        public ?string $userId = null,
        public ?string $anonymousId = null,
        public ?array $tags = [],
        public ?array $context = [],
        )
    {}

    public function toArray() : array {
        return [
            'userId' => $this->userId,
            'anonymousId' => $this->anonymousId,
            'tags' => $this->tags,
            'context' => $this->context,
        ];
    }
}
