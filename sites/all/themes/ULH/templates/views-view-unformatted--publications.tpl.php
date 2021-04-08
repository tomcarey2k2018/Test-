<?php
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<?php

$staff_id = substr($_GET['q'],strrpos($_GET['q'],"/")+1);

$publications = array();
if($staff_id){
	$sql = "
		SELECT node.nid AS nid
		FROM node
		LEFT JOIN field_data_field_staff ON node.nid = field_data_field_staff.entity_id AND (field_data_field_staff.entity_type = 'node' AND field_data_field_staff.deleted = '0')
		WHERE (( (node.status = '1') 
			AND (node.type IN  ('publications')) 
			AND (field_data_field_staff.field_staff_nid = '". $staff_id ."' ) )
		)
	";
	$rows = db_query($sql);
	foreach($rows AS $row){
		$nid = $row->nid;
		
		$sql = "
			SELECT fm.filename
			FROM node n
			JOIN field_data_field_cover fdfc ON fdfc.entity_id = n.nid
			JOIN file_managed fm ON fm.fid = fdfc.field_cover_fid
			WHERE n.nid = $nid
		";
		$file = db_query($sql)->fetchAssoc();
		$cover = "sites/default/files/". $file['filename'];
		$publication['nid'] = $nid;
		$publication['cover'] = $cover;
		
		$sql = "
			SELECT alias
			FROM url_alias
			WHERE source = 'node/". $nid ."'
		";
		$result = db_query($sql)->fetchAssoc();
		$publication['alias'] = (isset($result['alias'])) ? $result['alias'] : ("node/". $nid);
		$publications[] = $publication;
	}
	//print_r($publications);
}

foreach($publications AS $publication){ ?>
	<a href="<?= $GLOBALS['base_path'] . $publication['alias'] ?>"> <img src="<?= $GLOBALS['base_path'] . $publication['cover'] ?>"/> </a>
<?php } ?>