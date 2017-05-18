<nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            @if(Request::is('admin/*') || Request::is('admin'))
            <a class="navbar-brand" href="{{ url('admin') }}">หน้าหลัก</a>
            @else
            <a class="navbar-brand" href="{{ url('/') }}">หน้าหลัก</a>
            @endif
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            @if(Request::is('admin/*') || Request::is('admin'))
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        ลงทะเบียน
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('admin/register/scan') }}">รหัสคิวอาร์</a></li>
                        <li><a href="{{ url('admin/register/entry') }}">ลำดับที่</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        รับของ
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('admin/gain/scan') }}">รหัสคิวอาร์</a></li>
                        <li><a href="{{ url('admin/gain/entry') }}">ลำดับที่</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        รายชื่อ
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('admin/participant/list') }}">ดูรายชื่อ</a></li>
                        <li><a href="{{ url('admin/participant/search') }}">ค้นหา</a></li>
                        <li><a href="{{ url('admin/summary') }}">สรุป</a></li>
                    </ul>
                </li>
            </ul>
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
</nav>