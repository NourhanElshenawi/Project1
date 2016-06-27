<?php
namespace Nourhan\Controllers;

use Nourhan\Database\DB;
use Nourhan\Services\Upload;

class MainController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        $DB = new DB();
        $carouselImages = $DB->getCarousel();

        echo $this->twig->render('home.twig', array('carouselImages'=> $carouselImages));
    }

    public function admin()
    {
        $DB = new DB();
//        if(isset($_POST['fileToUpload'])){
//            $upload = new Upload();
//        }

        echo $this->twig->render('admin.twig');
    }

    public function upload()
    {
        $upload = new Upload();

//        echo $this->twig->render('admin.twig');
    }
}