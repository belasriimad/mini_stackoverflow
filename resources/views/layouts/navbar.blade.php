<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('/')}}">Mini Stack</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Account
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @guest
                <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
            @endguest
            @auth
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form id="logoutForm" action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="#"
                        onclick="document.getElementById('logoutForm').submit()">Logout</a>
                </li>
            @endauth
          </ul>
        </li>
        @auth
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Collectives
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{route('collectives.index')}}">
                        My Collectives
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('collectives.create')}}">
                        Create Collective
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Questions
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{route('questions.index')}}">
                        My Questions
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{route('questions.create')}}">
                        Create Question
                    </a>
                </li>
            </ul>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
