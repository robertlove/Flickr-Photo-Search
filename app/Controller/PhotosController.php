<?php
/**
 * Photos Controller
 */
class PhotosController extends AppController
{
    /**
     * Search
     *
     * @return void.
     */
    public function search()
    {
        // Which page?
        $page = 1;
        if (isset($this->request->query['page'])) {
            $page = trim($this->request->query['page']);
        }
        if (isset($this->request->params['named']['page'])) {
            $page = trim($this->request->params['named']['page']);
        }

        $text = null;
        if (isset($this->request->query['text'])) {
            $this->redirect(array('action' => 'search', 'text' => urlencode($this->request->query['text']), 'page' => $page));
        }
        if (isset($this->request->params['named']['text'])) {
            $text = $this->request->params['named']['text'];
        }
        if (empty($text)) {
            $this->Session->setFlash('Try searching for something!');
            $this->redirect('/');
        }

        // Search...
        $photos = $this->Photo->search(array(
            'content_type' => 1,
            'media' => 'photos',
            'page' => $page,
            'per_page' => 5,
            'privacy_filter' => 1,
            'safe_search' => 1,
            'text' => urldecode($text),
        ));

        // Any results?
        if (!$photos) {
            $this->Session->setFlash('Not a sausage :(');
            $this->redirect('/');
        }

        // Some vars
        $pages = $photos['photos']['pages'];
        $total = $photos['photos']['total'];
        $title_for_layout = urldecode($text);

        // Page numbers
        $modulus = 4;
        $half = intval($modulus / 2);
        $end = $page + $half;
        if ($end > $pages) {
            $end = $pages;
        }
        $start = $page - ($modulus - ($end - $page));
        if ($start <= 1) {
            $start = 1;
            $end = $page + ($modulus  - $page) + 1;
        }
        $numbers = range($start, $end);

        $this->set(compact('numbers', 'page', 'pages', 'photos', 'text', 'title_for_layout', 'total'));
    }

    /**
     * View
     *
     * @param int $id The ID of the photo being viewed.
     * @return void.
     */
    public function view($id = null)
    {
        if (!$id) {
            $this->Session->setFlash('This is not the photo you are looking for...');
            $this->redirect('/');
        }
        $photo = $this->Photo->getInfo(array(
            'photo_id' => $id,
        ));
        $title_for_layout = $photo['photo']['title']['_content'];
        $this->set(compact('photo', 'title_for_layout'));
    }
}