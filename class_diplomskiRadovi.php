<?php

include("interface_iRadovi.php");
class diplomskiRadovi implements iRadovi{
    private $naziv_rada;
    private $tekst_rada;
    private $link_rada;
    private $oib_tvrtke;

    function __construct($oib, $text, $link, $title) {
        $this->oib_tvrtke = $oib;
        $this->tekst_rada = $text;
        $this->link_rada = $link;
        $this->naziv_rada = $title;
    }
        
    function create($data) {
        self::__construct($data);
    }
    
    function read() {
        $pdo = new PDO('mysql:dbname=lv1_database;host=localhost','root', '');
        $sql = "SELECT * FROM article";
        $statement = $pdo->query($sql);
        $articles = $statement->fetchAll(PDO::FETCH_ASSOC);
        if (count($articles) > 0) {
            echo "<ul>";
            foreach ($articles as $article) {
                echo "<li>";
                echo $article['id'] . '<br>';
                echo $article['title'] . '<br>';
                echo $article['oib'] . '<br>';
                echo $article['texts'] . '<br>';
                echo $article['link'] . '<br><br>';
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "No data found.";
        }
    } 

    function update($data_array) {
        $this->naziv_rada = $data_array['title'];
        $this->link_rada = $data_array['link'];
        $this->oib_tvrtke = $data_array['oib'];
        $this->tekst_rada = $data_array['text'];
    }

    public function delete() {
        $this->naziv_rada = NULL;
        $this->tekst_rada = NULL;
        $this->link_rada = NULL;
        $this->oib_tvrtke = NULL;
    } 

    public function save($data_size) {
        try {
            $allData = getAll();
            $pdo = new PDO('mysql:dbname=lv1_database;host=localhost','root', '');
            for($i=0; $i<$data_size; $i++){
                $id = uniqid();
                $sql = "INSERT INTO article (id, title, oib, texts, link) VALUES ('{$id}' , '{$allData[$i]['title']}', '{$allData[$i]['oib']}','{$allData[$i]['text']}','{$allData[$i]['link']}')";
                $pdo->exec($sql);
            }
            unset($pdo);
        } catch (PDOException $e) {
            echo '<p>Dogodila se iznimka: ' . $e->getMessage() . '</p>';
        }
    }
}


?>