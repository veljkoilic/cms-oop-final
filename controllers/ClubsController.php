<?php

namespace App\Controllers;

use App\Core\App;

class ClubsController
{
    public function homepage()
    {
        return view('home');
    }
    public function allClubs()
    {
        $clubs = App::get('database')->getAll("clubs");

        return view('index', compact('clubs'));
    }
    public function allTrainersClubs()
    {
        $clubs = App::get('database')->getAllByTrainer("clubs", $_SESSION['auth']->id);

        return view('trainers.index', compact('clubs'));
    }

    public function singleClub()
    {
        $club = App::get('database')->getOne("clubs", $_GET['id']);
        $trainings = App::get('database')->getAllTrainings("trainings", $_GET['id']);
        return view('singleClub', compact('club', 'trainings'));
    }
    public function singleTrainersClub()
    {
        $club = App::get('database')->getOneClub("clubs", $_SESSION['auth']->id, $_GET['id']);
        $trainings = App::get('database')->getAllClubsTrainings("trainings", $_GET['id']);
        return view('trainers.singleClub', compact('club', 'trainings'));
    }
    public function create()
    {
        return view('trainers.createClub');
    }
    public function store()
    {
        App::get('database')->addNew("clubs", $_POST);
        return redirect('/admin/clubs');
    }
    public function update()
    {
        App::get('database')->update('clubs', $_POST);
        return redirect('/admin/clubs');
    }
    public function edit()
    {
        $club = App::get('database')->getOne("clubs", $_GET['id']);
        return view('trainers.createClub', compact('club'));
    }
    public function destroy()
    {
        App::get('database')->destroy('clubs', $_POST['id']);
        App::get('database')->destroyTrainings('trainings', $_POST['id']);
        return redirect('/admin/clubs');
    }
}