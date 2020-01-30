<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VotingReview extends Model
{
    protected $table = 'tb_vote_review';
    protected $fillable = ['id','user_id','review_id','vote_point','updated_by'];
}
