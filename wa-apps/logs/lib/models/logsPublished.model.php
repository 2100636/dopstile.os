<?php

class logsPublishedModel extends waModel
{
    protected $table = 'logs_published';

    public function getFilesStatuses($paths)
    {
        if (!is_array($paths) || !$paths) {
            return array();
        }

        $published = $this
            ->select('path')
            ->where(
                'path IN(s:paths)',
                array(
                    'paths' => $paths,
                )
            )->fetchAll(null, true);

        $result = array();
        foreach ($paths as $path) {
            $result[$path] = in_array($path, $published);
        }

        return $result;
    }
}
