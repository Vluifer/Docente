<?php
require_once $_SERVER["DOCUMENT_ROOT"].'/Docente/libs/activerecord/ActiveRecord.php';

ActiveRecord\Config::initialize(function($cfg)
{
   $cfg->set_model_directory($_SERVER["DOCUMENT_ROOT"].'/Docente/models');
   $cfg->set_connections(
     array(
       'development' => 'mysql://root:@localhost/docentes',
        'test' => 'mysql://root:@localhost/docentes',
       'production' => 'mysql://root:@localhost/docentes'
     )
   );
});

