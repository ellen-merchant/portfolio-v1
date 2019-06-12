<?php

namespace Ellllllen\PersonalWebsite\Articles;

use Illuminate\Filesystem\FilesystemManager;

class GetArticles
{
    /**
     * @var Articles
     */
    private $articles;
    /**
     * @var FilesystemManager
     */
    private $filesystemManager;

    /**
     * GetArticles constructor.
     * @param Articles $articles
     * @param FilesystemManager $filesystemManager
     */
    public function __construct(Articles $articles, FilesystemManager $filesystemManager)
    {
        $this->articles = $articles;
        $this->filesystemManager = $filesystemManager;
    }

    /**
     * @param null $tag
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|null
     */
    public function paginate($tag = null)
    {
        return $this->articles->paginate($tag);
    }

    /**
     * @param null $limit
     * @return \Illuminate\Support\Collection|null
     */
    public function get($limit = null)
    {
        if ($limit) {
            return $articles = $this->articles->getLatest($limit);
        }

        return $articles = $this->articles->get();
    }

    /**
     * @param null $limit
     * @return \Illuminate\Support\Collection|null
     */
    public function getWithImages($limit = null)
    {
        $articles = $this->get($limit);

        //filter out articles that don't have valid images to display
        return $articles->filter(function (Article $value) {
            if ($value->image) {
                return true;
            }
            return false;
        });
    }

    /**
     * @param $articleID
     * @return Article
     */
    public function findOrFail($articleID): Article
    {
        return Article::findOrFail($articleID);
    }
}
