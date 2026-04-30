<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2026–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\NewsletterConfirmationSuppress\Plugin\Magento\Customer\Controller\Adminhtml\Index;

use AimaneCouissi\NewsletterConfirmationSuppress\Plugin\Magento\Newsletter\Model\SubscriberPlugin;
use Magento\Backend\Model\View\Result\Redirect;
use Magento\Customer\Controller\Adminhtml\Index\Save;
use Magento\Framework\Registry;

class SavePlugin
{
    /**
     * @param Registry $registry
     */
    public function __construct(private readonly Registry $registry)
    {
    }

    /**
     * @param Save $subject
     * @return void
     */
    public function beforeExecute(Save $subject): void
    {
        $this->registry->register(SubscriberPlugin::REGISTRY_KEY, true, true);
    }

    /**
     * @param Save $subject
     * @param Redirect $result
     * @return Redirect
     */
    public function afterExecute(Save $subject, Redirect $result): Redirect
    {
        if ($this->registry->registry(SubscriberPlugin::REGISTRY_KEY)) {
            $this->registry->unregister(SubscriberPlugin::REGISTRY_KEY);
        }
        return $result;
    }
}
