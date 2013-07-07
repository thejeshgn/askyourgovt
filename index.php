<?php
$app=require __DIR__.'/lib/base.php';
require __DIR__.'/external_lib/markdown.php';
$app->set('AUTOLOAD','inc/;inc/temp/');
$app->set('GUI','gui/');
$app->set('DEBUG',1);
$app->set('top_menu',
	array(
        'questions'=>'Questions',
        'news'=>'News Stream',
		'contact'=>'Contact'
	)
);

$app->set('side_menu',
	array(
		'/'=>'Error Handling',
		'globals'=>'Globals'
	)
);

//THESE TWO VARIABLES CAN BE SET LATER
$app->set('ASKYOURGOVT_DB',new DB('sqlite:./db/test.sqlite'));
$app->set('ASKYOURGOVT_DOCS_PATH','./docs_test/');


$app->route('GET /','Main->home');
$app->route('GET /about','Main->about');
$app->route('GET /contact','Main->contact');
$app->route('GET /license','Main->license');
$app->route('GET /rtiact','Main->rtiact');
$app->route('GET /credits','Main->credits');
$app->route('GET /news','Main->news');

$app->route('GET /questions','Question->questions');
$app->route('GET /question/id/@question_id','Question->question_by_id');
$app->route('GET /question/id/@question_id/@tab','Question->question_by_id');


$app->route('GET /user/@user_name','Users->profile');

$app->route('GET /document/id/@document_id','Document->document_view_by_id');

$app->route('GET /batch/question_meta_update','Batch->question_meta_update');
$app->route('GET /batch/users_meta_update','Batch->users_meta_update');

$app->route('GET /action/report/@question_id','Actions->report_question_by_id');


$app->run();
?>