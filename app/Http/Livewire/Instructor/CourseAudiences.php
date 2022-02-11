<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Audience;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseAudiences extends Component
{
    use LivewireAlert, AuthorizesRequests;

    public Audience $audience;
    public $course, $name;

    protected $rules = [
        'audience.name' => 'required',
    ];

    public function mount($course)
    {
        $this->course = $course;
        $this->audience = new Audience();
        $this->authorize('dicatated', $course);
    }

    public function render()
    {
        return view('livewire.instructor.course-audiences');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $this->course->audiences()->create([
            'name' => $this->name,
        ]);

        $this->reset('name');
        $this->course = Course::find($this->course->id);
        $this->render_alerta('success', 'Audiencia añadida exitosamente');
    }

    public function edit(Audience $audience)
    {
        $this->audience = $audience;
    }

    public function update()
    {
        $this->validate();

        $this->audience->save();

        $this->audience = new Audience();

        $this->course = Course::find($this->course->id);
        $this->render_alerta('success', 'Audiencia actualizada exitosamente');
    }

    public function destroy(Audience $audience)
    {
        $audience->delete();
        $this->course = Course::find($this->course->id);
        $this->render_alerta('success', 'Audiencia eliminada exitosamente');
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
