<?php

namespace App\Http\Livewire\Instructor;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class PublicarCourse extends Component
{
    use LivewireAlert;

    public $course, $status_id;

    public function mount($course)
    {
        $this->course = $course;
    }

    public function updatedStatusId($statusId)
    {
        $this->course->status = $statusId;
        $this->course->save();
        $this->render_alerta('success', 'Estatus actualizado exitosamente');
    }

    public function render()
    {
        return view('livewire.instructor.publicar-course');
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
