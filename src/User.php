<?php
namespace DominionSolutions\CustomerIO;
use Illuminate\Contracts\Support\Arrayable;

class User implements Arrayable {
    public function __construct(public ?string $userId = null,
    public ?string $anonymousId = null,
    public array $traits = []
    ) {}

    public function toArray() {
        return [
            'userId' => $this->userId,
            'anonymousId' => $this->anonymousId,
            'traits' => $this->traits,
        ];
    }
}
