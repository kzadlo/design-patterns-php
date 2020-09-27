<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge;

class TrainingBudget extends Benefit
{
    private const MAX_GRANT = 1000;

    private const BONUS_RATIO = 3;

    public function calculateGrant(): float
    {
        $authorityFactor = $this->level->getAuthorityFactor();

        $grant = $this->level->getAuthorityFactor() * self::MAX_GRANT;
        $grant = $this->bonus($authorityFactor, $grant);

        return $grant;
    }

    private function bonus(float $authorityFactor, float $grant): float
    {
        $halfOfMaxAuthority = (JobLevel::MAX_AUTHORITY / 2) / JobLevel::MAX_AUTHORITY;
        if ($authorityFactor < $halfOfMaxAuthority) {
            return $grant * self::BONUS_RATIO;
        }

        return $grant;
    }
}
