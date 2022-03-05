<?php

declare(strict_types=1);

namespace TUDOMakerspace\Activityindicator\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Patrick Pedersen <ctx.xda@gmail.com>
 */
class ActivityIndicatorControllerTest extends UnitTestCase
{
    /**
     * @var \TUDOMakerspace\Activityindicator\Controller\ActivityIndicatorController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\TUDOMakerspace\Activityindicator\Controller\ActivityIndicatorController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

}
