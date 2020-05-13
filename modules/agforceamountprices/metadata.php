<?php

$sMetadataVersion = '1.1';

$aModule = array(
    'id'           => 'agforceamountprices',
    'title'        => 'Force amount prices',
    'description'  => 'Force oxid to use amount price even if base price is lower',
    'thumbnail'    => '',
    'version'      => '1.0.2',
    'author'       => 'Aggrosoft GmbH',
    'extend'      => array(
        'oxarticle' => 'agforceamountprices/extensions/models/agforceamountprices_oxarticle',
    ),
);
