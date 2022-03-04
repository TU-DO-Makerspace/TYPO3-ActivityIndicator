<?php
declare(strict_types=1);

namespace TUDOMakerspace\Activityindicator\Tests\Unit\Domain\Model;

use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Patrick Pedersen <ctx.xda@gmail.com>
 */
class ActivityIndicatorTest extends UnitTestCase
{
    /**
     * @var \TUDOMakerspace\Activityindicator\Domain\Model\ActivityIndicator
     */
    protected $subject;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \TUDOMakerspace\Activityindicator\Domain\Model\ActivityIndicator();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getActivityReturnsInitialValueForBool()
    {
        self::assertSame(
            false,
            $this->subject->getActivity()
        );
    }

    /**
     * @test
     */
    public function setActivityForBoolSetsActivity()
    {
        $this->subject->setActivity(true);

        self::assertAttributeEquals(
            true,
            'activity',
            $this->subject
        );
    }
}
