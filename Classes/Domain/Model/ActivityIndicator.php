<?php

declare(strict_types=1);

namespace TUDOMakerspace\Activityindicator\Domain\Model;

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
}
