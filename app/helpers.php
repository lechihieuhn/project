<?php

function hpl_subCateAll($array, $parent=0, $indent="") {
    $return = array();
    foreach($array as $key => $val) {
      if($val["parent_id"] == $parent) {
        $return[$val["id"]] = ["id"=>$val["id"],"name"=>$indent.$val["name"]];
        $return = array_merge($return, hpl_subCateAll($array, $val["id"], $indent."----"));
      }
    }
	return $return;
}