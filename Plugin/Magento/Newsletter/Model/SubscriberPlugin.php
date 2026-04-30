<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2026–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\NewsletterConfirmationSuppress\Plugin\Magento\Newsletter\Model;

use Magento\Framework\Registry;
use Magento\Newsletter\Model\Subscriber;

class SubscriberPlugin
{
    public const string REGISTRY_KEY = 'suppress_newsletter_email';

    /**
     * @param Registry $registry
     */
    public function __construct(private readonly Registry $registry)
    {

    }

    /**
     * @param Subscriber $subject
     * @param callable $proceed
     * @return Subscriber
     */
    public function aroundSendConfirmationSuccessEmail(Subscriber $subject, callable $proceed): Subscriber
    {
        $suppress = (bool)$this->registry->registry(self::REGISTRY_KEY);
        if ($suppress && !$subject->isStatusChanged()) {
            return $subject;
        }
        return $proceed();
    }
}
