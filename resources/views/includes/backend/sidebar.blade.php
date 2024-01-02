<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Postingan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('category.index')}}">
              <i class="bi bi-circle"></i><span>Kategori Berita</span>
            </a>
          </li>
          <li>
            <a href="{{route('article.index')}}">
              <i class="bi bi-circle"></i><span>Postingan Berita</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->
       

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{route ('users.index')}}">
          <i class="bi bi-person"></i>
          <span>Users</span>
        </a>
      </li><!-- End Profile Page Nav -->      

     
            

    </ul>

  </aside><!-- End Sidebar-->