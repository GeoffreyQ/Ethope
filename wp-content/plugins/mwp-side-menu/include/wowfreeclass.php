<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<?php
class WOWFREEClass {
    function addNewItem($tblname, $mwpinfo) {
        global $wpdb;
		$tablefields = $wpdb->get_results( 'SHOW COLUMNS FROM '.$tblname, OBJECT );
        $columns = count($tablefields);
        $field_array = array();
        for ($i = 0; $i < $columns; $i++) {
			$fieldname = $tablefields[$i]->Field;
			$field_array[] = $fieldname;
		}
        $count = sizeof($mwpinfo);
        if ($count > 0) {
            $id = 0;
            $field = "";
            $vals = "";
            foreach ($field_array as $key) {
                if ($field == "") {
                    $field = "`" . $key . "`";
                    $vals = "'" . addcslashes($mwpinfo[$key],"'") . "'";
                } else {
                    $field = $field . ",`" . $key . "`";
                    $vals = $vals . ",'" . addcslashes($mwpinfo[$key],"'") . "'";
                }
            }			
            $sSQL = $wpdb->prepare("INSERT INTO " . $tblname . " ($field) values ($vals)",$field , $vals);
            $wpdb->query($sSQL);
			//echo "<pre>";
			//print_r($wpdb);
			//exit(0);
            return true;
        } else {
            return false;
        }
    }
    function updItem($tblname, $mwpinfo) {
        global $wpdb;		
		$tablefields = $wpdb->get_results( 'SHOW COLUMNS FROM '.$tblname, OBJECT );
        $columns = count($tablefields);
        $field_array = array();
        for ($i = 0; $i < $columns; $i++) {
			$fieldname = $tablefields[$i]->Field;
			$field_array[] = $fieldname;
		}
		$count = sizeof($mwpinfo);
        if ($count > 0) {
            $field = "";
            $vals = "";
            foreach ($field_array as $key) {
                if ($field == "" && $key != "id" && $key != "mails") {
                    $field = "`" . $key . "` = '" . addcslashes($mwpinfo[$key],"'") . "'";
                } else if ($key != "id" && $key != "mails") {
                    $field = $field . ",`" . $key . "` = '" . addcslashes($mwpinfo[$key],"'") . "'";
                }
            }
			$mwpid = $mwpinfo["id"];
            $sSQL = $wpdb->prepare("update " . $tblname . " set $field where id=%d", $mwpid);
            $wpdb->query($sSQL);
            return true;
        } else {
            return false;
        }
    }
}
?>