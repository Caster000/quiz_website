<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id_personne
 * @property int $id_role
 * @property string $nom
 * @property string $prenom
 * @property string $email
 * @property string $password
 */
class Users extends Model implements Authenticatable
{
    use Notifiable;
    use BasicAuthenticatable;

    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id_user';

    /**
     * @var array
     */
    protected $fillable = ['id_role', 'nom', 'prenom', 'email', 'password', 'date_creation'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Role', 'id_role', 'id_role');
    }

}
