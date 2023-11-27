<?php

// roles
use Carbon\Carbon;

function rolesCount(): array
{
    $roleCount = \App\Models\Role::whereRoleNot(['super_admin'])->count();
    return [
        'roles_count' => $roleCount
    ];
}

function citiesCount(): array
{
    $cities = \App\Models\City::count();

    return [
        'cities_count' => $cities,
    ];
}

function statesCount(): array
{
    $states = \App\Models\State::count();

    return [
        'states_count' => $states,
    ];
}

function stagesCount(): array
{
    $stages = \App\Models\Stage::count();

    return [
        'stages_count' => $stages,
    ];
}

function teachersCount(): array
{
    $teachersByYear = \App\Models\User::whereType(3)->whereYear(
        'created_at',
        '=',
        dateFormat(Carbon::now()->format('Y-m-d'))['year']
    )->count();
    $teachers = \App\Models\User::where('type', 3)->count();

    return [
        'teachers_year_count' => $teachersByYear,
        'teachers_count' => $teachers,
    ];
}

function usersCount(): array
{
    $usersByYear = \App\Models\User::whereType(1)->whereYear(
        'created_at',
        '=',
        dateFormat(Carbon::now()->format('Y-m-d'))['year']
    )->count();
    $users = \App\Models\User::whereType(1)->count();
    $Deleted = \App\Models\User::onlyTrashed()->count();
    return [
        'users_year_count' => $usersByYear,
        'users_count' => $users,
        'deleted_users' => $Deleted,
    ];
}

function daycaresCount(): array
{
    $daycaresByYear = \App\Models\User::whereType(2)->whereYear(
        'created_at',
        '=',
        dateFormat(Carbon::now()->format('Y-m-d'))['year']
    )->count();
    $daycares = \App\Models\User::whereType(2)->count();
    $pendingCount = \App\Models\User::Pending()->count();
    $approvedCount = \App\Models\User::Approved()->count();
    $rejectedCount = \App\Models\User::Rejected()->count();
    $centerCount = \App\Models\User::Center()->count();
    $homeCount = \App\Models\User::Home()->count();
    $rejectedCount = \App\Models\User::Rejected()->count();
    $DeletedCount = \App\Models\User::onlyTrashed()->count();

    return [
        'daycares_year_count' => $daycaresByYear,
        'daycares_count' => $daycares,
        'center_count' => $centerCount,
        'home_count' => $homeCount,
        'pending_daycare_count' => $pendingCount,
        'rejected_daycare_count' => $rejectedCount,
        'approved_daycare_count' => $approvedCount,
        'deleted_daycares' => $DeletedCount,
    ];
}

function adminsCount(): array
{
    $adminsByYear = \App\Models\Admin::withoutSuperAdmin()->whereYear(
        'created_at',
        '=',
        dateFormat(Carbon::now()->format('Y-m-d'))['year']
    )->count();
    $allAdmins = \App\Models\Admin::withoutSuperAdmin()->count();
    $activeAdminCount = \App\Models\Admin::withoutSuperAdmin()->active()->count();
    $inActiveAdminCount = \App\Models\Admin::withoutSuperAdmin()->inactive()->count();
    $deletedAdminsCount = \App\Models\Admin::onlyTrashed()->count();
    return [
        'admins_year_count' => $adminsByYear,
        'admins_count' => $allAdmins,
        'active_admin_count' => $activeAdminCount,
        'inactive_admin_count' => $inActiveAdminCount,
        'deleted_admins' => $deletedAdminsCount,
    ];
}

function allHomeCounts($date): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $teacher = \App\Models\User::TeacherAccount()->first();

    $daycareSubscriptionRequests = $daycare?->daycareSubscriptions()?->whereStatus(2)->GetSubscriptionByDate($date)->count();
    $daycareKids = $daycare?->daycareKids()?->count();
    $daycareTeachers = $daycare?->daycareTeachers()?->GetByDate($date)->count();
    $daycareFavoriteCount = $daycare?->daycareFavorites()?->GetByDate($date)->count();
    $daycareOrders = 22;
