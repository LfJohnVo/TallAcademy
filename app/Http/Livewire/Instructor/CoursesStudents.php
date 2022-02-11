<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CoursesStudents extends Component
{
    use LivewireAlert;

    public $course, $search;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', "%{$this->search}%")->paginate(10);

        return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor');
    }

    public function render_alerta($type, $message)
    {
        $this->alert($type, $message, [
            'position' => 'top-end',
            'timer' => '4000',
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }
}
