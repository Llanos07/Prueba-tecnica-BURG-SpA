<?php 
 class Orm {
    protected $id;
    protected $table;
    protected $db;

    public function __construct($id, $table, PDO $db) {
        $this->id = $id;
        $this->table = $table;
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function insert($data) {
        
    }
    public function getById($id) {
        
    }
    public function updateById($id , $data) {
        
    }
    public function deleteByAll($id) {
        
    }

    public function paginate($page, $limit){
        $offset = ($page - 1) * $limit;
        
        $rows = $this->db->query("SELECT COUNT(*) FROM {$this->table}")->fetchColumn();

        $sql = "SELECT * FROM {$this->table} LIMIT {$offset},{$limit}";
        $stm = $this->db->prepare($sql);
        $stm->execute();

        $pages = ceil($rows / $limit);
        $data = $stm->fetchAll();

        return [
            'data' => $data,
            'page' => $page,
            'limit' => $limit,
            'pages' => $pages,
            'rows' => $rows,
        ];
    }
 }