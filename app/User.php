<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function getGainsInKgAttribute()
    {
        return number_format(str_replace(',', '.', $this->currentWeight) - $this->weight, 1, ',', '');
    }

    public function weights()
    {
        return $this->hasMany(Weight::class);
    }

    public function getLatestWeightValuesAttribute()
    {
        return collect(abs($this->weight))->merge($this->weights->sortBy('created_at')->pluck('value'));
    }

    public function getLatestWeightDatesAttribute()
    {
        return collect([0 => $this->created_at])->merge($this->weights->sortBy('created_at')->pluck('created_at'))->map(function ($date) {
            /** @var Carbon $date */
            return $date->format('d. M (H:i)');
        });
    }
}
