<?php
namespace Nourhan\Controllers;

use Nourhan\Database\DB;
use Nourhan\Services\Upload;
use Nourhan\Services\ChangeCarousel;

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
        $carouselImages = $DB->getCarousel();
        $allCarouselImages = $DB->getAllCarousel();
        echo $this->twig->render('admin.twig', array('carouselImages'=> $carouselImages, 'allCarouselImages'=> $allCarouselImages));
    }

    public function upload()
    {
        if(isset($_POST['submit'])){
            $upload = new Upload();
        }  else {
            if($_POST['included'] == "Included"){
                $included = 1;
            } else $included = 0;
            $DB = new DB();
            $DB->updateCarousel($_POST['id'], $_POST['position'], $included) ;
        }

        $carouselImages = $DB->getCarousel();
        $allCarouselImages = $DB->getAllCarousel();
        echo $this->twig->render('admin.twig', array('carouselImages'=> $carouselImages, 'allCarouselImages'=> $allCarouselImages));
    }
}