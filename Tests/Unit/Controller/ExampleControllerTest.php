<?php
namespace Ps\Fortyone\Tests\Unit\Controller;

/**
 * Test case.
 */
class ExampleControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \Ps\Fortyone\Controller\ExampleController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Ps\Fortyone\Controller\ExampleController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllExamplesFromRepositoryAndAssignsThemToView()
    {

        $allExamples = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $exampleRepository = $this->getMockBuilder(\Ps\Fortyone\Domain\Repository\ExampleRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $exampleRepository->expects(self::once())->method('findAll')->will(self::returnValue($allExamples));
        $this->inject($this->subject, 'exampleRepository', $exampleRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('examples', $allExamples);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenExampleToView()
    {
        $example = new \Ps\Fortyone\Domain\Model\Example();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('example', $example);

        $this->subject->showAction($example);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenExampleToExampleRepository()
    {
        $example = new \Ps\Fortyone\Domain\Model\Example();

        $exampleRepository = $this->getMockBuilder(\Ps\Fortyone\Domain\Repository\ExampleRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $exampleRepository->expects(self::once())->method('add')->with($example);
        $this->inject($this->subject, 'exampleRepository', $exampleRepository);

        $this->subject->createAction($example);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenExampleToView()
    {
        $example = new \Ps\Fortyone\Domain\Model\Example();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('example', $example);

        $this->subject->editAction($example);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenExampleInExampleRepository()
    {
        $example = new \Ps\Fortyone\Domain\Model\Example();

        $exampleRepository = $this->getMockBuilder(\Ps\Fortyone\Domain\Repository\ExampleRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $exampleRepository->expects(self::once())->method('update')->with($example);
        $this->inject($this->subject, 'exampleRepository', $exampleRepository);

        $this->subject->updateAction($example);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenExampleFromExampleRepository()
    {
        $example = new \Ps\Fortyone\Domain\Model\Example();

        $exampleRepository = $this->getMockBuilder(\Ps\Fortyone\Domain\Repository\ExampleRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $exampleRepository->expects(self::once())->method('remove')->with($example);
        $this->inject($this->subject, 'exampleRepository', $exampleRepository);

        $this->subject->deleteAction($example);
    }
}
