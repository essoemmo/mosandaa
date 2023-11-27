<?php

namespace App\Rules;

use App\Models\TimeTableSubject;
use App\Models\User;
use Closure;
use Exception;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeTableRule implements ValidationRule
{
    protected int $daycare_id;
    protected string $day;

    public function __construct($daycare_id,$day)
    {
        $this->daycare_id = $daycare_id;
        $this->day = $day;
    }

    /**
     * @throws Exception
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $daycare = User::find($this->daycare_id);

        // Convert "from" and "to" times to timestamps
        $timeFrom = convert_time($value['time_from']);
        $timeTo = convert_time($value['time_to']);
        $timeFromDuration = new \DateTime($timeFrom);
        $timeToDuration = new \DateTime($timeTo);

        $duration = $timeToDuration->getTimestamp() - $timeFromDuration->getTimestamp();
        $overlappingSubjects = TimeTableSubject::where(function ($query) use ($timeFrom, $timeTo) {
            $query->whereBetween('time_from', [$timeFrom, $timeTo])->orWhereBetween('time_to', [$timeFrom, $timeTo]);
        })->whereRelation('timetable', 'day', $this->day)->exists();
        // If there are overlapping subjects,
        if ($overlappingSubjects) {
            $fail(__('admin.overlapsubject'));
        }

        // Check if the duration is at least 15 minutes (900 seconds)
        if ($duration <= 870) {
            $fail(__('admin.subjecttime'));
        }

        // Check if both "from" and "to" times are between open and close time
        if (!($timeFrom >= $daycare->from_time && $timeFrom <= $daycare->to_time && $timeTo >= $daycare->from_time && $timeTo <= $daycare->to_time)) {
            $fail(__('admin.checkTime'));
        }
    }

}
