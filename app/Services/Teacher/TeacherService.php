<?php

namespace App\Services\Teacher;

use App\Models\Branch;
use App\Models\DaycareSocial;
use App\Models\Post;
use App\Models\Report;
use App\Models\ReportSubject;
use Carbon\Carbon;

class TeacherService
{
    public function getPostsByTypeUser($user,?int $status)
    {
        return match ($user->type->value) {
            1 => Post::whereStatus(2)->whereActive(1)->latest()->get(),
            2 => Post::whereStatus($status)->whereDaycareId($user->id)->latest()->get(),
            default => Post::whereStatus($status)->whereTeacherId($user->id)->latest()->get(),
        };
    }
    public function storeKidReport(array $kids, $subjects): void
    {
        $date = now()->format('Y-m-d');
        foreach ($kids as $kid) {
            $report = Report::create(['teacher_id' => auth('api')->id(),'kid_id' => $kid, 'date' => $date]);
            foreach ($subjects as $subject){
                ReportSubject::create([
                    'report_id' => $report->id,
                    'subject_id' => $subject->id,
                    'time_from' => $subject->pivot->time_from,
                    'time_to' => $subject->pivot->time_to
                ]);
            }
        }
    }


}
