<?php
namespace ACL\Tutorial\ViewHelpers;

/**
 *
 *
 * @api
 */
class RoleViewHelper extends \TYPO3\Fluid\Core\ViewHelper\AbstractConditionViewHelper {
	/**
	 * @var \TYPO3\FLOW3\Security\Context
	 */
	protected $securityContext;

	/**
	 * Injects the security context
	 *
	 * @param \TYPO3\FLOW3\Security\Context $securityContext The security context
	 * @return void
	 */
	public function injectSecurityContext(\TYPO3\FLOW3\Security\Context $securityContext) {
		$this->securityContext = $securityContext;
	}

	/**
	 *
	 * @return string the rendered string
	 * @api
	 */
	public function render() {
		$roles = $this->securityContext->getRoles();
		$rolesToString = '';
		while($roles != null){
			$rolesToString .= array_shift( $roles);
			if( count($roles) >= 1){
				$rolesToString.=', ';
			}
		}
		return $rolesToString;
	}
}
?>
