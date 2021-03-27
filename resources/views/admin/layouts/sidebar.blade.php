  <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                    <i class="fas fa-cogs fa-2x text-white"></i>
                </div>
                <div class="info text-white">
                    <h5>{{ \Auth::user()->name }}</h5>
                </div>
            </div>

          <li class="nav-header">
             <a class="nav-header">
                 <i class="fas fa-tachometer-alt fa-2x"></i>
                 Dashboard 
             </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                      Home
                  </p>
              </a>
          </li>
          @if (\Auth::user()->name == 'admin')
              <li class="nav-item">
                  <a href="{{ route('category.index') }}" class="nav-link">
                      <i class="fa fa-fw fa-tags"></i>
                      <p>
                          Category
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('ads.index') }}" class="nav-link">
                      <i class="fa fa-fw fa-bullhorn"></i>
                      <p>
                          Ads
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('user.index') }}" class="nav-link ">
                      <i class="fa fa-fw fa-users"></i>
                      <p>
                          User
                      </p>
                  </a>
              </li>
          @endif

          <li class="nav-item">
              <a href="{{ Route('article.index') }}" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                      Article
                  </p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('manage.comments') }}" class="nav-link">
                  <i class="nav-icon far fa-comments"></i>
                  <p>
                      Comments
                  </p>
              </a>

          </li>

          <li class="nav-header">Lainnya</li>
          <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>Logout</p>
              </a>
          </li>
      </ul>
      <br>
      <br>
      <br>
      <br>
  </nav>
