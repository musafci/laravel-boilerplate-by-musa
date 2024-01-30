@if($row->is_parent == 1 && $row->parent_name != null)
    <span class="btn-xs btn-primary">{{$row->parent_name}}</span>
@endif

@if($row->is_parent == 1 && $row->parent_name == null)
    <span class="btn-xs btn-primary">Parent deleted</span>
@endif