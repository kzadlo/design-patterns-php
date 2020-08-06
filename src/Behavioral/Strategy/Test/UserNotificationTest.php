<?php

declare(strict_types=1);

namespace DesignPatterns\Behavioral\Strategy\Test;

use DesignPatterns\Behavioral\Strategy\NotificationPreference;
use DesignPatterns\Behavioral\Strategy\UserNotification;
use PHPUnit\Framework\TestCase;

class UserNotificationTest extends TestCase
{
    public function testCanNotifyUserByEmailAboutPasswordExpire(): void
    {
        $userNotificationPreference = new NotificationPreference(true, false);
        $userNotification = new UserNotification();

        $messages = $userNotification->onPasswordExpired($userNotificationPreference);

        $this->assertCount(1, $messages);
        $this->assertContains(sprintf('Email: %s', UserNotification::PASSWORD_EXPIRE_MESSAGE), $messages);
    }

    public function testCanNotifyUserBySystemAboutPasswordExpire(): void
    {
        $userNotificationPreference = new NotificationPreference(false, true);
        $userNotification = new UserNotification();

        $messages = $userNotification->onPasswordExpired($userNotificationPreference);

        $this->assertCount(1, $messages);
        $this->assertContains(sprintf('System: %s', UserNotification::PASSWORD_EXPIRE_MESSAGE), $messages);
    }

    public function testCanNotifyUserByEmailAndSystemAboutPasswordExpire(): void
    {
        $userNotificationPreference = new NotificationPreference(true, true);
        $userNotification = new UserNotification();

        $messages = $userNotification->onPasswordExpired($userNotificationPreference);

        $this->assertCount(2, $messages);
        $this->assertContains(sprintf('Email: %s', UserNotification::PASSWORD_EXPIRE_MESSAGE), $messages);
        $this->assertContains(sprintf('System: %s', UserNotification::PASSWORD_EXPIRE_MESSAGE), $messages);
    }

    public function testCannotNotifyUserWithoutPreferenceAboutPasswordExpire(): void
    {
        $userNotificationPreference = new NotificationPreference(false, false);
        $userNotification = new UserNotification();

        $messages = $userNotification->onPasswordExpired($userNotificationPreference);

        $this->assertCount(0, $messages);
    }
}
