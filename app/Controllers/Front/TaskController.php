<?php 

namespace App\Controllers\Front;

use App\Core\BaseController;
use App\Models\Task;

class TaskController extends BaseController {

    private $taskModel;
    public function __construct() {
        $this->taskModel = new Task();
    }


    public function index() {
        $tasks = $this->taskModel->getAll();
        $this->render('front/tasks', ['tasks' => $tasks]);
        
    }

    public function create() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          
            $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;

        if (empty($title) || empty($description)) {
            return $this->render('front/tasks-create', ['error' => 'Başlık ve açıklama gereklidir.']);
           
        }

        if ($this->taskModel->create($title, $description)) {
            return $this->render('front/tasks-create', ['success' => 'Görev başarıyla oluşturuldu.']);
        } 
       
        try {
            $this->taskModel->create($title, $description);
            return $this->render('front/tasks-create', ['success' => 'Görev başarıyla oluşturuldu.']);
        } catch (\Exception $e) {
            return $this->render('front/tasks-create', ['error' => 'Görev oluşturulurken bir hata oluştu.']);
        }
    } else {
        return $this->render('front/tasks-create');
    }

    }

    public function update($id) {

         $task = $this->taskModel->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $title = $_POST['title'] ?? null;
            $description = $_POST['description'] ?? null;

            if (empty($title) || empty($description)) {
                return $this->render('front/tasks-update', ['error' => 'Başlık ve açıklama gereklidir.',
                 'id' => $id ]);
                
            }

            if ($this->taskModel->update($id, $title, $description)) {
                return $this->render('front/tasks-update', ['success' => 'Görev başarıyla güncellendi.',
                 'id' => $id ]);
            }

            try {
                $task = $this->taskModel->getById($id);
                $this->taskModel->update($id, $title, $description);
                return $this->render('front/tasks-update', ['success' => 'Görev başarıyla güncellendi.',
                    'task' => $task ]);
            } catch (\Exception $e) {
                return $this->render('front/tasks-update', ['error' => 'Görev güncellenirken bir hata oluştu.']);
            }
        } else {
           
            if (!$task) {
                return $this->render('front/tasks', ['error' => 'Görev bulunamadı.']);
            }
            return $this->render('front/tasks-update', ['task' => $task]);
        }

    }

    public function delete($id) {
    $task = $this->taskModel->getById($id);

    if ($this->taskModel->delete($id)) {
        // Silme sonrası güncel görevleri çek
        $tasks = $this->taskModel->getAll();
        return $this->render('front/tasks', [
            'success' => 'Görev başarıyla silindi.',
            'tasks' => $tasks
        ]);
    } else {
        $tasks = $this->taskModel->getAll();
        return $this->render('front/tasks', [
            'error' => 'Görev silinirken bir hata oluştu.',
            'tasks' => $tasks
        ]);
    }
}






}