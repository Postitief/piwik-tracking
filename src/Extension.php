<?php

namespace Bolt\Extension\Postitief\PiwikTracking;

use Bolt\Extension\SimpleExtension;

/**
 * PiwikTracking extension class.
 *
 * @author Dybo <d.boertje@postitief.nl>
 */
class Extension extends SimpleExtension
{
    /**
     * Register twig functions.
     *
     * @return array
     */
    protected function registerTwigFunctions()
    {
        return [
            'track' => 'twig_track',
        ];
    }

    /**
     * Track a pageview.
     *
     * @param string $title
     * @return string
     */
    public function twig_track($title = "")
    {
        $piwikTracker = new PiwikTracker(
            $this->getConfig()['site_id'],
            $this->getConfig()['api_url']
        );

        $piwikTracker->doTrackPageView($title);

        return $title;
    }
}
