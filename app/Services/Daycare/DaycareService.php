<?php

namespace App\Services\Daycare;

use App\Models\Branch;
use App\Models\ClassRoomEvent;
use App\Models\DaycareSocial;
use App\Models\Message;
use App\Models\Post;
use App\Models\Review;
use App\Models\Setting;

class DaycareService
{
    public function getMessageByStatus(int $status)
    {
        $message = Message::whereDaycareMessageType($status)->first();
        return $message?->description;
    }
    public function changePostStatus($post,int $status): void
    {
        $setting = Setting::where('key', 'post_option')->first();
        if ($setting->value == 1 && $status == 2) {
            $post->update(['status' => 4]);
        } else {
            $post->update(['status' => $status]);
        }
    }

    public function getReviewByStatus($user, ?int $status,$start_date,$end_date)
    {
        return match ($status) {
            0 => $user->daycare_reviews()->where('status', 0)->latest()->get(),
            1 => $user->daycare_reviews()->where('status', 1)->latest()->get(),
            default => $user->daycare_reviews()->where('status', 2)->latest()->DateSearch($start_date,$end_date)->get(),
        };
    }


    public function assignClassRoomToEvent(array $classrooms, $event_id): void
    {
        foreach ($classrooms as $classroom) {
            ClassRoomEvent::create([
                'event_id' => $event_id,
                'class_room_id' => $classroom
            ]);
        }
    }

    public function storeSocials(array $socialData): void
    {
        foreach ($socialData as $social) {
            DaycareSocial::create([
                'daycare_id' => auth('api')->user()->id,
                'social_id' => $social['social_id'],
                'link' => $social['link'],
            ]);
        }
    }

    public function storeBranches(array $branchData): void
    {
        foreach ($branchData as $branch) {
            Branch::create([
                'daycare_id' => auth('api')->user()->id,
                'city_id' => $branch['city_id'],
                'title' => $branch['title'],
                'state_id' => $branch['state_id'],
                'lat' => $branch['lat'],
                'lang' => $branch['lang'],
                'address' => $branch['address'],
            ]);
        }
    }

    public function updateBranches(array $branchData): void
    {
        foreach ($branchData as $branch) {
            $branch = Branch::find($branch['id']);
            $branch->update([
                'daycare_id' => auth('api')->user()->id,
                'city_id' => $branch['city_id'],
                'title' => $branch['title'],
                'state_id' => $branch['state_id'],
                'lat' => $branch['lat'],
                'lang' => $branch['lang'],
                'address' => $branch['address'],
            ]);
        }
    }

}
