<?php

namespace App\Imports;

use App\Models\Question;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithGroupedHeadingRow;

class QuestionsImport implements ToCollection, WithGroupedHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $isEx = DB::table('exams')->where('exam_name', $row['code'])->exists();
            if ($isEx) {
                $exam = DB::table('exams')->where('exam_name', $row['code'])->first();
                $ques = new Question();
                $ques->exam_id = $exam->id;
                $ques->question_text = $row['q'];
                $ques->question_type = 'test';
                $ques->question_mark = 0;
                if ($ques->save()) {
                    if ($row['is_c']) {
                        DB::table('quistion_options')->insert([
                            'question_id' => $ques->id,
                            'options' => json_encode($row['is_c']) ?? "{}",
                            'right_answer' => 1,
                        ]);
                    }
                    $data = array();
                    foreach ($row['op'] as $item) {
                        if (!empty($item)) {
                            array_push($data,$item);
                        }
                    }
                    if (!empty($data)) {
                        DB::table('quistion_options')->insert([
                            'question_id' => $ques->id,
                            'options' => json_encode($data) ?? "{}",
                            'right_answer' => 0,
                        ]);
                    }

                }

            } else {

            }

        }
    }
}
