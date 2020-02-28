<?php
$segment = Request::segments();
?>
        <aside id="leftsidebar" class="sidebar">
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                @foreach($menu as $key => $value)
                    @if(isset($value->child))
                        <li class="<?php echo $active ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons-outlined">{{ $value->icon }}</i>

                                <span>{{ $value->menu }}</span>

                            </a>
                            <ul class="ml-menu">
                            @foreach ($value->child as $keyC => $valueC)
                                <li>
                                @if($valueC->menu )
                                    <a href="{{URL::to($valueC->routes)}}">
                                            <span>{{ $valueC->menu }}</span>

                                    </a>
                                @endif
                                </li>
                            @endforeach
                            </ul>
                        </li>
                    @else
                    <li class="<?php echo $segment[0] == $value->routes ? 'active' : '' ?>">
                        <a href="{{URL::to($value->routes)}}">
                            <i class="material-icons-outlined">{{ $value->icon }}</i>

                                <span>{{ $value->menu }}</span>

                        </a>
                    </li>
                    @endif
                @endforeach
                </ul>
            </div>
            <!-- #Menu -->
        </aside>