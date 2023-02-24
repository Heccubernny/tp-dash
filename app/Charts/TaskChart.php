<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class TaskChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->options([]);
    }

    public function labels($labels)
    {
        $this->options['labels'] = $labels;
        return $this;
    }
}
