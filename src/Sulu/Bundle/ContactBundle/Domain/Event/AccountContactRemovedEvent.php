<?php

/*
 * This file is part of Sulu.
 *
 * (c) Sulu GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\ContactBundle\Domain\Event;

use Sulu\Bundle\ActivityBundle\Domain\Event\DomainEvent;
use Sulu\Bundle\ContactBundle\Admin\ContactAdmin;
use Sulu\Bundle\ContactBundle\Entity\AccountInterface;
use Sulu\Bundle\ContactBundle\Entity\ContactInterface;

class AccountContactRemovedEvent extends DomainEvent
{
    public function __construct(
        private AccountInterface $account,
        private ContactInterface $contact,
    ) {
        parent::__construct();
    }

    public function getEventType(): string
    {
        return 'contact_removed';
    }

    public function getResourceKey(): string
    {
        return AccountInterface::RESOURCE_KEY;
    }

    public function getResourceId(): string
    {
        return (string) $this->account->getId();
    }

    public function getResourceTitle(): ?string
    {
        return $this->account->getName();
    }

    public function getEventContext(): array
    {
        return [
            'contactId' => $this->contact->getId(),
            'contactName' => $this->contact->getFirstName() . ' ' . $this->contact->getLastName(),
        ];
    }

    public function getResourceSecurityContext(): ?string
    {
        return ContactAdmin::ACCOUNT_SECURITY_CONTEXT;
    }

    public function getAccount(): AccountInterface
    {
        return $this->account;
    }

    public function getContact(): ContactInterface
    {
        return $this->contact;
    }
}
