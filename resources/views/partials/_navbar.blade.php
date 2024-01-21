<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('dashboard')}}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
{{--                <i class="fas fa-search"></i>--}}
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>
        <li>

            <button type="button" class="btn " data-toggle="modal" data-target="#notificationsModal">
                <i class="fas fa-bell"></i>
                @if($notification_count > 0)
                    <span class="badge badge-danger">{{ $notification_count }}</span>
                @endif
            </button>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
    </ul>
</nav>

{{-- HERE STARTS--}}
<style>
    .modal.right .modal-dialog {
        position: fixed;
        /*top: 35%;*/
        right: 0;
        /*transform: translateY(-50%);*/
    }
</style>
<div class="modal fade right" id="notificationsModal" tabindex="-1" role="dialog" aria-labelledby="notificationsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-body" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationsModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body " id="notifications-list">

            </div>
            <div class="modal-footer">
                <a class="btn btn-warning justify-content-start" href="{{ route('view.notifications') }}">
                    View All Notifications
                </a>
                @if($notification_count > 0)
                    <a class="btn btn-info justify-content-start" href="{{ route('mark.notifications') }}">
                        Mark All Read
                    </a>
                @endif
                <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#notificationsModal").on("show.bs.modal", function () {
            $.ajax({
                url: "{{ route('notifications') }}",
                method: "GET",
                success: function(response) {
                    console.log('Success:', response);
                    $("#notifications-list").html(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("Error fetching data:", textStatus, errorThrown);
                    $("#data-list").html("<p>Error fetching data.</p>");
                }
            });
        });
    });
</script>
