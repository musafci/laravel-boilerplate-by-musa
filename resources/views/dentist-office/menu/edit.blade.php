@extends('layouts.admin')
@section('content')

    <section class="content">

        <!-- Default box -->
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Edit Menu
                        </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route("menu.update", [$menu_item->id]) }}"  enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="row ">
                                <div class="col-6">
                                    <div class="form-group ">
                                        <label for="main_menu">Main Menu</label>
                                        <select  id="status" name="parent_id" class="form-control ">
                                            <option value="{{ $menu_item->parent_id }}">
                                                @if($menu_item->parent_id == 0)
                                                    Main Menu
                                                @else
                                                    {{ $main_menus[--$menu_item->parent_id]['menu_name'] }}
                                                @endif
                                            </option>
                                            @foreach ($main_menus as $key => $menu_primary)
                                                @if($key != $menu_item->parent_id)
                                                    <option value="{{++$key}}"> {{ $menu_primary['menu_name']}}  </option>
                                                @endif
                                            @endforeach
                                            @if($menu_item->parent_id != 0)
                                                <option value="0"> Main Menu  </option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-2">
                                    @if(!empty($menu_item->icon))
                                        <img src="https://d1gpq2c3n7cisg.cloudfront.net/{{$menu_item->icon}}"
                                             style="
                                             width: 90px;
                                             height: 90px;
                                             background-color: lightskyblue;
                                             display: block;
                                             margin-left: auto;
                                             margin-right: auto;
                                             margin-top: auto;
                                             padding: 15px;
                                             border-radius: 10px;
                                             "
                                        />
                                    @endif
                                </div>

                                @php
                                    if (!empty($menu_item->icon)) {
                                        $image_data = explode("/", $menu_item->icon);
                                    }
                                @endphp
                                <div class="col-4">
                                    <div class="form-group">
                                            <label for="name" >Image <span style="color: red; font-size: 14px;">
                                                    * Icon must be white
                                                </span></label>
                                            <input type="file" class="form-control"  id="image" placeholder="Image" name="icon" >

                                            @if ($errors->has('icon'))
                                                <span class="text-danger">{{ $errors->first('icon') }}</span>
                                                <br>
                                            @endif
                                        @if(!empty($menu_item->icon))
                                            <span style="color: #ff9800; font-size: 14px; font-weight: bold">{{ $image_data[2] ?? null }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('permission_id') ? 'has-error' : '' }}">
                                <label for="permission_id">Permission</label>
                                <select  id="permission_id" name="permission_id" class="form-control col-4">
                                    <option value="{{ $menu_item->permission_id }}">
                                        @if($menu_item->permission_id != 0)
                                            {{ $permission_set[--$menu_item->permission_id]['name'] }}
                                        @endif
                                    </option>
                                    @foreach ($permission_set as $key => $permission_primary)
                                        @if($key != $menu_item->permission_id)
                                            <option value="{{++$key}}"> {{ $permission_primary['name']}}  </option>
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->has('permission_id'))
                                    <span class="text-danger" role="alert">{{ $errors->first('permission_id') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('menu_name') ? 'has-error' : '' }}">
                                <label for="menu_name">Menu Name</label>
                                <input class="form-control" type="text" name="menu_name" value="{{ old('menu_name', isset($menu_item) ? $menu_item->menu_name : null) }}" required >
                                @if($errors->has('menu_name'))
                                    <span class="help-block" role="alert">{{ $errors->first('menu_name') }}</span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('menu_url') ? 'has-error' : '' }}">
                                <label for="menu_url">Menu URL</label>
                                <input class="form-control" type="text" name="menu_url" value="{{ old('menu_url', isset($menu_item) ? $menu_item->menu_url : null) }}" required >
                                @if($errors->has('menu_url'))
                                    <span class="help-block" role="alert">{{ $errors->first('menu_url') }}</span>
                                @endif
                            </div>
                            
                            <div class="form-group {{ $errors->has('is_show_submenu') ? 'has-error' : '' }}">
                                <label for="showSubmenu">Show Submenu<span class="text-red"> *</span></label>
                                <select  id="showSubmenu" name="is_show_submenu" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="1" @if(isset($menu_item->is_show_submenu) && $menu_item->is_show_submenu == 1) selected @endif>Yes</option>
                                    <option value="0" @if(isset($menu_item->is_show_submenu) && $menu_item->is_show_submenu == 0) selected @endif>No</option>
                                </select>
                                @if($errors->has('is_show_submenu'))
                                    <span class="text-danger" role="alert">{{ $errors->first('is_show_submenu') }}</span>
                                @endif
                            </div>

                            <div class="form-group ">
                                <label for="menu_status">Menu Status</label>
                                <select  id="status" name="status" class="form-control col-4">
                                    <option value="{{ $menu_item->status }}">
                                        @php
                                            if($menu_item->status)
                                                $menu_item->status = 'active';
                                            else
                                                $menu_item->status = 'inactive';
                                        @endphp
                                        {{ $menu_item->status }}
                                    </option>
                                    @foreach ($select_status as $key => $status)
                                        @if($status != $menu_item->status)
                                            <option value="{{$key}}"> {{$status}} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            @if($menu_item->parent_id == 0)
                            <div class="form-group">
                                <label for="order">Menu Order</label>
                                <input class="form-control" type="text" name="order" value="{{ old('order', isset($menu_item) ? $menu_item->order : null) }}">
                            </div>
                            @endif

                            <div class="form-group">
                                <input type="hidden" name="id" value="{{ $menu_item->id }}">
                                <button class="btn btn-danger float-right" type="submit">
                                    Update
                                </button>
                                <a class="btn btn-default" href="{{ route('menu.index') }}">
                                    Back
                                </a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection
