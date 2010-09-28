<?php
	Croogo::hookRoutes('Flattr');
    Croogo::hookAdminMenu('Flattr');
    //TODO: maybe reduce to nodes
    Croogo::hookHelper('*', 'Flattr.FlattrHook');
?>