<?php
/**
 * Photo Model
 */
class Photo extends AppModel
{
    /**
     * Get Info
     *
     * @param array $arguments The arguments to pass to the method.
     * @return mixed A result array if successful, false otherwise.
     */
    public function getInfo($arguments = array())
    {
        if ($results = $this->query('getInfo', $arguments)) {
            if ((isset($results['photo'])) && (!empty($results['photo']))) {
                $results['photo']['url'] = sprintf('http://farm%s.static.flickr.com/%s/%s_%s.jpg', $results['photo']['farm'], $results['photo']['server'], $results['photo']['id'], $results['photo']['secret']);
                $results['photo']['owner']['buddy_icon'] = sprintf('http://farm%s.static.flickr.com/%s/buddyicons/%s.jpg', $results['photo']['owner']['iconfarm'], $results['photo']['owner']['iconserver'], $results['photo']['owner']['nsid']);
                $results['photo']['owner']['url'] = sprintf('http://www.flickr.com/photos/%s/', $results['photo']['owner']['nsid']);
                if ((isset($results['photo']['tags']['tag'])) && (!empty($results['photo']['tags']['tag']))) {
                    foreach ($results['photo']['tags']['tag'] as $i => $tag) {
                        $results['photo']['tags']['tag'][$i]['url'] = sprintf('http://www.flickr.com/photos/%s/tags/%s/', $tag['author'], $tag['_content']);
                    }
                }
                return $results;
            }
        }
        return false;
    }

    /**
     * Search
     *
     * @param array $arguments The arguments to pass to the method.
     * @return mixed A result array if successful, false otherwise.
     */
    public function search($arguments = array())
    {
        if ($results = $this->query('search', $arguments)) {
            if ((isset($results['photos']['photo'])) && (!empty($results['photos']['photo']))) {
                $data = array();
                foreach ($results['photos']['photo'] as $i => $photo) {
                    $results['photos']['photo'][$i]['url'] = sprintf('http://farm%s.static.flickr.com/%s/%s_%s_s.jpg', $photo['farm'], $photo['server'], $photo['id'], $photo['secret']);
                }
                return $results;
            }
        }
        return false;
    }
}