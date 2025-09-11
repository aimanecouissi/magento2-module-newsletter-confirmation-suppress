<?php

declare(strict_types=1);

namespace AimaneCouissi\NewsletterConfirmationSuppress\Plugin\Customer\Controller\Account;

use AimaneCouissi\NewsletterConfirmationSuppress\Plugin\Newsletter\Model\SubscriberPlugin;
use Magento\Customer\Controller\Account\EditPost;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Registry;

class EditPostPlugin
{
    /**
     * @param Registry $registry
     */
    public function __construct(private readonly Registry $registry)
    {
    }

    /**
     * Registers a flag to suppress the newsletter success email before account update.
     *
     * @param EditPost $subject
     * @return void
     */
    public function beforeExecute(EditPost $subject): void
    {
        $this->registry->register(SubscriberPlugin::REGISTRY_KEY, true, true);
    }

    /**
     * Unregisters the suppression flag after an account update is processed.
     *
     * @param EditPost $subject
     * @param Redirect $result
     * @return Redirect
     */
    public function afterExecute(EditPost $subject, Redirect $result): Redirect
    {
        if ($this->registry->registry(SubscriberPlugin::REGISTRY_KEY)) {
            $this->registry->unregister(SubscriberPlugin::REGISTRY_KEY);
        }
        return $result;
    }
}
