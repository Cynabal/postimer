<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			//uncomment the following to provide test database connection
            'db'=>array(
                'connectionString' => 'mysql:host=localhost;dbname='.$dbname,
                'emulatePrepare' => true,
                'username' => $dbuser,
                'password' => $dbpassword,
                'charset' => 'utf8',
                'tablePrefix'=>$dbprefix,
            ),
		),
	)
);