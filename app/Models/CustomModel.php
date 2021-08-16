<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CustomModel{
    protected $db;

    public function __construct(ConnectionInterface &$db){
        $this->db =& $db;
    }

    function all(){
        // SELECT * FROM posts
        return $this->db->table('posts')->get()->getResult(); //Define which table and get/query result and how result return

    }

    function where(){
        //Define which table and get/query result and how result return
        //getRow return 1 first array 
        return $this->db->table('posts')
                        ->where(['post_id >' => 99, 'post_id <' => 104 ])
                        ->orderBy('post_id' , 'DESC')
                        ->get()
                        ->getResult(); 
    }

    function join(){
        return $this->db->table('posts')
                        ->where(['post_id >' => 50 ])
                        ->where(['post_id <' => 60 ])
                        ->join('users', 'posts.post_author = users.user_id' , 'innner') //first para is the name of the table join(table name, condition , type of join)
                        ->get()
                        ->getResult(); 
    }

    function like(){
        return $this->db->table('posts')
                        ->like('post_title', 'nemo', 'both') //%string, string%, %string%  before,after,both
                        ->join('users', 'posts.post_author = users.user_id' , 'innner') //first para is the name of the table join(table name, condition , type of join)
                        ->get()
                        ->getResult(); 
    }

    function grouping(){

        //SELECT * FROM posts WHERE (post_id = 25 AND post_date < 1990-01-01 00:00:00) OR post_author = 10;
        return $this->db->table('posts')
                        ->groupStart()
                            ->where(['post_id <' => '10' , 'post_created_at >' => '1990-00-00 00:00:00'])
                        ->groupEnd()
                        ->orWhere('post_author', '10')
                        ->join('users', 'posts.post_author = users.user_id' , 'innner') //first para is the name of the table join(table name, condition , type of join)
                        ->get()
                        ->getResult(); 
    }

    function wherein(){

        //SELECT * FROM posts WHERE (post_id = 25 AND post_date < 1990-01-01 00:00:00) OR post_author = 10;

        $emails = ['bud22@example.org', 'baby.mcdermott@example.org', 'price.tessie@example.org'];
        return $this->db->table('posts')
                        // ->groupStart()
                        //     ->where(['post_id >' => '10' , 'post_created_at <' => '1990-00-00 00:00:00'])
                        // ->groupEnd()
                        ->whereIn('email' , $emails) //can use whereIn
                        ->join('users', 'posts.post_author = users.user_id')//first para is the name of the table join(table name, condition , type of join)
                        ->limit(5)
                        ->get()
                        ->getResult(); 
    }

    function getPosts(){
        //Join two tables
        $builder = $this->db->table('posts');
        $builder->join('users', 'posts.post_author = users.user_id');
        $posts = $builder->get()->getResult();

        return $posts;

    }

    function getUsers($limit = false){
        $builder = $this->db->table('users');
        if($limit)
            $builder->limit($limit);

        $users = $builder->get()->getResult();
        return $users;

    }

    function getAnotherUsers($limit = false){
        
        $builder = $this->db->table('users');
        if($limit)
            $builder->limit($limit);

        $users = $builder->get()->getResult();
        return $users;

    }

    
}