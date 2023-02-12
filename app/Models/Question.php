<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
/**
 * The table associated with the model.
 *
 * @var string
 */
    protected $table = 'questions';

    protected $fillable = [
        'exam_id',
        'question_text',
        'question_type',
        'question_mark',
        

    ];
}
