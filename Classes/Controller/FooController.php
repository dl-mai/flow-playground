<?php
namespace ACL\Tutorial\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "ACL.Tutorial".               *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Standard controller for the ACL.Tutorial package
 *
 * @FLOW3\Scope("singleton")
 */
class FooController extends \TYPO3\FLOW3\Mvc\Controller\ActionController {
	/**
	 * @var ACL\Tutorial\Domain\Repository\FooRepository
	 * @FLOW3\Inject
	 */
	protected $fooRepository;
	/**
	 * @var TYPO3\FLOW3\Security\Context
	 * @FLOW3\inject
	 */
	protected $securityContext;

	/**
	 * Index action
	 * @return void
	 */
	public function indexAction() {
	}
	/**
	 * list action
	 * @return void
	 */
	public function listAction() {
		$foos = $this->fooRepository->findAll();
		$this->view->assign('foos', $foos);

	}
	/**
	 * @param \ACL\Tutorial\Domain\Model\Foo $foo
	 * @return void
	 */
	public function editAction(\ACL\Tutorial\Domain\Model\Foo $foo){
		$this->view->assign('foo', $foo);
	}
	/**
	 * @param \ACL\Tutorial\Domain\Model\Foo $foo
	 * @return void
	 */
	public function createAction(\ACL\Tutorial\Domain\Model\Foo $foo) {
		$this->fooRepository->add($foo);
		$foo->setAccount($this->securityContext->getAccount());
		$this->addFlashMessage('Your new foo was created.');
		$this->redirect('list');
	}
//	/**
//	 * Updates an existing post
//	 *
//	 * @param \Linh\Survey\Domain\Model\Answer $answer
//	 * @return void
//	 */
//	public function updateAction(\Linh\Survey\Domain\Model\Answer $answer) {
//		$this->answerRepository->update($answer);
//		$this->addFlashMessage('Your Answer has been updated.');
//		$this->redirect('index', 'Question');
//	}
//	/**
//	 *
//	 * @param \Linh\Survey\Domain\Model\Answer $answer
//	 * @return void
//	 */
//	public function deleteAction(\Linh\Survey\Domain\Model\Answer $answer) {
//		$this->answerRepository->remove($answer);
//		$this->addFlashMessage('The answer has been deleted.');
//		$this->redirect('index', 'Question');
//	}

}

?>