<?php

declare(strict_types=1);

namespace TUDOMakerspace\Activityindicator\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Patrick Pedersen <ctx.xda@gmail.com>
 */
class ActivityIndicatorTest extends UnitTestCase
{
    /**
     * @var \TUDOMakerspace\Activityindicator\Domain\Model\ActivityIndicator|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \TUDOMakerspace\Activityindicator\Domain\Model\ActivityIndicator::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getActivityReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getActivity()
        );
    }

    /**
     * @test
     */
    public function setActivityForStringSetsActivity(): void
    {
        $this->subject->setActivity('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('activity'));
    }
}
