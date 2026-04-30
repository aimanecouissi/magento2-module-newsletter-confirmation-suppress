# AimaneCouissi_NewsletterConfirmationSuppress

[![Latest Stable Version](http://poser.pugx.org/aimanecouissi/module-newsletter-confirmation-suppress/v)](https://packagist.org/packages/aimanecouissi/module-newsletter-confirmation-suppress) [![Total Downloads](http://poser.pugx.org/aimanecouissi/module-newsletter-confirmation-suppress/downloads)](https://packagist.org/packages/aimanecouissi/module-newsletter-confirmation-suppress) [![Magento Version](https://img.shields.io/badge/magento-2.4.x-E68718)](https://packagist.org/packages/aimanecouissi/module-newsletter-confirmation-suppress) [![License](http://poser.pugx.org/aimanecouissi/module-newsletter-confirmation-suppress/license)](https://packagist.org/packages/aimanecouissi/module-newsletter-confirmation-suppress) [![PHP Version Require](http://poser.pugx.org/aimanecouissi/module-newsletter-confirmation-suppress/require/php)](https://packagist.org/packages/aimanecouissi/module-newsletter-confirmation-suppress)

Suppresses newsletter confirmation success emails during customer email changes. The module targets storefront account
saves, Admin customer saves, and Admin inline customer edits where the customer's newsletter subscription status is
unchanged.

## Installation

```bash
composer require aimanecouissi/module-newsletter-confirmation-suppress
bin/magento module:enable AimaneCouissi_NewsletterConfirmationSuppress
bin/magento setup:upgrade
bin/magento cache:flush
```

## Usage

When a subscribed customer changes the email address from **My Account → Account Information**, the **Admin →
Customers → All Customers** grid, or Admin inline customer editing, the module registers a suppression flag around that
save. The newsletter confirmation success email is skipped only when the subscription status is unchanged, and new
subscriptions continue through Magento normal newsletter confirmation flow.

## Uninstall

```bash
bin/magento module:disable AimaneCouissi_NewsletterConfirmationSuppress
composer remove aimanecouissi/module-newsletter-confirmation-suppress
bin/magento setup:upgrade
bin/magento cache:flush
```

## Changelog

See [CHANGELOG](CHANGELOG.md) for all recent changes.

## License

[MIT](LICENSE)
