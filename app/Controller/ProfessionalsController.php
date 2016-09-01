<?php
App::uses('AppController', 'Controller');
/**
 * Professionals Controller
 *
 * @property Professional $Professional
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ProfessionalsController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Y');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Professional->recursive = 0;
		$this->set('professionals', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Professional->exists($id)) {
			throw new NotFoundException(__('Invalid professional'));
		}
		$options = array('conditions' => array('Professional.' . $this->Professional->primaryKey => $id));
		$this->set('professional', $this->Professional->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function profile() {
		if ($this->request->is('post')) {
			$this->Professional->create();
			if ($this->Professional->save($this->request->data)) {
				$this->Flash->success(__('The professional has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The professional could not be saved. Please, try again.'));
			}
		}
		$users = $this->Professional->User->find('list');
		$types = $this->Professional->Type->find('list');
		$boards = $this->Professional->Board->find('list');
		$this->set(compact('users', 'types', 'boards'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Professional->exists($id)) {
			throw new NotFoundException(__('Invalid professional'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Professional->save($this->request->data)) {
				$this->Flash->success(__('The professional has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The professional could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Professional.' . $this->Professional->primaryKey => $id));
			$this->request->data = $this->Professional->find('first', $options);
		}
		$users = $this->Professional->User->find('list');
		$types = $this->Professional->Type->find('list');
		$boards = $this->Professional->Board->find('list');
		$this->set(compact('users', 'types', 'boards'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Professional->id = $id;
		if (!$this->Professional->exists()) {
			throw new NotFoundException(__('Invalid professional'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Professional->delete()) {
			$this->Flash->success(__('The professional has been deleted.'));
		} else {
			$this->Flash->error(__('The professional could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
