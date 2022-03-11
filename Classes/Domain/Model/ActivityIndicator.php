<?php

declare(strict_types=1);

namespace TUDOMakerspace\Activityindicator\Domain\Model;

use \Nng\Nnrestapi\Domain\Model\AbstractRestApiModel;

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
 */
class ActivityIndicator extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Activity of the Makerspace, where true -> Open, false -> Closed
     *
     * @var bool
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $activity = false;

    /**
     * Returns the activity
     *
     * @return bool $activity
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * Sets the activity
     *
     * @param bool $activity true -> Open, false -> Closed
     * @return void
     */
    public function setActivity(bool $activity)
    {
        $this->activity = $activity;
    }

    /**
     * Returns the boolean state of activity
     *
     * @return bool
     */
    public function isActivity()
    {
        return $this->activity;
    }
}
