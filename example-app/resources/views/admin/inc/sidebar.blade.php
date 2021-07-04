 <div class="sl-sideleft-menu">
        <a href="index.html" class="sl-menu-link active">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Dashboard</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ url('/') }}" class="sl-menu-link _blank">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Visite Site</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{ route('banner.index') }}" class="sl-menu-link @yield('Banner')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Add Banner</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link --> 
          <a href="{{ route('about.index') }}" class="sl-menu-link @yield('About')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Add About</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link --> 
         <a href="{{ route('services.index') }}" class="sl-menu-link @yield('Services')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Add Services</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link --> 
          <a href="{{ route('project.index') }}" class="sl-menu-link @yield('Project')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Add Project</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
         <a href="{{ route('timeline.index') }}" class="sl-menu-link @yield('Timeline')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Add Timeline</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link --> 
        <a href="{{ route('client.index') }}" class="sl-menu-link @yield('Client')">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Add Client</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="#" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
            <span class="menu-item-label">Charts</span>
            <i class="menu-item-arrow fa fa-angle-down"></i>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
          <li class="nav-item"><a href="chart-morris.html" class="nav-link">Morris Charts</a></li>
          <li class="nav-item"><a href="chart-flot.html" class="nav-link">Flot Charts</a></li>
          <li class="nav-item"><a href="chart-chartjs.html" class="nav-link">Chart JS</a></li>
          <li class="nav-item"><a href="chart-rickshaw.html" class="nav-link">Rickshaw</a></li>
          <li class="nav-item"><a href="chart-sparkline.html" class="nav-link">Sparkline</a></li>
        </ul>
      
      
      </div><!-- sl-sideleft-menu -->