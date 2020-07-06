<div class="list-group">
    <a href="{{ url('admin') }}" class="list-group-item list-group-item-action {{ (request()->is('admin')) ? 'active' : '' }}">
        <i class="fa fa-th-large"></i>
        <span>Dashboard</span>
    </a>
    <a href="{{ url('notifications') }}" class="list-group-item list-group-item-action {{ (request()->is('notificatios')) ? 'active' : '' }}">
        <i class="fa fa-bell" aria-hidden="true"></i>
        <span>Notificaciones</span>
    </a>
    
    {{-- menu collapsed --}}
    <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#submenu_2" role="button" aria-expanded="false" aria-controls="collapseExample">
        <i class="fa fa-server"></i>
        <span>Test</span>
    </a>
    <div class="list-group collapse" id="submenu_2">
        <a href="#" class="list-group-item list-group-item-action">
            <span>Dashboard</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <span>EdDashboard</span>
        </a>
        <a href="#" class="list-group-item list-group-item-action">
            <span>Sub Dashboard</span>
        </a>
    </div>
</div>