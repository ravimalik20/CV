<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use App\Models\UserContact;
use App\Models\Skill;
use App\Models\Language;
use App\Models\Hobby;
use App\Models\Education;
use App\Models\Experience;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function contacts()
    {   $contacts = UserContact::select("user_contacts.*",
            "contact_type.name as contact_type_name", "value_type.type as value_type_name")
            ->join("contact_type", "user_contacts.contact_type_id", "=", "contact_type.id")
            ->join("value_type", "user_contacts.value_type_id", "=", "value_type.id")
            ->where("user_id", $this->id)
            ->get();

        return $contacts;
    }

    public function skills()
    {   return $this->hasMany(Skill::class, "user_id", "id");
    }

    public function languages()
    {   return $this->belongsToMany(Language::class, "user_language", "user_id", "language_id")
            ->withPivot("proficiency");
    }

    public function hobbies()
    {   return $this->hasMany(Hobby::class, "user_id", "id");
    }

    public function educations()
    {   return $this->hasMany(Education::class, "user_id", "id");
    }

    public function experiences()
    {   $experiences = Experience::select("experience.*", "company.name as company_name")
            ->join("company", "experience.company_id", "=", "company.id")
            ->where("user_id", $this->id)
            ->get();

        return $experiences;
    }
    
}
