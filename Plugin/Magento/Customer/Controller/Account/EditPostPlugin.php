<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2026–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\NewsletterConfirmationSuppress\Plugin\Magento\Customer\Controller\Account;

use AimaneCouissi\NewsletterConfirmationSuppress\Plugin\Magento\Newsletter\Model\SubscriberPlugin;
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
     * @param EditPost $subject
     * @return void
     */
    public function beforeExecute(EditPost $subject): void
    {
        $this->registry->register(SubscriberPlugin::REGISTRY_KEY, true, true);
    }

    /**
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
