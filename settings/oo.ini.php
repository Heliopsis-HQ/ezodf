[OOo]
# Path to zip program on windows you can use: 
# http://www.info-zip.org/pub/infozip/
# enter for example c:\zip\ or /usr/local/bin/
ZipPath=
# Directory for storing temporary files during conversion (now stored in var/storage, so is deprecated?)
TmpDir=/tmp

[OOImport]
# Default class for import
DefaultImportClass=article
# Default class for making an image
DefaultImportImageClass=image
RegisteredClassArray[]=article
RegisteredClassArray[]=folder
RegisteredClassArray[]=image
ImportedImagesMediaNodeName=Imported images
PlaceImagesInMedia=false
OOConverterPort=9090
# Currently only localhost (127.0.0.1) is allowed
OOConverterAddress=127.0.0.1


[OOExport]
UseTemplate=true
TemplateName=ezpublish.ott

# Map eZ publish attributes to OpenOffice.org section definitions
#
# Format:
# [<class_identifier>]
# DefaultImportTitleAttribute=<attribute>
# DefaultImportBodyAttribute=<attribute>
# Is used to content of file into attributes if there is no known sections
# in the OO input file.
# Attribute[]= matches sections from the OO input document with eZ publish attributes

[article]
DefaultImportTitleAttribute=title
DefaultImportBodyAttribute=body
Attribute[title]=title
Attribute[intro]=intro
Attribute[body]=body

[folder]
DefaultImportTitleAttribute=name
DefaultImportBodyAttribute=description
Attribute[name]=name
Attribute[short_description]=short_description
Attribute[description]=description

[image]
DefaultImportTitleAttribute=name
DefaultImportBodyAttribute=image
Attribute[name]=name
Attribute[caption]=caption
Attribute[image]=image

# DocumentType tells which are the supported document type by oo
[DocumentType]
# AllowedTypes are those documents which are supported and published directely and need not to convert for support.
AllowedTypes[]
AllowedTypes[]=odt
# ConvertTypes are those documents which can be converted by oo and then it will publish it automatically.
ConvertTypes[]
ConvertTypes[]=doc
