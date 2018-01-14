<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'weight', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getGoalAttribute()
    {
        return str_replace('.', ',', abs($this->weight) - ($this->weight * 0.1));
    }

    public function getCurrentWeightAttribute()
    {
        if ($this->weights->count()) {
            return str_replace('.', ',', $this->weights->last()->value);
        } else {
            return str_replace('.', ',', abs($this->weight));
        }
    }

    public function getGainsInPercentAttribute()
    {
        $gains = (floatval(str_replace(',', '.', $this->currentWeight)) / abs($this->weight));

        return str_replace('.', ',', abs(round(($gains - 1) * 100, 2)));
    }

    public function weights()
    {
        return $this->hasMany(Weight::class);
    }
}
