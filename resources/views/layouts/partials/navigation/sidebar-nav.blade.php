<div class="panel panel-default panel-flush">
    <div class="panel-heading">
        Workflow
    </div>

    <div class="panel-body">
        <div class="spark-settings-tabs">
            <ul class="nav spark-settings-stacked-tabs" role="tablist">
                <!-- Business Goal Link -->
                <li role="presentation">
                    <a href="{{ route('goals.index') }}" aria-controls="goal" role="tab" data-toggle="tab">
                        <i class="fa fa-fw fa-btn fa-lock"></i>Business Goal
                    </a>
                </li>

                <!-- Objective Link -->
                <li role="presentation">
                    <a href="{{ route('objectives.index') }}">
                        <i class="fa fa-fw fa-btn fa-bullseye"></i>Objective
                    </a>
                </li>

                <!-- Project Link -->
                <li role="presentation">
                    <a href="{{ route('initiatives.index') }}" aria-controls="project" role="tab" data-toggle="tab">
                        <i class="fa fa-fw fa-btn fa-edit"></i>Project
                    </a>
                </li>

                <!-- Impact Link -->
                <li role="presentation">
                    <a href="{{ route('impacts.index') }}" aria-controls="impact" role="tab" data-toggle="tab">
                        <i class="fa fa-fw fa-btn fa-exclamation"></i>Impact
                    </a>
                </li>

                <!-- Metric Link -->
                <li role="presentation">
                    <a href="{{ route('metrics.index') }}" aria-controls="metric" role="tab" data-toggle="tab">
                        <i class="fa fa-fw fa-btn fa-line-chart"></i>Metric
                    </a>
                </li>

                <!-- Milestone Link -->
                <li role="presentation">
                    <a href="{{ route('milestones.index') }}" aria-controls="milestone" role="tab" data-toggle="tab">
                        <i class="fa fa-fw fa-btn fa-calendar"></i>Milestone
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
