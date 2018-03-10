<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\Courses;

use App\Domain\Courses\CourseEvent;
use App\Http\Controllers\Controller;
use App\Repositories\CourseEventRepository as ItemRepository;
use App\View\Admin\Courses\EventEditForm as EditForm;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function add(ItemRepository $repository)
    {
        $user = \Auth::user();
        $courseEvent = $repository->getDraft($user);
        if (!$courseEvent) {
            $courseEvent = $repository->makeNew();
            $courseEvent->setUser($user);
            $repository->save($courseEvent);
        }
        return redirect()->route('admin.courses.events.edit', ['courseEvent' => $courseEvent]);
    }

    public function edit(CourseEvent $courseEvent)
    {
        $form = new EditForm();
        $form->fill($courseEvent);
        return $form->render();
    }

    public function store(CourseEvent $courseEvent, ItemRepository $repository, Request $request)
    {
        $form = new EditForm();
        $rules = $form->getRules();
        $v = \Validator::make($request->all(), $rules);
        if ($v->fails()) {
            return redirect()->back()->withErrors($v)->withInput();
        }
        $form->process($request);
        $data = $form->values();
        $filesFields = ['image'];
        $files = [];
        foreach ($filesFields as $fileFieldCode) {
            $files[$fileFieldCode] = $data[$fileFieldCode];
            unset($data[$fileFieldCode]);
        }
        $courseEvent->fill($data);
        foreach ($filesFields as $fileFieldCode) {
            if ($files[$fileFieldCode]) {
                $courseEvent->{$fileFieldCode} = $files[$fileFieldCode]->storeAs(
                    'i/courses/events/' . $courseEvent->id,
                    $files[$fileFieldCode]->getClientOriginalName(),
                    'public'
                );
            }
        }
        $courseEvent->setPublishStatus($data['published']);
        $courseEvent->setUser(\Auth::user());
        $repository->save($courseEvent);
        return redirect()->route('admin.courses.events.list');
    }

    public function delete(CourseEvent $courseEvent, ItemRepository $repository)
    {
        $courseEvent->user_id = \Auth::user()->id;
        $repository->remove($courseEvent);

        return redirect()->route('admin.courses.events.list');
    }
}
