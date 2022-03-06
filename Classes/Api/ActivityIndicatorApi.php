<?php

namespace TUDOMakerspace\Activityindicator\Api;

use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

use Nng\Nnrestapi\Annotations as Api;
use Nng\Nnrestapi\Api\AbstractApi;

use TUDOMakerspace\Activityindicator\Domain\Model\ActivityIndicator;
use TUDOMakerspace\Activityindicator\Domain\Repository\ActivityIndicatorRepository;

/**
 * @Api\Endpoint()
 */
class ActivityIndicatorApi extends AbstractApi
{
    protected $activityIndicatorRepository = null;
    protected $persistenceManager = null;

    /**
     * @param ActivityIndicatorRepository $activityIndicatorRepository
     */
    public function injectActivityIndicatorRepository(ActivityIndicatorRepository $activityIndicatorRepository)
    {
        $this->activityIndicatorRepository = $activityIndicatorRepository;
    }

    /**
    * @param PersistenceManager $persistenceManager
    */
   public function injectPersistenceManager(PersistenceManager $persistenceManager)
   {
       $this->persistenceManager = $persistenceManager;
   }

    // TODO: Use a single post request instead of two
    // TODO: Authenticate the request

    /**
     *
     * action postOpenAction
     * Updates the activity status in the repository via
     * a REST POST call
     * 
     * @Api\Access("public")
     * 
     * @return array
     */
    public function postOpenAction()
    {
        $activityIndicator = $this->activityIndicatorRepository->getActivityIndicator();
        $activityIndicator->setActivity(true);
        $this->activityIndicatorRepository->update($activityIndicator);
        $this->persistenceManager->persistAll();
        return [
            'activity' => "Open",
        ];
    }

    /**
     *
     * action postCloseAction
     * Updates the activity status in the repository via
     * a REST POST call
     * 
     * @Api\Access("public")
     * 
     * @return array
     */
    public function postCloseAction()
    {
        $activityIndicator = $this->activityIndicatorRepository->getActivityIndicator();
        $activityIndicator->setActivity(false);
        $this->activityIndicatorRepository->update($activityIndicator);
        $this->persistenceManager->persistAll();
        return [
            'activity' => "Closed",
        ];
    }
}
