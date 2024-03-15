<?php 
class filterManager{
    private $db;
    function __construct()
    {
        $db = new database();
        $this->db = $db->connect();
    }

    function selectAll($filter){
    $result = $this->db->prepare("SELECT * from $filter");
    $result->execute();
    if($result->rowCount() > 0){
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            try {
                $filter = new filterModel();
            $filter->setID($row['idCategory'] ?? $row['idTag']);
            $filter->setName($row['nameCategory'] ?? $row['nameTag']);
            $filter->setImage(base64_encode($row['pictures']));
            $filters[] = $filter;
            } catch(Exception $e) {

            }
            
        };
        return $filters;
    }
    return null;
    }

    function updateCategory($idWorks, $idCategory){
        $result = $this->db->prepare("UPDATE worksCategory SET idCategory = $idCategory WHERE idWorks = $idWorks");
        $result->execute();
    }
    function addCategory($idWorks, $idCategory){
        $result = $this->db->prepare("INSERT INTO worksCategory(idWorks,idCategory) VALUES($idWorks,$idCategory)");
        $result->execute();
    }
}
?>