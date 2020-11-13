<?php

namespace App\Services;


use App\Models\SesEmailBounce;
use App\Models\SesEmailComplaint;
use App\Models\SesEmailLink;
use App\Models\SesEmailOpen;
use App\Models\SesSentEmail;

class Stats
{
    public static function statsForEmail($email)
    {
        return [
            'counts' => [
                'sent_emails' => SesSentEmail::whereEmail($email)->count(),
                'deliveries' => SesSentEmail::whereEmail($email)->whereNotNull('delivered_at')->count(),
                'opens' => SesEmailOpen::whereEmail($email)->whereNotNull('opened_at')->count(),
                'bounces' => SesEmailBounce::whereEmail($email)->whereNotNull('bounced_at')->count(),
                'complaints' => SesEmailComplaint::whereEmail($email)->whereNotNull('complained_at')->count(),
                'click_throughs' => SesEmailLink::join(
                    'laravel_ses_sent_emails',
                    'laravel_ses_sent_emails.id',
                    'laravel_ses_email_links.sent_email_id'
                )
                    ->where('laravel_ses_sent_emails.email', '=', $email)
                    ->whereClicked(true)
                    ->count(\DB::raw('DISTINCT(laravel_ses_sent_emails.id)')) // if a user clicks two different links on one campaign, only one is counted
            ],
            'data' => [
                'sent_emails' => SesSentEmail::whereEmail($email)->get(),
                'deliveries' => SesSentEmail::whereEmail($email)->whereNotNull('delivered_at')->get(),
                'opens' => SesEmailOpen::whereEmail($email)->whereNotNull('opened_at')->get(),
                'bounces' => SesEmailComplaint::whereEmail($email)->whereNotNull('bounced_at')->get(),
                'complaints' => SesEmailComplaint::whereEmail($email)->whereNotNull('complained_at')->get(),
                'click_throughs' => SesEmailLink::join(
                    'laravel_ses_sent_emails',
                    'laravel_ses_sent_emails.id',
                    'laravel_ses_email_links.sent_email_id'
                )
                    ->where('laravel_ses_sent_emails.email', '=', $email)
                    ->whereClicked(true)
                    ->get()
            ]
        ];
    }

    public static function statsForBatch($batchName)
    {
        return [
            'send_count' => SesSentEmail::numberSentForBatch($batchName),
            'deliveries' => SesSentEmail::deliveriesForBatch($batchName),
            'opens' => SesSentEmail::opensForBatch($batchName),
            'bounces' => SesSentEmail::bouncesForBatch($batchName),
            'complaints' => SesSentEmail::complaintsForBatch($batchName),
            'click_throughs' => SesSentEmail::getAmountOfUsersThatClickedAtLeastOneLink($batchName),
            'link_popularity' => SesSentEmail::getLinkPopularityOrder($batchName)
        ];
    }
}
