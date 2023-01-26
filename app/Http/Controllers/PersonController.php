<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    
    private $nrp = "200914007";
    private $name = "Dindin Rizky";
    private $course;
    private $task;
    private $quiz;
    private $mid_term;
    private $final;
    private $grade;

    public function index(){
        return view('person.index');
    }

    public function sendData(){
        $nrp = $this->nrp;
        $nama = $this->nama;
        

        return view("person.send-data", compact("nrp", "name"));
    
    }

    public function myCourse($course, $task, $quiz, $mid_term, $final){
        $this->course = $course;
        $this->task = $task;
        $this->quiz = $quiz;
        $this->mid_term = $mid_term;
        $this->final = $final;
        $grade = $this->calculateGrade();

        return view('person.my-course', compact('course', 'task', 'quiz', 'mid_term', 'final', 'grade'));
    }

    private function calculateGrade(){
        $grade = (($this->task * 0.1) + ($this->quiz * 0.1));
        return $grade;
    }

    public function create(){
        return view ('person.create');
    }

    // Untuk menerima inputan dari Form
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:30',
            'email' => 'required|email',
        ]);
        $person = $request;
        return view ('person.print', compact('person'));
    }
    


}
