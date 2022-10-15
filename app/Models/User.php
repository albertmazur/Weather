<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'lastName',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cities(){
        return $this->belongsToMany(City::class);
    }

    public function addCity(City $city): bool{
        if(count($this->cities()->get())<10){
            $this->cities()->save($city);
            return true;
        }
        return false;
    }

    public function removeCity(City $city): void{
        if($city->users()->get()->count()==1) $city->weathers()->delete();
        $this->cities()->detach($city->id);
    }

    public function filterBy(?string $name, int $limit = 20){
        $query = $this->cities()->orderBy("name");
        if($name) $query->whereRaw("name like ?", ["$name%"]);
        return $query->paginate($limit);
    }

    public function hasCity(int $cityId): bool{
        $city = $this->cities()->where("city_user.city_id", $cityId)->first();
        return (bool) $city;
    }
}
