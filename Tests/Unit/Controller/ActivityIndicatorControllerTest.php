<?php
declare(strict_types=1);

namespace TUDOMakerspace\Activityindicator\Tests\Unit\Controller;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Patrick Pedersen <ctx.xda@gmail.com>
 */
class ActivityIndicatorControllerTest extends UnitTestCase
{
    /**
     * @var \TUDOMakerspace\Activityindicator\Controller\ActivityIndicatorController
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\TUDOMakerspace\Activityindicator\Controller\ActivityIndicatorController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

}
