<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CoursesCurriculum extends Component
{
    use LivewireAlert, AuthorizesRequests;

    public $course, $name, $editName;
    public Section $section;

    protected $rules = [
        'section.name' => 'required',
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->section = new Section();

        $this->authorize('dicatated', $course);
    }

    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor',['course' => $this->course]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Section::create([
            'course_id' => $this->course->id,
            'name' => $this->name,
        ]);

        $this->reset('name');
        $this->course = Course::find($this->course->id);
        $this->render_alerta('success', 'Sección añadida exitosamente');
    }

    public function edit(Section $section)
    {
        $this->section = $section;
    }

    public function update()
    {
        $this->validate();
        $this->section->save();
        $this->section = new Section();

        $this->course = Course::find($this->course->id);
        $this->render_alerta('success', 'Sección actualizada exitosamente');
    }

    public function destroy(Section $section)
    {
        $section->delete();
        $this->course = Course::find($this->course->id);
        $this->render_alerta('success', 'Sección eliminada exitosamente');
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
