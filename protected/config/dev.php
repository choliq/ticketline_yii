<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
      'db' => array(
				'connectionString' => 'mysql:host=localhost;dbname=ticketline_dev',
			),

      'urlManager' => array(
        'showScriptName' => true,
      ),
    ),
	)
);
