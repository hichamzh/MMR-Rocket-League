<?php

class Controller_home extends Controller
{


    public function action_default()
    {
        $this->action_display_home();
    }

    public function action_display_home()
    {
        $m = Model::get_model();
        $data =
            [
                "mode_jeu" => $m->get_mode_jeu()
            ];
        $this->render("home", $data);
    }

    public function action_display_rank()
    {

        $m = Model::get_model();
        $id_mode = $_GET['id_mode'];
        $data =
            [
                "equipe" => $m->get_rank($id_mode)
            ];
        $this->render('rank', $data);
    }

    public function action_display_rank_choix()
    {
        $m = Model::get_model();
        $id_choix = $_GET['id_choix'];
        $choix = $_GET['choix'];
        $data =
            [
                "ranks" => $m->get_rank_choix($id_choix),
                "choix" => $choix
            ];
        $this->render("rank_choix", $data);
    }

}