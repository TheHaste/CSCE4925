<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "DataTables/DataTables.php" );

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
Editor::inst( $db, 'datatables_demo' )
	->fields(
		Field::inst( 'name_id' ),
		Field::inst( 'serial_number' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Serial Number is required' )	
			) ),
		Field::inst( 'brand' )
			->setFormatter( Format::ifEmpty(null) ),
		Field::inst( 'model' )
			->setFormatter( Format::ifEmpty(null) ),
		Field::inst( 'assigned' )
			->setFormatter( Format::ifEmpty(null) ),
		Field::inst( 'location' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'Asset location is required' )	
			) ),
		Field::inst( 'cost' )
			->validator( Validate::numeric() )
			->setFormatter( Format::ifEmpty(null) ),
		Field::inst( 'date_deployed' )
			->validator( Validate::dateFormat( 'Y-m-d' ) )
			->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
			->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
		Field::inst( 'date_surplused' )
			->validator( Validate::dateFormat( 'Y-m-d' ) )
			->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
			->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
		Field::inst( 'last_updated' )
			->validator( Validate::dateFormat( 'Y-m-d' ) )
			->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
			->setFormatter( Format::dateFormatToSql('Y-m-d' ) )
	)
	->process( $_POST )
	->json();
