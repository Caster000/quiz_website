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
{ use Notifiable;
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
    protected $fillable = ['id_role', 'nom', 'prenom', 'email', 'password','date_creation'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Role', 'id_role', 'id_role');
    }

//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function activites()
//    {
//        return $this->hasMany('App\Activite', 'id_personne', 'id_personne');
//    }
//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function commandes()
//    {
//        return $this->hasMany('App\Commande', 'id_personne', 'id_personne');
//    }
//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function commenters()
//    {
//        return $this->hasMany('App\Commentaire', 'id_personne', 'id_personne');
//    }
//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
//     */
//    public function activites_inscrire()
//    {
//        return $this->belongsToMany('App\Activite', 'inscrire', 'id_personne', 'id_activite');
//    }
//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
//     */
//    public function photos_liker()
//    {
//        return $this->belongsToMany('App\Photo', 'liker', 'id_personne', 'id_photo');
//    }
//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\HasMany
//     */
//    public function photos()
//    {
//        return $this->hasMany('App\Photo', 'id_personne', 'id_personne');
//    }
//
//    /**
//     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
//     */
//    public function activites_voter()
//    {
//        return $this->belongsToMany('App\Activite', 'voter', 'id_personne', 'id_activite');
//    }
//    public function routeNotificationForSlack($notification)
//    {
//        return 'https://hooks.slack.com/services/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';
//    }
}
