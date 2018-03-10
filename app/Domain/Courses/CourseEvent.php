<?php
declare(strict_types=1);

namespace App\Domain\Courses;

use App\Common\Model;

/**
 * Class CourseEvent
 *
 * @package App\Domain\Courses
 *
 * @property string         $id
 * @property string         $status
 * @property string         $title
 * @property \DateTime      $date_start
 * @property \DateTime      $date_end
 * @property bool           $dates_confirmed
 * @property string         $location
 * @property string         $teacher
 * @property string         $image
 * @property bool           $is_opened
 * @property string         $course_link
 * @property \DateTime      $created_at
 * @property \DateTime      $updated_at
 */
class CourseEvent extends Model
{
    protected $table = 'courses_events';

    protected $fillable = [
        'status',
        'title',
        'date_start',
        'date_end',
        'dates_confirmed',
        'location',
        'teacher',
        'image',
        'is_opened',
        'course_link',
    ];

    protected $casts = [
        'date_start' => 'date',
        'date_end' => 'date',
        'dates_confirmed' => 'bool',
        'is_opened' => 'bool',
    ];

    protected $dates = [
        'date_start',
        'date_end',
    ];

    public function isOpened(): bool
    {
        return (bool) $this->is_opened;
    }

    public function datesConfirmed(): bool
    {
        return (bool) $this->dates_confirmed;
    }

    public function imagePath()
    {
        $path = $this->image;
        return $path ? \Storage::disk('public')->url($path) : '';
    }
}
