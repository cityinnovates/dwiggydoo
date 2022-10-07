<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class RewardQuestion extends Model
{
   	protected $table = 'reward_questions';
    public $timestamps = false;

    public function rewardtype(){
    	return $this->belongsTo(RewardQuestionType::class, 'type', 'id');
    }
}