//    $teacherClassRooms = $teacher?->teacherClassRooms()?->GetByDate($date)->count();
//    $teacherKids = $teacher?->teacherClassRooms()?->kids()?->GetByDate($date)->count();
    $teacherHoliday = 22;
    $daycareRequests = 22;

    return [
        'daycare_Subscription_count' => $daycareSubscriptionRequests,
        'daycare_kids_count' => $daycareKids,
        'daycare_orders_count' => $daycareOrders,
        'daycare_teachers_count' => $daycareTeachers,
        'daycare_favorites_count' => $daycareFavoriteCount,
        'teacher_classrooms_count' => $teacherClassRooms ?? 0,
        'teacher_kids_count' => $teacherKids ?? 0,
        'teacher_holiday_count' => $teacherHoliday,
        'teacher_requests_count' => $daycareRequests,
    ];
}

function reviewCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->daycare_reviews()->count();
    $requested = $daycare->daycare_reviews()->where('status', 0)->latest()->count();
    $delayed = $daycare->daycare_reviews()->where('status', 1)->latest()->count();
    $published = $daycare->daycare_reviews()->where('status', 2)->latest()->count();
    $deleted = $daycare->daycare_reviews()->where('status', 3)->latest()->count();
    return [
        'all' => $all,
        'requested' => $requested,
        'delayed' => $delayed,
        'published' => $published,
        'deleted' => $deleted,
    ];
}

function postCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->daycare_posts()->count();
    $requested = $daycare->daycare_posts()->where('status', 0)->latest()->count();
    $delayed = $daycare->daycare_posts()->where('status', 1)->latest()->count();
    $published = $daycare->daycare_posts()->where('status', 2)->latest()->count();
    $deleted = $daycare->daycare_posts()->where('status', 3)->latest()->count();
    return [
        'all' => $all,
        'requested' => $requested,
        'delayed' => $delayed,
        'published' => $published,
        'deleted' => $deleted,
    ];
}

function complaintsCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->daycareComplains()->count();
    $reserved = $daycare->daycareComplains()->where('status', 0)->latest()->count();
    $solved = $daycare->daycareComplains()->where('status', 1)->latest()->count();

    return [
        'all' => $all,
        'reserved' => $reserved,
        'solved' => $solved,
    ];
}

function offersCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->offers()->count();
    $expired = $daycare->offers()->Expired()->latest()->count();
    return [
        'all' => $all,
        'expired' => $expired,
    ];
}


function eventsCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->daycareEvents()->count();
    $expired = $daycare->daycareEvents()?->Expired()->latest()->count();
    return [
        'all' => $all,
        'expired' => $expired,
    ];
}

function branchesCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->branches()?->count();
    return [
        'all' => $all,
    ];
}

function daycareTeachersCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->daycareTeachers()?->count();
    return [
        'all' => $all,
    ];
}

function daycareUsersCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->daycareUsers->count();
    return [
        'all' => $all,
    ];
}


function featuresCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->features()?->count();
    $skill = $daycare->features()->whereType(0)->count();
    $amenity = $daycare->features()->whereType(1)->count();
    $advantage = $daycare->features()->whereType(2)->count();
    return [
        'all' => $all,
        'skill' => $skill,
        'amenity' => $amenity,
        'advantage' => $advantage,
    ];
}

function subscriptionCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->daycareSubscriptions()->count();
    $refuse = $daycare->daycareSubscriptions()->whereStatus(0)->count();
    $accept = $daycare->daycareSubscriptions()->whereStatus(1)->count();
    $new = $daycare->daycareSubscriptions()->whereStatus(2)->count();
    return [
        'all' => $all,
        'refuse' => $refuse,
        'accept' => $accept,
        'new' => $new,
    ];
}

function classRoomsCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->classRooms()->count();
    return [
        'all' => (int)$all,
    ];
}

function activitiesCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->activities()?->count();
    return [
        'all' => $all,
    ];
}

function subjectsCount(): array
{
    $daycare = \App\Models\User::DaycareAccount()->first();
    $all = $daycare->subjects()?->count();
    return [
        'all' => $all,
    ];
}

function chaptersCount(): array
{
    $all = \App\Models\Chapter::forAuthDaycare()->count();
    return [
        'all' => $all,
    ];
}
function lessonsCount(): array
{
    $all = \App\Models\Lesson::forAuthDaycare()->count();
    return [
        'all' => $all,
    ];
}
