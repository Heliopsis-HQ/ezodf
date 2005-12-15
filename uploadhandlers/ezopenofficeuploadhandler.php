<?php
//
// Definition of eZOpenofficehandler class
//
// Created on: <27-Jul-2005 14:52:11 bf>
//
// Copyright (C) 1999-2005 eZ systems as. All rights reserved.
//
// This source file is part of the eZ publish (tm) Open Source Content
// Management System.
//
// This file may be distributed and/or modified under the terms of the
// "GNU General Public License" version 2 as published by the Free
// Software Foundation and appearing in the file LICENSE included in
// the packaging of this file.
//
// Licencees holding a valid "eZ publish professional licence" version 2
// may use this file in accordance with the "eZ publish professional licence"
// version 2 Agreement provided with the Software.
//
// This file is provided AS IS with NO WARRANTY OF ANY KIND, INCLUDING
// THE WARRANTY OF DESIGN, MERCHANTABILITY AND FITNESS FOR A PARTICULAR
// PURPOSE.
//
// The "eZ publish professional licence" version 2 is available at
// http://ez.no/ez_publish/licences/professional/ and in the file
// PROFESSIONAL_LICENCE included in the packaging of this file.
// For pricing of this licence please contact us via e-mail to licence@ez.no.
// Further contact information is available at http://ez.no/company/contact/.
//
// The "GNU General Public License" (GPL) is available at
// http://www.gnu.org/copyleft/gpl.html.
//
// Contact licence@ez.no if any conditions of this licencing isn't clear to
// you.
//

/*! \file ezopenofficehandler.php
*/

/*!
  \class eZOpenofficehandler ezopenofficehandler.php
  \brief The class eZOpenofficehandler does

*/

include_once( 'kernel/classes/ezcontentuploadhandler.php' );
include_once( "extension/oo/modules/oo/ezooimport.php" );

class eZOpenofficeUploadHandler extends eZContentUploadHandler
{
    function eZOpenofficeUploadHandler()
    {
        $this->eZContentUploadHandler( 'OOo file handling', 'openoffice' );
    }

    /*!
      Handling the uploading of OpenOffice.org docuemnt.
    */
    function handleFile( &$upload, &$result,
                         $filePath, $originalFilename, $mimeinfo,
                         $location, $existingNode )
    {
		$ooINI =& eZINI::instance( 'oo.ini' );
        $tmpDir = $ooINI->variable( 'OOo', 'TmpDir' );
		
        $originalFilename = basename( $originalFilename );
        $tmpFile = $tmpDir . "/" . $originalFilename;
        copy( $filePath, $tmpFile );

        $import = new eZOOImport();
        $tmpResult = $import->import( $tmpFile, $location, $originalFilename );

        $result['contentobject'] = $tmpResult['Object'];
        $result['contentobject_main_node'] = $tmpResult['MainNode'];
        unlink( $tmpFile );


        return true;
    }

}
?>
