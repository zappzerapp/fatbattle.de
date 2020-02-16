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
        'name',
        'weight',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getMissingWeightAttribute()
    {
        $targetGain = $this->weight > 0 ? $this->weight : abs($this->weight);
        $missingWeight = abs($this->numberCurrentGain - ($targetGain * 0.1));

        return $this->readableFormat($missingWeight);
    }

    public function getGoalAttribute()
    {
        return $this->readableFormat(abs($this->weight) - ($this->weight * 0.1));
//        return str_replace('.', ',', abs($this->weight) - ($this->weight * 0.1));
    }

    public function getGoalPercentAttribute()
    {
        $currentWeight = floatval(str_replace(",", ".", $this->currentWeight));

        if ($this->weight > 0) {
            $fail = $currentWeight >= $this->weight;
        } else {
            $fail = $currentWeight <= $this->weight;
        }

        $percent = number_format($this->numberCurrentGain / $this->numberTargetGain * 100, 1);
        return $fail ? $percent * -1 : $percent;
    }

    public function getGoalPercentLabelAttribute()
    {
        if ((int) $this->goalPercent) {
            return $this->readableFormat($this->goalPercent).'%';
        }

        return '';
    }

    public function getNumberCurrentGainAttribute()
    {
        $lastWeight = (float) optional($this->weights->last())->value ?: abs($this->weight);

        return abs($lastWeight - ($this->weight > 0 ? $this->weight : abs($this->weight)));
    }

    public function getNumberTargetGainAttribute()
    {
        return abs($this->weight * 0.1);
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

        return $this->asFloat(abs(round(($gains - 1) * 100, 2)));
    }

    public function getGainsInKgAttribute()
    {
        return $this->readableFormat(str_replace(',', '.', $this->currentWeight) - abs($this->weight));
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
        return collect([0 => $this->created_at])->merge($this->weights->sortBy('created_at')->pluck('created_at'))->map(function (
            $date
        ) {
            /** @var Carbon $date */
            return $date->format('d. M (H:i)');
        });
    }

    private function readableFormat($weight)
    {
        return number_format(floatval($weight), 1, ',', '.');
    }

    /**
     * @param  String  $weightLabel
     * @return float|mixed
     */
    private function asFloat($weightLabel)
    {
        return str_replace('.', ',', $weightLabel);
    }
}
