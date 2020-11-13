<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use App\Questionary;
use App\Http\Requests\ValidateQuestion;
use Illuminate\Support\Facades\Gate;
use Session;

class QuestionController extends Controller {
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
  */
  public function index() {
  }

  public function questions($id) {
    Gate::authorize('haveAccess', 'question.questions');

    //obtengo la informacion el cuestionario actual
    $questionary = Questionary::where('id', $id)->first();
    //obtengo las preguntas relacionadas con el cuetionario actual
    $questions = $questionary->questions()->paginate(5);
    //retorno la vista con los datos
    return view('question.allQuestions', compact('id', 'questionary', 'questions'));
  }

  public function addQuestion($id) {
    Gate::authorize('haveAccess', 'question.addQuestion');
    return view('question.addQuestion', compact('id'));
  }

  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
  */
  public function create($id) {
  }

  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
  */
  public function store(Request $request) {
    //verifico permisos
    dd($request);
    Gate::authorize('haveAccess', 'question.addQuestion');
    //guardo toda la informacion de la question
    $question = Question::create($request->all());
    //agrego la notificacion
    $this->notification('Pregunta', 'Agregada correctamente', 'info');
    //obtengo el id del questionary actual para redireccionarle a la vista de este
    $id = $request['questionary_id'];
    return redirect()->route('question.questions', compact('id'));
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

  public function notification($title, $message, $type){
    $notification = array(
      'title' => $title,
      'message' => $message,
      'alert-type' => $type
    );

    //creamos un mensaje flash para la peticion actual
    Session::flash('notification', $notification);
  }
}
