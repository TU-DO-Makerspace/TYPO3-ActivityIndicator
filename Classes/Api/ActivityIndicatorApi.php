<?php

namespace TUDOMakerspace\Activityindicator\Api;

use Nng\Nnrestapi\Annotations as Api;
use Nng\Nnrestapi\Api\AbstractApi;

use TUDOMakerspace\Activityindicator\Domain\Model\ActivityIndicator;
use TUDOMakerspace\Activityindicator\Domain\Repository\ActivityIndicatorRepository;

class ActivityIndicatorApi extends AbstractApi
{
    protected $activityIndicatorRepository = null;
    
    /**
     * @param ActivityIndicatorRepository $activityIndicatorRepository
     */
    public function injectActivityIndicatorRepository(ActivityIndicatorRepository $activityIndicatorRepository)
    {
        $this->activityIndicatorRepository = $activityIndicatorRepository;
    }

    /**
     * action postActivity
     * Updates the activity status in the repository via
     * a REST POST call
     * 
     * @param bool $status
     * 
     */
    public function postActivityAction( $status )
    {
        $activityIndicator = $this->activityIndicatorRepository->getActivityIndicator();
        // $this->activityIndicatorRepository->update($activityIndicator);
    }
}