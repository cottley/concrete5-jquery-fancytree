<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); 

 $url = $jsonURL;
 preg_match_all('/%%.+?%%/', $url, $matches);
 if (count($matches) == 1) {
   for ($i=0; $i<count($matches[0]); $i++)
   {
     $vartoprocess = substr(substr($matches[0][$i], 0, strlen($matches[0][$i]) - 2), 2);
     $valuetoreplace = isset($_GET[$vartoprocess]) ? $_GET[$vartoprocess] : ""; 
     $url = str_replace($matches[0][$i], $valuetoreplace, $url);     
   }
 }
 
if (!$isEditMode) {
?>
<script language="javascript">
	$(function(){  
		$("#<?php echo $divId; ?>").fancytree({
			extensions: ["filter"],
			source: {
				url: "<?php echo $url; ?>"
			},
			filter: {

			},
			activate: function(e, data) {
        var node = data.node;
        if ( node.data.url ) {
          window.open(node.data.url);
        }
			}
		});  
    
		var tree = $("#<?php echo $divId; ?>").fancytree("getTree");

		/*
		 * Event handlers for interface
		 */
		$("input[name=search]").keyup(function(e){
			var match = $(this).val();
			if(e && e.which === $.ui.keyCode.ESCAPE || $.trim(match) === ""){
				$("button#btnResetSearch").click();
				return;
			}
			// Pass text as filter string (will be matched as substring in the node title)
			var n = tree.applyFilter(match);
			$("button#btnResetSearch").attr("disabled", false);
			$("span#matches").text("(" + n + " matches)");
		}).focus();

		$("button#btnResetSearch").click(function(e){
			$("input[name=search]").val("");
			$("span#matches").text("");
			tree.clearFilter();
		}).attr("disabled", true);

		$("input#hideMode").change(function(e){
			tree.options.filter.mode = $(this).is(":checked") ? "hide" : "dimm";
			tree.clearFilter();
			$("input[name=search]").keyup();
		});    
	});    
</script>
	<p>
		<label>Filter:</label>
		<input name="search" placeholder="Filter...">
		<button id="btnResetSearch">&times;</button>
		<span id="matches"></span>
	</p>
	<p>
		<label for="hideMode">
			<input type="checkbox" id="hideMode" />
			Hide unmatched nodes
		</label>
	</p>
<?php
} else {
?><b>jQuery Fancytree - Not activated in edit mode</b>
<?php 
}
?>