<?php
namespace ACL\Tutorial\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "ACL.Tutorial".               *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;
use Doctrine\ORM\Mapping as ORM;

/**
 * A Foo
 *
 * @FLOW3\Entity
 */
class Foo {
	/**
	 * @var string
	 */
	protected $name;
	/**
	 * @var \DateTime
	 */
	protected $date;
	/**
	 * @var \boolean
	 */
	protected $isSpecial;
	/**
	 * @var \TYPO3\FLOW3\Security\Account
	 * @ORM\ManyToOne
	 */
	protected $account;

	/**
	 * @param \TYPO3\FLOW3\Security\Account $account
	 */
	public function setAccount($account)
	{
		$this->account = $account;
	}

	/**
	 * @return \TYPO3\FLOW3\Security\Account
	 */
	public function getAccount()
	{
		return $this->account;
	}

	/**
	 * @param boolean $isSpecial
	 */
	public function setIsSpecial($isSpecial)
	{
		$this->isSpecial = $isSpecial;
	}

	/**
	 * @return boolean
	 */
	public function getIsSpecial()
	{
		return $this->isSpecial;
	}

	/**
	 *
	 */
	public function __construct() {
		$this->date = new \DateTime();
	}
	/**
	 * Setter for date
	 *
	 * @param \DateTime $date
	 * @return void
	 */
	public function setDate(\DateTime $date) {
		$this->date = $date;
	}

	/**
	 * Getter for date
	 *
	 * @return \DateTime
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @param string $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

}
?>