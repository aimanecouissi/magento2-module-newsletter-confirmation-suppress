<?php

declare(strict_types=1);

namespace AimaneCouissi\NewsletterConfirmationSuppress\Plugin\Newsletter\Model;

use Magento\Framework\Registry;
use Magento\Newsletter\Model\Subscriber;

class SubscriberPlugin
{
    const string REGISTRY_KEY = 'suppress_newsletter_email';

    /**
     * @param Registry $registry
     */
    public function __construct(private readonly Registry $registry)
    {

    }

    /**
     * Sends the subscription confirmation success email unless the suppression flag is set.
     *
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
