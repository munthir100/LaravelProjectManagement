<?php

namespace App\Http\Controllers\Account;

use App\Models\Task;
use App\Traits\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\CreateTasktRequest;
use App\Http\Requests\Account\UpdateTasktRequest;
use App\Http\Resources\Account\AccountTaskResource;

class AccountTaskController extends Controller
{
    use ApiResponse;
    protected function account()
    {
        return request()->user('account');
    }

    public function index()
    {
        $tasks = AccountTaskResource::collection(
            $tasks = Task::whereRelation('project.account', 'id', '=', $this->account()->id)
                ->useFilters()
                ->dynamicPaginate()
        );
        return view('account.task.index', compact('tasks'));
    }

    public function store(CreateTasktRequest $request)
    {
        $task = Task::create($request->validated());
        return redirect()->route('account.tasks.show', ['task' => $task])
            ->with('success', __('created successfully'));
    }

    public function show($taskId)
    {
        $task = $this->account()->tasks()->findOrFail($taskId);
        return view('account.task.show', compact('task'));
    }

    public function edit($taskId)
    {
        $task = $this->account()->tasks()->findOrFail($taskId);
        return view('account.task.edit', compact('task'));
    }

    public function update(UpdateTasktRequest $request, $taskId)
    {
        $task = $this->account()->tasks()->findOrFail($taskId);
        $task->update($request->validated());

        return redirect()->route('account.tasks.show', ['task' => $task->id])
            ->with('success', __('updated successfully'));
    }

    public function destroy($taskId)
    {
        $task = $this->account()->tasks()->findOrFail($taskId);
        $task->delete();

        return redirect()->route('account.tasks.index')
            ->with('success', __('deleted successfully'));
    }
}
