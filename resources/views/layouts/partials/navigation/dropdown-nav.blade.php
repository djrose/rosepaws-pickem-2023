    <li>
        <a href="{{ route('goals.index') }}">
            <i class="fa fa-fw fa-btn fa-trophy" aria-hidden="true"></i>&nbsp;{{ config('assets.terminology.goals') }}
        </a>
    </li>

    <li>
        <a href="{{ route('objectives.index') }}">
            <i class="fa fa-fw fa-btn fa-bullseye" aria-hidden="true"></i>&nbsp;{{ config('assets.terminology.objectives') }}
        </a>
    </li>

    <li>
        <a href="{{ route('initiatives.index') }}">
            <i class="fa fa-fw fa-btn fa-tasks" aria-hidden="true"></i>&nbsp;{{ config('assets.terminology.initiatives') }}
        </a>
    </li>

    <li>
        <a href="{{ route('metrics.index') }}">
            <i class="fa fa-fw fa-btn fa-line-chart" aria-hidden="true"></i>&nbsp;{{ config('assets.terminology.metrics') }}
        </a>
    </li>

    <li>
        <a href="{{ route('milestones.create') }}">
            <i class="fa fa-fw fa-btn fa-calendar" aria-hidden="true"></i>&nbsp;{{ config('assets.terminology.milestones') }}
        </a>
    </li>
