<?php
namespace ACL\Tutorial\Command;

/*                                                                        *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * AccountController command controller for the ACL.Tutorial package
 *
 * @FLOW3\Scope("singleton")
 */
class AccountCommandController extends \TYPO3\FLOW3\Cli\CommandController {


	/**
	 * @var \TYPO3\FLOW3\Security\AccountRepository
	 * @FLOW3\Inject
	 */
	protected $accountRepository;

	/**
	 * Creates an user account for the Backend ($role, $user, $pass)
	 *
	 * @param string $role This argument is required
	 * @param string $username This argument is required
	 * @param string $password This argument is optional
	 * @return void
	 */
	public function createCommand($role, $username, $password) {

		// exit if already exist
		$accountCount = $this->accountRepository->countByAccountIdentifier($username);
		if ($accountCount > 0) {
			$this->outputLine('User already exist!');
			return;
		}
		$role = strtolower($role);
		switch($role){
			case 'administrator':
			case 'admin':
			$role = 'Administrator';
				break;
			case 'editor';
				$role = 'Editor';
				break;
			default:
				$this->outputLine('Invalid user role');
				return;
				break;
		}
		$accountFactory = new \TYPO3\FLOW3\Security\AccountFactory();
		$account = $accountFactory->createAccountWithPassword($username, $password, array($role));
		try {
			$this->accountRepository->add($account);
			$this->outputLine('Created "%s" user "%s" identified by password "%s".', array($role, $username, $password));
		} catch (\Exception $e) {
			$this->outputLine('Created user "%s" is already taken, deleted and created a new one...', array($username));
		}


	}

}

?>