<?php namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    protected $allowedFields = ['title', 'slug', 'body'];

    public function getNews($slug = false)
    {
        if ($slug === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
        ->where(['slug' => $slug])
        ->first();
    }

    public function delNews($slug = false)
    {
        $query = $this->db->query('DELETE FROM news WHERE slug =\''.$slug.'');
        return $query;

    }

    public function getTitles()
    {
        $query = $this->db->query('SELECT title, slug FROM news');
        return $query->getResultArray();
    }
}