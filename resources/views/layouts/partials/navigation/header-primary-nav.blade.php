{{-- MAIN HEADER AND NAVIGATION
  -- NOTES: This navigation bar is site wide but can be overriden in child template.
--}}

<header id="hdr_global" class="hdr-global">
  {{-- PRIMARY NAVBAR --}}
  <div id="nav_bar_primary" class="nav-bar-primary">

    <div class="nav-logo-wrapper">
    </div>

    <nav id="top_nav" class="top-nav">
      <ul class="top-nav-list">
        <li><a href="{{ route('goals.index') }}">Goals</a></li>
        <li><a href="{{ route('objectives.index') }}">Objectives</a></li>
        <li><a href="{{ route('initiatives.index') }}">Initiatives</a></li>
        <li><a href="{{ route('impacts.index') }}">Impacts</a></li>
        <li><a href="{{ route('metrics.index') }}">Metrics</a></li>
        <li><a href="{{ route('initiativeMetrics.index') }}">InitiativeMetrics</a></li>
        <li><a href="{{ route('milestones.index') }}">Milestones</a></li>
      </ul>
    </nav>

    <nav id="btn_nav" class="btn-nav">
      <ul class="btn-nav-list">
      </ul>
    </nav>

  </div> {{-- // end of nav_bar_primary --}}

  {{-- Secondary NAV Bar--}}
  @if (isset($hasSecondary))
    @if ($hasSecondary)
      @include('layouts.partials.navigation.header-secondary-nav')
    @endif
  @endif

</header>
