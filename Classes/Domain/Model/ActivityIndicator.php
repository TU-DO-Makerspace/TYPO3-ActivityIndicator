<?php

declare(strict_types=1);

namespace TUDOMakerspace\Activityindicator\Domain\Model;

use DateTime;
use Nng\Nnrestapi\Domain\Model\AbstractRestApiModel;

/**
 * This file is part of the "ActivityIndicator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Patrick Pedersen <ctx.xda@gmail.com>
 */

/**
 * ActivityIndicator model
 * 
 * The ActvityIndicator model's purpose, is to simply store the activity status.
 * The activity status is stored as a string, which is restricted to either "closed"
 * or "open".
 * 
 */
class ActivityIndicator extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Activity of the Makerspace
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $activity = "closed";

    /**
     * @var \DateTime
     */
    protected $tstamp;

    /**
     * Returns the activity
     *
     * @return string activity
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Sets the activity
     *
     * @param string $activity Must be either "closed" or "open"
     * @return void
     */
    public function setActivity(string $activity)
    {
        if ($activity != "open" && $activity != "closed")
            throw new \InvalidArgumentException("Activity must be either 'open' or 'closed'");

        $this->activity = $activity;
    }

    /**
     * Returns when the activity was last modified
     *
     * @return \DateTime
     */
    public function getTstamp()
    {
        return $this->tstamp;
    }

    /**
     * Returns when the activity was last modified in
     * the given format
     *
     * @param string $format Format to return the date in (See https://www.php.net/manual/de/datetime.format.php)
     * @return string
     */
    public function getTstampFormatted(string $format)
    {
        return $this->tstamp->format($format);
    }

    /**
     * Returns how much time has passed since the
     * activity has been modified (First seconds,
     * then minutes, then hours, then days). If a 
     * week or more has passed, it will simply return 
     * the tstamp date in YYYY-MM-DD HH:II:SS CEST.
     * @return string
     */
    public function getTstampRelative()
    {
        date_default_timezone_set('Europe/Berlin');

        $now = new DateTime("now");
        $tstamp = $this->getTstamp();

        $now->setTimezone(new \DateTimeZone("Europe/Berlin"));
        $tstamp->setTimezone(new \DateTimeZone("Europe/Berlin"));

        $passed = $tstamp->diff($now);

        $ret = '';

        if ($passed->y > 0 || $passed->m > 0 || $passed->d >= 7)
            return $this->getTstampFormatted('Y-m-d H:i:s T');
        else if ($passed->d > 0)
            $ret .= "$passed->d day" . (($passed->d > 1) ? 's' : '');
        else if ($passed->h > 0)
            $ret .= "$passed->h hour" . (($passed->h > 1) ? 's' : '');
        else if ($passed->i > 0)
            $ret .= "$passed->i minute" . (($passed->i > 1) ? 's' : '');
        else
            $ret .= "$passed->s second" . (($passed->s > 1) ? 's' : '');

        return $ret . " ago";
    }
}
