<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_quiz
 * @property int $id_user
 * @property boolean $Visibilite
 * @property User $user
 * @property Theme[] $themes
 * @property Question[] $questions
 * @property Resultat[] $resultats
 */
class Quiz extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quiz';
    public $timestamps = false;
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_quiz';

    /**
     * @var array
     */
    protected $fillable = ['id_user', 'Visibilite'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function themes()
    {
        return $this->belongsToMany('App\Theme', 'contient', 'id_quiz', 'id_theme');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Question', 'id_quiz', 'id_quiz');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function resultats()
    {
        return $this->hasMany('App\Resultat', 'id_quiz', 'id_quiz');
    }
}
