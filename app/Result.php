<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Result
 *
 * @package App
 * @property string $user
 * @property string $test
 * @property integer $earned_scores
 * @property integer $correct_answers
 * @property integer $incorrect_answers
*/
class Result extends Model
{
    protected $fillable = ['earned_scores', 'correct_answers', 'incorrect_answers', 'user_id', 'test_id'];
    

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTestIdAttribute($input)
    {
        $this->attributes['test_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setEarnedScoresAttribute($input)
    {
        $this->attributes['earned_scores'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setCorrectAnswersAttribute($input)
    {
        $this->attributes['correct_answers'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setIncorrectAnswersAttribute($input)
    {
        $this->attributes['incorrect_answers'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function test()
    {
        return $this->belongsTo(Test::class, 'test_id');
    }
    
}
