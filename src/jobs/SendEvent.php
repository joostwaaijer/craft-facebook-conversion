<?php

namespace dwy\FacebookConversion\jobs;

use craft\queue\BaseJob;
use dwy\FacebookConversion\Plugin;
use FacebookAds\Object\ServerSide\Event;

class SendEvent extends BaseJob
{
    /** @var Event */
    public $event;
    /** @var string */
    public $pixelId;
    /** @var string|null */
    public $testEventCode;

    public function execute($queue): void
    {
        Plugin::getInstance()->facebook->executeEvent($this->event, $this->pixelId, $this->testEventCode);
    }

    protected function defaultDescription(): ?string
    {
        return 'Send Facebook conversion event';
    }
}
