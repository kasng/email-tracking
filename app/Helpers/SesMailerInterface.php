<?php

namespace App\Helpers;


use App\Models\SesSentEmail;

interface SesMailerInterface
{
    public function initMessage($message);

    public function statsForBatch($batchName);

    public function statsForEmail($batchName);

    public function setupTracking($setupTracking, SesSentEmail $sentEmail);

    public function setBatch($batch);

    public function getBatch();

    public function enableOpenTracking();

    public function enableLinkTracking();

    public function enableBounceTracking();

    public function enableComplaintTracking();

    public function enableDeliveryTracking();

    public function disableOpenTracking();

    public function disableLinkTracking();

    public function disableBounceTracking();

    public function disableComplaintTracking();

    public function disableDeliveryTracking();

    public function enableAllTracking();

    public function disableAllTracking();

    public function trackingSettings();
}
