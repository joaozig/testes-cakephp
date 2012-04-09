<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Post extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'titulo' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Campo Obrigatório',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public function publicado(){
		$conditions = array('conditions' => array('publicado' => true));
		$results = $this->find('all',$conditions);
		return $results;
	}
}
