<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Observer\Test;

use DesignPatterns\Behavioral\Observer\Conference;
use DesignPatterns\Behavioral\Observer\InvalidConferenceTypeException;
use PHPUnit\Framework\TestCase;

class ConferenceTest extends TestCase
{
    public function testCanNotifyAttachedObserver(): void
    {
        $conference = new Conference(new \DateTime());
        $splObserverMock = $this->prophesize(\SplObserver::class);
        $splObserverMock
            ->update($conference)
            ->shouldBeCalled();

        $conference->attach($splObserverMock->reveal());
        $conference->notify();
    }

    public function testCannotNotifyDetachedObserver(): void
    {
        $conference = new Conference(new \DateTime());
        $splObserverMock = $this->prophesize(\SplObserver::class);
        $splObserverMock
            ->update($conference)
            ->shouldNotBeCalled();

        $conference->attach($splObserverMock->reveal());
        $conference->detach($splObserverMock->reveal());
        $conference->notify();
    }

    public function testCanChangeTypeToOnlineOnlyIfIsUndecided(): void
    {
        $conferenceUndecided = new Conference(new \DateTime());
        $conferenceOffline = (new Conference(new \DateTime()));
        $conferenceOffline->offline();

        $conferenceUndecided->online();

        $this->assertTrue($conferenceUndecided->isOnline());

        $this->expectException(InvalidConferenceTypeException::class);

        $conferenceOffline->online();
    }

    public function testCanChangeTypeToOfflineOnlyIfIsUndecided(): void
    {
        $conferenceUndecided = new Conference(new \DateTime());
        $conferenceOnline = (new Conference(new \DateTime()));
        $conferenceOnline->online();

        $conferenceUndecided->offline();

        $this->assertTrue($conferenceUndecided->isOffline());

        $this->expectException(InvalidConferenceTypeException::class);

        $conferenceOnline->offline();
    }
}