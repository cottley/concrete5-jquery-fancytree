<?php   

defined('C5_EXECUTE') or die(_("Access Denied."));

class jqueryfancytreePackage extends Package {

	protected $pkgHandle = 'jquery_fancytree';
	protected $appVersionRequired = '5.3.3'; 
	protected $pkgVersion = '1.0';
	
	public function getPackageDescription() {
		return t("Lets you add a block where you can create a tree using JSON.");
	}
	
	public function getPackageName() {
		return t("Jquery-fancytree");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block		
		BlockType::installBlockTypeFromPackage('jqueryfancytree', $pkg);
		
	}

}