<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_question
 * @property int $id_quiz
 * @property int $id_theme
 * @property string $question
 * @property string $reponse
 * @property string $carre1
 * @property string $carre2
 * @property string $carre3
 * @property string $carre4
 * @property string $duo1
 * @property string $duo2
 * @property Quiz $quiz
 * @property Theme $theme
 */
class Question extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question';
    public $timestamps = false;
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_question';

    /**
     * @var array
     */
    protected $fillable = ['id_quiz', 'id_theme', 'question', 'reponse', 'carre1', 'carre2', 'carre3', 'carre4', 'duo1', 'duo2','level'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quiz()
    {
        return $this->belongsTo('App\Quiz', 'id_quiz', 'id_quiz');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function theme()
    {
        return $this->belongsTo('App\Theme', 'id_theme', 'id_theme');
    }
}
