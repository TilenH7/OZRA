<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController
{
    public function display(string ...$path): ?Response
    {
        if (!$path) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }

        $page = $path[0] ?? null;
        $subpage = $path[1] ?? null;

        if ($page === 'home') {
            $this->loadModel('Recepti');
            $this->loadModel('Uporabniki');
            $this->loadModel('Sestavine');
            $this->loadModel('Komentarji');

            $zadnjiRecepti = $this->Recepti->find()
                ->contain(['Uporabniki'])
                ->orderDesc('Recepti.ustvarjen')
                ->limit(6)
                ->all();

            $popularneKategorije = $this->Recepti->find()
                ->select(['kategorija', 'stevilo' => $this->Recepti->find()->func()->count('*')])
                ->where(['kategorija IS NOT' => null, 'kategorija !=' => ''])
                ->group('kategorija')
                ->orderDesc('stevilo')
                ->limit(5)
                ->all();

            $stats = [
                'recepti' => $this->Recepti->find()->count(),
                'uporabniki' => $this->Uporabniki->find()->count(),
                'sestavine' => $this->Sestavine->find()->count(),
                'komentarji' => $this->Komentarji->find()->count(),
            ];

            $this->set(compact('zadnjiRecepti', 'popularneKategorije', 'stats'));
        }

        $this->set(compact('page', 'subpage'));

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
}
