<?php
// Define constants for my additional namespaces.
define("NS_FORMULA", 4200); // This MUST be even.
define("NS_FORMULA_TALK", 4201); // This MUST be the following odd integer.
define("NS_PERSON", 4202);
define("NS_PERSON_TALK", 4203);
define("NS_CODEMETA", 4204);
define("NS_CODEMETA_TALK", 4205);
define("NS_PUBLICATION", 4206);
define("NS_PUBLICATION_TALK", 4207);
define("NS_SOFTWARE", 4208);
define("NS_SOFTWARE_TALK", 4209);
define("NS_DATASET", 4210);
define("NS_DATASET_TALK", 4211);
define("NS_COMMUNITY", 4212);
define("NS_COMMUNITY_TALK", 4213);

// Add namespaces.
$wgExtraNamespaces[NS_FORMULA] = "Formula";
$wgExtraNamespaces[NS_FORMULA_TALK] = "Formula_talk";
$wgExtraNamespaces[NS_PERSON] = "Person";
$wgExtraNamespaces[NS_PERSON_TALK] = "Person_talk";
$wgExtraNamespaces[NS_PUBLICATION] = "Publication";
$wgExtraNamespaces[NS_PUBLICATION_TALK] = "Publication_talk";
$wgExtraNamespaces[NS_SOFTWARE] = "Software";
$wgExtraNamespaces[NS_SOFTWARE_TALK] = "Software_talk";
$wgExtraNamespaces[NS_DATASET] = "Dataset";
$wgExtraNamespaces[NS_DATASET_TALK] = "Dataset_talk";
$wgExtraNamespaces[NS_COMMUNITY] = "Community";
$wgExtraNamespaces[NS_COMMUNITY_TALK] = "Community_talk";

$wgNamespaceProtection[NS_FORMULA] = array( 'overwriteprofilepages' ); 
$wgNamespaceProtection[NS_PERSON] = array( 'overwriteprofilepages' );
$wgNamespaceProtection[NS_PUBLICATION] = array( 'overwriteprofilepages' );
$wgNamespaceProtection[NS_SOFTWARE] = array( 'overwriteprofilepages' ); 
$wgNamespaceProtection[NS_DATASET] = array( 'overwriteprofilepages' );
$wgNamespaceProtection[NS_COMMUNITY] = array( 'overwriteprofilepages' );


$wgGroupPermissions['sysop']['overwriteprofilepages'] = true;

$wgContentNamespaces[] = NS_FORMULA;
$wgContentNamespaces[] = NS_PERSON;
$wgContentNamespaces[] = NS_PUBLICATION;
$wgContentNamespaces[] = NS_SOFTWARE;
$wgContentNamespaces[] = NS_DATASET;
$wgContentNamespaces[] = NS_COMMUNITY;



$wgNamespacesToBeSearchedDefault[NS_FORMULA] = true;
$wgNamespacesToBeSearchedDefault[NS_PERSON] = true;
$wgNamespacesToBeSearchedDefault[NS_PUBLICATION] = true;
$wgNamespacesToBeSearchedDefault[NS_SOFTWARE] = true;
$wgNamespacesToBeSearchedDefault[NS_DATASET] = true;


