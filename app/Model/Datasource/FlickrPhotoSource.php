<?php
/**
 * Flickr Photo Source
 */
class FlickrPhotoSource extends DataSource
{
    /**
     * List Sources
     *
     * @param mixed $data
     * @return array Array of sources available in this datasource.
     */
    public function listSources($data = null)
    {
        return array(
            'photos'
        );
    }

    /**
     * Query
     *
     * @param string $name The name of the method being called.
     * @param array $arguments The arguments to pass to the method.
     * @return mixed A result array if successful, false otherwise.
     */
    public function query($name = null, $arguments = array())
    {
        if ($name && !empty($arguments)) {
            $arguments = isset($arguments[0]) ? $arguments[0] : $arguments;
            $query = array_merge(array(
                'api_key' => $this->config['key'],
                'format' => 'php_serial',
                'method' => 'flickr.photos.' . $name,
            ), $arguments);
            $cacheKey = md5(serialize($query));
            if ($results = Cache::read($cacheKey)) {
                return $results;
            }
            $url = 'http://api.flickr.com/services/rest/?' . http_build_query($query);
            if ($response = file_get_contents($url)) {
                if ($results = unserialize($response)) {
                    if ((isset($results['stat'])) && ($results['stat'] == 'ok')) {
                        Cache::write($cacheKey, $results);
                        return $results;
                    }
                }
            }
        }
        return false;
    }
}