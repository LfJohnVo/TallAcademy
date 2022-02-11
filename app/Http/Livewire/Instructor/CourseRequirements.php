<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use App\Models\Requirement;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class CourseRequirements extends Component
{
    use LivewireAlert, AuthorizesRequests;

    public Requirement $requirement;
    public $course, $name;

    protected $rules = [
        'requirement.name' => 'required',
    ];

    public function mount($course)
    {
        $this->course = $course;
        $this->requirement = new Requirement();
        $this->authorize('dicatated', $course);
    }

    public function render()
    {
        return view('livewire.instructor.course-requirements');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $this->course->requirements()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');
        $this->course = Course::find($this->course->id);
        $this->render_alerta('success', 'Requisito añadida exitosamente');
    }

    public function edit(Requirement $requirement)
    {
        $this->requirement = $requirement;
    }

    public function update()
    {
        $this->validate();

        $this->requirement->save();

        $this->requirement = new Requirement();

        $this->course = Course::find($this->course->id);
        $this->render_alerta('success', 'Requisito actualizada exitosamente');
    }

    public function destroy(Requirement $requirement)
    {
        $requirement->delete();
        $this->course = Course::find($this->course->id);
        $this->render_alerta('success', 'Requisito eliminada exitosamente');
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
