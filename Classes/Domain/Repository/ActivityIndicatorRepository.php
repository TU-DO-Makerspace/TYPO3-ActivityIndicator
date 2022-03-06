<?php

declare(strict_types=1);

namespace TUDOMakerspace\Activityindicator\Domain\Repository;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

use TUDOMakerspace\Activityindicator\Domain\Model\ActivityIndicator;

/**
 * This file is part of the "ActivityIndicator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Patrick Pedersen <ctx.xda@gmail.com>
 */

/**
 * The repository for ActivityIndicators
 */
class ActivityIndicatorRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * Initializes the DB table with a ActivityIndicator object
     */
    private function initTable()
    {
        if ($this->countAll() === 0) {
            $this->add(GeneralUtility::makeInstance(ActivityIndicator::class));
            $this->persistenceManager->persistAll();
        }
    }

    /**
     * Constructor
     * Initializes the table, if necessary
     * 
     * @param ObjectManagerInterface $objectManager
     * @param PersistenceManager $persistenceManager
     * 
     */
    public function __construct(ObjectManagerInterface $objectManager, PersistenceManager $persistenceManager)
    {
        parent::__construct($objectManager);
        parent::injectPersistenceManager($persistenceManager);
        $this->initTable();
    }

    /**
     * Fetches the ActivityIndicator object from the DB table
     * 
     * If the repository is empty, it will be initialized with a 
     * ActivityIndicator object first
     * 
     * @return ActivityIndicator
     */
    public function getActivityIndicator() : ActivityIndicator
    {
        return $this->findAll()[0];
    }
}
