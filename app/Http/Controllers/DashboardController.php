<?php

namespace App\Http\Controllers;

use App\Models\LabService;
use App\Models\Patient;
use App\Models\Payment;
use App\Models\TestResult;
use App\Models\User;
use Illuminate\Contracts\View\View;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class DashboardController extends Controller
{
    public function index(): View
    {
        // initialize charts
        $patient_bar_chart     = new LaravelChart($this->patientBarChart());
        $user = new LaravelChart($this->user());

        $greetings = $this->greetings();

        return view('pages/dashboard/dashboard', compact('greetings', 'patient_bar_chart', 'user'));
    }

    private function greetings(): string
    {
        // This sets the $time variable to the current hour in the 24 hour clock format 
        $time = date("H");

        // match expresion 
        return match (true) {
            $time < "12" => 'Good morning',
            $time >= "12" &&
                $time < "17" => "Good afternoon",
            $time >= "17" &&
                $time < "19"  => "Good evening",
            $time >= "19" => "Good night"
        };
    }

    // chart to display total number of patients per month
    private function patientBarChart(): array
    {
        return [
            'chart_title'     => 'Patient by months',
            'report_type'     => 'group_by_date',
            'model'           => Patient::class,
            'group_by_field'  => 'created_at',
            'group_by_period' => 'month',
            'chart_type'      => 'bar',
            'chart_color'     => '0,0,255',
            'chart_height'    => '600px'
        ];
    }

    private function user(): array
    {
        return [
            'chart_title'     => 'Users by months',
            'report_type'     => 'group_by_date',
            'model'           => User::class,
            'group_by_field'  => 'created_at',
            'group_by_period' => 'month',
            'chart_type'      => 'line',
            'chart_color'     => '0,0,255',
            'chart_height'    => '600px'
        ];
    }
}
