<?php

namespace App\Http\Controllers\Account;

use Carbon\Carbon;
use App\Models\Status;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        // Get the current month
        $currentMonth = Carbon::now()->format('m');

        // Calculate the total number of new projects for the current month
        $totalNewProjectsCurrentMonth = request()->user('account')->projects()->whereMonth('created_at', $currentMonth)->count();

        // Calculate the total budget for the current month (replace 'amount' with your actual budget column name)
        $totalBudgetCurrentMonth = request()->user('account')->projects()->whereMonth('created_at', $currentMonth)->sum('budget');

        // Calculate the total number of completed projects for the current month
        $totalCompletedProjectsCurrentMonth = request()->user('account')->projects()->whereStatusId(Status::COMPLETED)->count();

        // Calculate the total number of field projects for the current month
        $totalFieldProjectsCurrentMonth = request()->user('account')->projects()->whereStatusId(Status::FAILD)->whereMonth('created_at', $currentMonth)->count();

        // Calculate new projects vs. previous month percentage
        $newProjectsVsPreviousMonthPercentage = $this->calculateNewProjectsVsPreviousMonthPercentage($totalNewProjectsCurrentMonth);

        // Calculate total budget vs. previous month percentage
        $totalBudgetVsPreviousMonthPercentage = $this->calculateTotalBudgetVsPreviousMonthPercentage($totalBudgetCurrentMonth);

        // Calculate completed projects vs. previous month percentage
        $completedProjectsVsPreviousMonthPercentage = $this->calculateCompletedProjectsVsPreviousMonthPercentage($totalCompletedProjectsCurrentMonth);

        // Calculate field projects vs. previous month percentage
        $fieldProjectsVsPreviousMonthPercentage = $this->calculateFieldProjectsVsPreviousMonthPercentage($totalFieldProjectsCurrentMonth);

        return view('account.home', compact(
            'totalNewProjectsCurrentMonth',
            'totalBudgetCurrentMonth',
            'totalCompletedProjectsCurrentMonth',
            'totalFieldProjectsCurrentMonth',
            'newProjectsVsPreviousMonthPercentage',
            'totalBudgetVsPreviousMonthPercentage',
            'completedProjectsVsPreviousMonthPercentage',
            'fieldProjectsVsPreviousMonthPercentage'
        ));
    }

    private function calculateNewProjectsVsPreviousMonthPercentage($totalNewProjectsCurrentMonth)
    {
        // Get the total number of new projects for the previous month
        $previousMonth = Carbon::now()->subMonth()->format('m');
        $totalNewProjectsPreviousMonth = request()->user('account')->projects()->whereMonth('created_at', $previousMonth)->count();

        // Calculate the percentage increase
        $percentageIncrease = $totalNewProjectsPreviousMonth > 0
            ? (($totalNewProjectsCurrentMonth - $totalNewProjectsPreviousMonth) / $totalNewProjectsPreviousMonth) * 100
            : 0;

        return $percentageIncrease;
    }

    private function calculateTotalBudgetVsPreviousMonthPercentage($totalBudgetCurrentMonth)
    {
        // Get the total budget for the previous month
        $previousMonth = Carbon::now()->subMonth()->format('m');
        $totalBudgetPreviousMonth = request()->user('account')->projects()->whereMonth('created_at', $previousMonth)->sum('budget');

        // Calculate the percentage change
        $percentageChange = $totalBudgetPreviousMonth > 0
            ? (($totalBudgetCurrentMonth - $totalBudgetPreviousMonth) / $totalBudgetPreviousMonth) * 100
            : 0;

        return $percentageChange;
    }

    private function calculateCompletedProjectsVsPreviousMonthPercentage($totalCompletedProjectsCurrentMonth)
    {
        // Get the total number of completed projects for the previous month
        $previousMonth = Carbon::now()->subMonth()->format('m');
        $totalCompletedProjectsPreviousMonth = request()->user('account')->projects()->whereStatusId(Status::COMPLETED)->whereMonth('created_at', $previousMonth)->count();

        // Calculate the percentage change
        $percentageChange = $totalCompletedProjectsPreviousMonth > 0
            ? (($totalCompletedProjectsCurrentMonth - $totalCompletedProjectsPreviousMonth) / $totalCompletedProjectsPreviousMonth) * 100
            : 0;

        return $percentageChange;
    }

    private function calculateFieldProjectsVsPreviousMonthPercentage($totalFieldProjectsCurrentMonth)
    {
        // Get the total number of failed projects for the previous month
        $previousMonth = Carbon::now()->subMonth()->format('m');
        $totalFailedProjectsPreviousMonth = request()->user('account')->projects()->whereStatusId(Status::FAILD)->whereMonth('created_at', $previousMonth)->count();

        // Calculate the percentage change
        $percentageChange = $totalFailedProjectsPreviousMonth > 0
            ? (($totalFieldProjectsCurrentMonth - $totalFailedProjectsPreviousMonth) / $totalFailedProjectsPreviousMonth) * 100
            : 0;

        return $percentageChange;
    }
}
