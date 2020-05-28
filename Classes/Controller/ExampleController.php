<?php
namespace Ps\Fortyone\Controller;


/***
 *
 * This file is part of the "41m.in" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 
 *
 ***/
/**
 * ExampleController
 */
class ExampleController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * exampleRepository
     * 
     * @var \Ps\Fortyone\Domain\Repository\ExampleRepository
     * @inject
     */
    protected $exampleRepository = null;

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $examples = $this->exampleRepository->findAll();
        $this->view->assign('examples', $examples);
    }

    /**
     * action show
     * 
     * @param \Ps\Fortyone\Domain\Model\Example $example
     * @return void
     */
    public function showAction(\Ps\Fortyone\Domain\Model\Example $example)
    {
        $this->view->assign('example', $example);
    }

    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * action create
     * 
     * @param \Ps\Fortyone\Domain\Model\Example $newExample
     * @return void
     */
    public function createAction(\Ps\Fortyone\Domain\Model\Example $newExample)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->exampleRepository->add($newExample);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \Ps\Fortyone\Domain\Model\Example $example
     * @ignorevalidation $example
     * @return void
     */
    public function editAction(\Ps\Fortyone\Domain\Model\Example $example)
    {
        $this->view->assign('example', $example);
    }

    /**
     * action update
     * 
     * @param \Ps\Fortyone\Domain\Model\Example $example
     * @return void
     */
    public function updateAction(\Ps\Fortyone\Domain\Model\Example $example)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->exampleRepository->update($example);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \Ps\Fortyone\Domain\Model\Example $example
     * @return void
     */
    public function deleteAction(\Ps\Fortyone\Domain\Model\Example $example)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->exampleRepository->remove($example);
        $this->redirect('list');
    }
}
