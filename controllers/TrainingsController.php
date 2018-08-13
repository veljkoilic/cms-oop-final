<?php

namespace App\Controllers;

use App\Core\App;

class TrainingsController
{
    public function create()
    {
        return view('trainers.createTraining');
    }

    /**
     * Stores a new training into the database
     */
    public function store()
    {
        App::get('database')->addNew("trainings", $_POST);
        $id = $_POST['clubs_id'];
        return redirect("/admin/clubs/club?id= $id");
    }

    /**
     * Gets an existing user to prefill the form with data
     */
        public function edit()
    {
        $training = App::get('database')->getOne("trainings", $_GET['id']);

        return view('trainers.createTraining', compact('training', 'difficulties', 'exercises'));
    }

    /**
     * Updates the data inside the database with submitted information
     */
    public function update()
    {
        App::get('database')->update('trainings', $_POST);
        return redirect("/admin/clubs");
    }

    /**
     * Deletes a training from the database depending on selected training
     */
    public function destroy()
    {
        App::get('database')->destroy('trainings', $_POST['id']);
        return redirect('/admin/clubs');
    }
}