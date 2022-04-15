<?php

declare(strict_types=1);

namespace TUDOMakerspace\Activityindicator\Controller;

use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use TUDOMakerspace\Activityindicator\Domain\Model\ActivityIndicator;
use TUDOMakerspace\Activityindicator\Domain\Repository\ActivityIndicatorRepository;

/**
 * This file is part of the "ActivityIndicator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Patrick Pedersen <ctx.xda@gmail.com>
 */

/**
 * ActivityIndicatorController
 */
class ActivityIndicatorController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * persistenceManager
     *
     * @var PersistenceManager
     */
    protected $persistenceManager = null;

    /**
     * activityIndicatorRepository
     *
     * @var ActivityIndicatorRepository
     */
    protected $activityIndicatorRepository = null;

    /**
     * @param PersistenceManager $persistenceManager
     */
    public function injectPersistenceManager(PersistenceManager $persistenceManager)
    {
        $this->persistenceManager = $persistenceManager;
    }

    /**
     * @param ActivityIndicatorRepository $activityIndicatorRepository
     */
    public function injectActivityIndicatorRepository(ActivityIndicatorRepository $activityIndicatorRepository)
    {
        $this->activityIndicatorRepository = $activityIndicatorRepository;
    }

    /**
     * action display
     * Fetches the activity status and the last modified time
     * from the repository and displays it to the front-end via
     * the Display.html template
     *
     * @return string|object|null|void
     */
    public function displayAction()
    {
        $activityIndicator = $this->activityIndicatorRepository->getActivityIndicator();
        $this->view->assign('activity', $activityIndicator->getActivity());
        $this->view->assign('tstamp', $activityIndicator->getTstampRelative());
    }
}
