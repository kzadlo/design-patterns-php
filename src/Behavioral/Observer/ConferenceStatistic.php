<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Observer;

class ConferenceStatistic implements \SplObserver
{
    private int $onlineAmount = 0;

    private int $offlineAmount = 0;

    public function update(\SplSubject $subject): void
    {
        if ($subject->isOffline()) {
            ++$this->offlineAmount;

            return;
        }

        if ($subject->isOnline()) {
            ++$this->onlineAmount;

            return;
        }
    }

    public function countOffline(): int
    {
        return $this->offlineAmount;
    }

    public function countOnline(): int
    {
        return $this->onlineAmount;
    }
}
