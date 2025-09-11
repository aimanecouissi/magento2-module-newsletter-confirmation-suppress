<?php

declare(strict_types=1);

namespace AimaneCouissi\NewsletterConfirmationSuppress\Plugin\Customer\Controller\Adminhtml\Index;

use AimaneCouissi\NewsletterConfirmationSuppress\Plugin\Newsletter\Model\SubscriberPlugin;
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
     * Registers flag to suppress newsletter success email during admin inline edit.
     *
     * @param InlineEdit $subject
     * @return void
     */
    public function beforeExecute(InlineEdit $subject): void
    {
        $this->registry->register(SubscriberPlugin::REGISTRY_KEY, true, true);
    }

    /**
     * Unregisters the suppression flag after the admin inline edit completes.
     *
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
