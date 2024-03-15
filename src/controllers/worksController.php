<?php

require 'vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class worksController
{
    protected $twig;
    protected $loader;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(__DIR__ . '/../views/templates');
        $this->twig = new Environment($this->loader);
    }

    public function works()
    {
        $cookie = $_COOKIE['Tags'] ?? "";
        $category = $_POST["option"] ?? "";
        $episodes = $_POST["episodes"] ?? "";
        $tomes = $_POST["tome"] ?? "";
        $searchTerm = $_POST['search'] ?? '';
        $WM = new worksManager();
        $FM = new filterManager();
        if (!empty($category) || !empty($cookie)) {
            $works = $WM->selectAllByFilters($category, $cookie, $episodes, $tomes);
        }
        if (!empty($searchTerm)) {
            $works = $WM->searchByName($searchTerm);
        } else {
            $works = $WM->selectAll();
        }
        $UM = new userManager();
        if (empty($_SESSION['idUser'])) {
            $user = "";
        } else {
            $user = $UM->SelectOnebyID(($_SESSION['idUser']));
        }
        $categories = $FM->selectAll("Category");
        $tags = $FM->selectAll("tag");
        echo $this->twig->render('works/works.html.twig', ["Works" => $works, "Categories" => $categories, "Tags" => $tags, "User" => $user]);
    }

    public function add()
    {

        $name = $_POST["name"] ?? "";
        $summary = $_POST["summary"] ?? "";
        $episodes = $_POST["episodes"] ?? 0;
        $status = $_POST["status"] ?? "";
        $season = $_POST["season"] ?? 0;
        $tome = $_POST["tome"] ?? 0;
        $category = $_POST["category"] ?? "";
        if (empty($episodes)) {
            $episodes = 0;
        }
        if (empty($season)) {
            $season = 0;
        }
        if (empty($tome)) {
            $tome = 0;
        }
        $MW = new worksManager();
        $FW = new filterManager();
        $bdd = new database();
        $MW->addOneM($name, $status, $summary, $episodes, $season, $tome);
        $Works = count($MW->selectAll());
        $FW->addCategory($Works, $category);
        $data = $bdd->connect();
        if (count($_POST) > 7) {
            // $data->prepare("DELETE FROM worksTag WHERE idWorks = $id")->execute();
            for ($c = 0; $c < count($_POST) - 7; $c++) {
                $tag = $_POST["tag" . $c + 1] ?? "";
                $data->prepare("INSERT INTO worksTag(idWorks,idTag) VALUES($Works,$tag)")->execute();
            }
        }
        header("Location: /oeuvres");
    }
}
