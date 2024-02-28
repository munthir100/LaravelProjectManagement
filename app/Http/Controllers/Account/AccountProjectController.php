<?php

namespace App\Http\Controllers\Account;

use App\Models\Status;
use App\Http\Controllers\Controller;
use App\Http\Resources\StatusResource;
use App\Http\Requests\Account\CreateProjectRequest;
use App\Http\Requests\Account\UpdateProjectRequest;
use App\Http\Resources\Account\AccountTaskResource;
use App\Http\Resources\Account\AccountProjectResource;
use App\Http\Requests\Account\CreateProjectCartRequest;



class AccountProjectController extends Controller
{
    function account()
    {
        return request()->user('account');
    }

    public function index()
    {
        $projects = AccountProjectResource::collection(
            $this->account()->projects()->useFilters()->dynamicPaginate()
        );

        return view('account.project.index', compact('projects'));
    }

    public function create()
    {
        return view('account.project.create');
    }

    public function store(CreateProjectRequest $request)
    {
        $project = $this->account()->projects()->create($request->validated());

        return redirect()->route('account.projects.index')
            ->with('success', __('created successfully'));
    }

    public function createProjectCart(CreateProjectCartRequest $request)
    {
        $project = $this->account()->projects()->create($request->validated());

        return redirect()->back()->with('success', __('created successfully'));
    }

    public function show($projectId)
    {
        $project = $this->account()->projects()->findOrFail($projectId);

        return view('account.project.show', compact('project'));
    }

    public function edit($projectId)
    {
        $projects = AccountProjectResource::collection(
            $this->account()->projects()->useFilters()->dynamicPaginate()
        );
        $project = $this->account()->projects()->findOrFail($projectId);
        $statuses = StatusResource::collection(Status::where('id', '!=', Status::COMPLETED)->get());

        return view('account.project.edit', compact('project', 'statuses', 'projects'));
    }

    public function update(UpdateProjectRequest $request, $projectId)
    {
        $project = $this->account()->projects()->findOrFail($projectId);
        $project->update($request->validated());

        return redirect()->route('account.projects.show', ['project' => $project->id])
            ->with('success', __('updated successfully'));
    }

    public function destroy($projectId)
    {
        $project = $this->account()->projects()->findOrFail($projectId);
        $project->delete();

        return redirect()->route('account.projects.index')
            ->with('success', __('deleted successfully'));
    }

    public function showTasks($projectId)
    {
        $project = $this->account()->projects()->findOrFail($projectId);
        $tasks = AccountTaskResource::collection(
            $project->tasks()
                ->whereHas('project.account', function ($query) {
                    $query->where('id', $this->account()->id);
                })
                ->useFilters()
                ->dynamicPaginate()
        );

        return view('account.task.index', compact('tasks'));
    }
}
