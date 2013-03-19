<?php    
	defined('C5_EXECUTE') or die(_("Access Denied."));
	class JqueryfancytreeBlockController extends BlockController {
		
		var $pobj;
		 
		protected $btTable = 'btJqueryfancytree';
		protected $btInterfaceWidth = "400";
		protected $btInterfaceHeight = "230";
		
		public $divId = "";
		public $jsonURL = "";
		
		/** 
		 * Used for localization. If we want to localize the name/description we have to include this
		 */
		public function getBlockTypeDescription() {
			return t("Lets you add a block that will create a tree using JSON.");
		}
		
		public function getBlockTypeName() {
			return t("jQuery Fancytree");
		}
				
		function __construct($obj = null) {		
			parent::__construct($obj);	
		}
    
    public function on_page_view() {
      $bv = new BlockView();
      $bv->setBlockObject($this->getBlockObject());
      $blockURL = $bv->getBlockURL();
      $html = Loader::helper('html');            
      $this->addHeaderItem($html->css("{$blockURL}/fancytree/src/skin-win7/ui.fancytree.css"));
      $this->addHeaderItem($html->javascript("{$blockURL}/fancytree/lib/jquery-ui.custom.js"));
      $this->addHeaderItem($html->javascript("{$blockURL}/fancytree/lib/jquery.cookie.js"));
      $this->addHeaderItem($html->javascript("{$blockURL}/fancytree/src/jquery.fancytree.js"));
      $this->addHeaderItem($html->javascript("{$blockURL}/fancytree/src/jquery.fancytree.filter.js"));

      $pg = Page::getCurrentPage();
      $this->set('isEditMode', $pg->isEditMode());
		}
    
		function view(){ 
			$this->set('divId', $this->divId);	
			$this->set('jsonURL', $this->jsonURL); 
		}
		
		function save($data) { 
			$args['divId'] = isset($data['divId']) ? trim($data['divId']) : '';
			$args['jsonURL'] = isset($data['jsonURL']) ? trim($data['jsonURL']) : '';
			parent::save($args);
		}
		
	}
	
?>