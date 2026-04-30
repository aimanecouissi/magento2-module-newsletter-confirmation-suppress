<?php
/**
 * Aimane Couissi - https://aimanecouissi.com
 * Copyright © Aimane Couissi 2026–present. All rights reserved.
 * Licensed under the MIT License. See LICENSE for details.
 */

declare(strict_types=1);

namespace AimaneCouissi\NewsletterConfirmationSuppress\Plugin\Magento\Customer\Controller\Adminhtml\Index;

use AimaneCouissi\NewsletterConfirmationSuppress\Plugin\Magento\Newsletter\Model\SubscriberPlugin;
use Magento\Customer\Controller\Adminhtml\Index\InlineEdit;
use Magento\Framework\Controller\Result\Json;
use Magento\Framework\Registry;

class InlineEditPlugin
{
    /**
     * @param Registry $registry
     */
    public function __construct(private readonly Registry $registry)
    {
    }

    /**
     * @param InlineEdit $subject
     * @return void
     */
    public function beforeExecute(InlineEdit $subject): void
    {
        $this->registry->register(SubscriberPlugin::REGISTRY_KEY, true, true);
    }

    /**
     * @param InlineEdit $subject
     * @param Json $result
     * @return Json
     */
    public function afterExecute(InlineEdit $subject, Json $result): Json
    {
        if ($this->registry->registry(SubscriberPlugin::REGISTRY_KEY)) {
            $this->registry->unregister(SubscriberPlugin::REGISTRY_KEY);
        }
        return $result;
    }
}
