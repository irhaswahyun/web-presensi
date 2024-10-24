@auth
    @php
      $user = auth()->user();
    @endphp
@endauth

<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    @if($user->role === \App\Models\User::ROLE_ADMIN)
    <!-- Dashboard -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('admin.dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <!-- End Dashboard Nav -->

    <!-- PRESENSI -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('absen.view') }}">
        <i class="bi bi-calendar-check"></i>
        <span>Data Presensi</span>
      </a>
    </li>
    <!-- End PRESENSI -->

     <!-- GURU -->
     <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('guru.view') }}">
      <i class="bi bi-people"></i>
        <span>Data Guru</span>
      </a>
    </li><!-- End Guru -->

    @elseif($user->role === \App\Models\User::ROLE_GURU)
    <!-- PRESENSI -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="{{ route('absensi') }}">
        <i class="bi bi-calendar-check"></i>
        <span>Presensi</span>
      </a>
    </li><!-- End PRESENSI -->
    @endif
  </ul>

</aside><!-- End Sidebar-->

