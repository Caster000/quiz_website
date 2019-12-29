<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_resultat
 * @property int $id_quiz
 * @property int $id_user
 * @property int $nb_points
 * @property Quiz $quiz
 * @property User $user
 */
class Resultat extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'resultat';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'id_resultat';

    /**
     * @var array
     */
    protected $fillable = ['id_quiz', 'id_user', 'nb_points'];

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
    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id_user');
    }
}
