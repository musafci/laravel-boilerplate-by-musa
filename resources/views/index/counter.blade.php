<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3>{{ $users }}</h3>
                <p>Users</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-users fa-clipboard-list"></i>
            </div>
            <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-indigo">
            <div class="inner">
                <h3>{{ $categories }}</h3>
                <p>Categories</p>
            </div>
            <div class="icon">
                <i class="nav-icon fas fa-list"></i>
            </div>
            <a href="{{route('category.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>
