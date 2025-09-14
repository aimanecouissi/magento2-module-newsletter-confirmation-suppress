# AimaneCouissi_NewsletterConfirmationSuppress

[![Latest Stable Version](http://poser.pugx.org/aimanecouissi/module-newsletter-confirmation-suppress/v)](https://packagist.org/packages/aimanecouissi/module-newsletter-confirmation-suppress) [![Total Downloads](http://poser.pugx.org/aimanecouissi/module-newsletter-confirmation-suppress/downloads)](https://packagist.org/packages/aimanecouissi/module-newsletter-confirmation-suppress) [![Latest Unstable Version](http://poser.pugx.org/aimanecouissi/module-newsletter-confirmation-suppress/v/unstable)](https://packagist.org/packages/aimanecouissi/module-newsletter-confirmation-suppress) [![License](http://poser.pugx.org/aimanecouissi/module-newsletter-confirmation-suppress/license)](https://packagist.org/packages/aimanecouissi/module-newsletter-confirmation-suppress) [![PHP Version Require](http://poser.pugx.org/aimanecouissi/module-newsletter-confirmation-suppress/require/php)](https://packagist.org/packages/aimanecouissi/module-newsletter-confirmation-suppress)

Suppresses the newsletter confirmation email when a **subscribed** customer changes their email address; the subscription status remains subscribed and no confirmation is sent on email change.

## Installation
```bash
composer require aimanecouissi/module-newsletter-confirmation-suppress
bin/magento module:enable AimaneCouissi_NewsletterConfirmationSuppress
bin/magento setup:upgrade
bin/magento cache:flush
```

## Usage
Change a subscribed customer’s email (Customer Account → Account Information, or Admin → Customers → Edit). No newsletter confirmation email is triggered for this change; new subscriptions continue to follow Magento’s default confirmation behavior.

## Uninstall
```bash
bin/magento module:disable AimaneCouissi_NewsletterConfirmationSuppress
composer remove aimanecouissi/module-newsletter-confirmation-suppress
bin/magento setup:upgrade
bin/magento cache:flush
```

## License
[MIT](LICENSE)
