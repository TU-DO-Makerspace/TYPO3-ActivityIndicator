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
    protected $activityIndicator = null;
    protected $activityIndicatorRepository = null;
    protected $persistenceManager = null;

    /**
    * @param PersistenceManager $persistenceManager
    */
    public function injectPersistenceManager(PersistenceManager $persistenceManager)
    {
        $this->persistenceManager = $persistenceManager;
    }

    /**
     * Constructor
     * 
     * Injects activityIndicatorRepository and fetches
     * the ActivityIndicator object from the DB table.
     * 
     * @param ActivityIndicatorRepository $activityIndicatorRepository
     */
    public function __construct(ActivityIndicatorRepository $activityIndicatorRepository)
    {
        $this->activityIndicatorRepository = $activityIndicatorRepository;
        $this->activityIndicator = $this->activityIndicatorRepository->getActivityIndicator();
    }

    // TODO: Use a single post request instead of two
    // TODO: Authenticate the request

    /**
    * API action set
    *   
    * Sets the activity status. Accepts "open" or "close" as arguments.
    *
    * @Api\Route("POST /ActivityIndicator/activity/{activity}")
    * @Api\Access("public")
    *
    * @param string $activity "open" or "close"
    * @return Response response object with status code and optionally a message 
    */
    public function set( string $activity = null )
    {
        if ( $activity != 'open' && $activity != 'close' )
            return $this->response->invalid('"activity" must be "open" or "close"');

        $this->activityIndicator->setActivity( $activity == 'open' ? true : false );
        $this->activityIndicatorRepository->update($this->activityIndicator);
        $this->persistenceManager->persistAll();
        
        return $this->response->success();
    }

    /**
     *
     * API action get
     * Fetches the activity status from the repository
     * and returns a JSON response with the activity status
     *
     * @Api\Route("GET /ActivityIndicator/activity")
     * @Api\Access("public")
     * 
     * @return array
     */
    public function get()
    {
        return [
            'activity' => $this->activityIndicator->getActivity(),
        ];
    }
}
