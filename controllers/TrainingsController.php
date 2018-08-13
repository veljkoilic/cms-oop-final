<?php

namespace App\Controllers;

use App\Core\App;

class TrainingsController
{
    public function create()
    {
        return view('trainers.createTraining');
    }
    public function store()
    {
        App::get('database')->addNew("trainings", $_POST);
        //        $this->handleUpload();
        $id = $_POST['clubs_id'];
        return redirect("/admin/clubs/club?id= $id");
    }
        public function edit()
    {
        $training = App::get('database')->getOne("trainings", $_GET['id']);

        return view('trainers.createTraining', compact('training', 'difficulties', 'exercises'));
    }

    public function update()
    {
//        $this->handleUpload();
        App::get('database')->update('trainings', $_POST);
        $id = $_POST['clubs_id'];
        var_dump($_POST);
        return redirect("/admin/clubs");
    }

    public function destroy()
    {
        App::get('database')->destroy('trainings', $_POST['id']);
        return redirect('/admin/clubs');
    }
    public function singleTraining()
    {
        $training = App::get('database')->getOne("trainings", $_GET['id']);

        return view('singleTraining', compact('training'));
    }
}