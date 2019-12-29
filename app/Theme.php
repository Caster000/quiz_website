<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id_theme
 * @property int $id_user
 * @property string $theme
 * @property User $user
 * @property Quiz[] $quizzes
 * @property Question[] $questions
 */
class Theme extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $timestamps = false;
    protected $table = 'theme';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_theme';

    /**
     * @var array
     */
    protected $fillable = ['id_user', 'theme'];

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
    public function quizzes()
    {
        return $this->belongsToMany('App\Quiz', 'contient', 'id_theme', 'id_quiz');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function questions()
    {
        return $this->hasMany('App\Question', 'id_theme', 'id_theme');
    }
}
