<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include(dirname(__FILE__)'./DataTables.php' );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;
	

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'assets' )
	->fields(
		Field::inst( 'name_id' ),
		Field::inst( 'serial_number' ),
		Field::inst( 'brand' ),
		Field::inst( 'model' ),
		Field::inst( 'assigned' ),
		Field::inst( 'location' ),
		Field::inst( 'cost' ),
		Field::inst( 'date_deployed' ),
		Field::inst( 'date_surplused' ),
		Field::inst( 'last_updated' ),
	)
	->process( $_POST )
	->json();
