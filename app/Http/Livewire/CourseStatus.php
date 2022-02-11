<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;
    //declaramos la propiedad course y current
    public $course, $current;

    //metodo mount se carga una unica vez y esto sucede cuando se carga la página
    public function mount(Course $course){
        $this->course = $course;
        //determinamos cual es la lección actual
        foreach($course->lessons as $lesson){
            if(!$lesson->completed){
                $this->current = $lesson;
                //break para que salga del bucle
                break;
            }
        }

        // En caso de que ya hayan sido culminadas todas las lecciones en la propiedas current se le va asignar la ultima lección
        if(!$this->current){
            $this->current =$course->lessons->last();
        }

        $this->authorize('enrolled',$course);

    }
    public function render()
    {
        return view('livewire.course-status');
    }

    //METODOS
    //cambiamos la lección actual
    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;
    }


    public function completed(){
        if($this->current->completed){
            //Eliminar registro
            // Metodo auth me recupera el dato del usuario autentificado
            $this->current->users()->detach(auth()->user()->id);
        }else{
            //Agregar registro
            $this->current->users()->attach(auth()->user()->id);

        }
        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    //PROPIEDADES COMPUTADAS
    //definimos la propiedad index, lo que va hacer es calcular el indice
    public function getIndexProperty(){
        // Recupere todas las lecciones de un curso
        // El metodo pluck me recupera una coleccion a traves de una coleccion ya existente
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }


    //calculamos la propiedad previous
    public function getPreviousProperty(){
        if($this->index == 0){
           return null;
        }else{
            return $this->course->lessons[$this->index - 1];
        }
    }


    //propiedad next
    public function getNextProperty(){
        if($this->index == $this->course->lessons->count() - 1){
            return null;
        }else{
           return $this->course->lessons[$this->index + 1];
        }
    }

    public function getAdvanceProperty(){
       $i = 0;

       foreach ($this->course->lessons as $lesson) {
           if($lesson->completed){
               $i++;
           }
       }

       //calcular el porcentaje de la
       $advance=($i * 100)/($this->course->lessons->count());

       return round($advance, 2);

    }
}
