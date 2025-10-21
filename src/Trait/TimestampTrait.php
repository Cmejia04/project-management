<?php

namespace App\Trait;

use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

trait TimestampTrait
{
    #[ORM\Column(type: 'datetime')]
    private DateTimeInterface $createdAt;

    #[ORM\Column(type: 'datetime', columnDefinition: 'timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')]
    private DateTimeInterface $updatedAt;

    private bool $autoTimestamps = true;

    public function disableAutoTimestamps(): void
    {
        $this->autoTimestamps = false;
    }

    public function ableAutoTimestamps(): void
    {
        $this->autoTimestamps = true;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        if ($this->autoTimestamps) {
            $this->createdAt = new DateTime();
        }
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): void
    {
        if ($this->autoTimestamps) {
            $this->updatedAt = new DateTime();
        }
    }
}
