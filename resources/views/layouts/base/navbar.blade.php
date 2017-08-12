        <div class="navbar-header pull-left ">
            <a href="#" class="navbar-brand">
                <small>
                    <i class="icon-leaf orange2"></i>
                    {{$title}}
                </small>
            </a><!-- /.brand -->
        </div><!-- /.navbar-header -->
        <div class="navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav">
                <li class="grey">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-tasks"></i>
                        <span class="badge badge-grey">{{count($task)}}</span>
                    </a>

                    <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-ok"></i>
                            还有{{count($task)}}个任务完成
                        </li>
                        @foreach($task as $item=>$value)

                        <li>
                            <a href="#">
                                <div class="clearfix">
                                    <span class="pull-left">{{$item}}</span>
                                    <span class="pull-right">{{$value}}%</span>
                                </div>

                                <div class="progress progress-mini ">
                                    <div style="width:{{$value}}%" class="progress-bar "></div>
                                </div>
                            </a>
                        </li>

                        @endforeach
                        <li>
                            <a href="#">
                                查看任务详情
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="purple">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-bell-alt icon-animated-bell"></i>
                        <span class="badge badge-important">{{count($notify)}}</span>
                    </a>

                    <ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-warning-sign"></i>
                            {{count($notify)}}条通知
                        </li>
                        @foreach($notify as $item=>$value)

                        <li>
                            <a href="#">
                                <div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-xs no-hover btn-pink icon-comment"></i>
                                                {{$item}}
											</span>
                                    <span class="pull-right badge badge-info">+{{$value}}</span>
                                </div>
                            </a>
                        </li>
                        @endforeach

                        <li>
                            <a href="#">
                                查看所有通知
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="green">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success">{{count($message)}}</span>
                    </a>

                    <ul class="pull-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="icon-envelope-alt"></i>
                            {{count($message)}}条消息
                        </li>
                        @foreach($message as $item=>$value)

                        <li>
                            <a href="#">
                                <img src="/resources/assets/avatars/avatar.png" class="msg-photo" alt="" />
                                <span class="msg-body">
											<span class="msg-title">
												<span class="blue">{{$item}}</span>
												{{$value}}
											</span>

										</span>
                            </a>
                        </li>
                        @endforeach

                        <li>
                            <a href="#">
                                查看所有消息
                                <i class="icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="/resources/assets/avatars/user.jpg" alt="Jason's Photo" />
                        <span class="user-info">
									<small>欢迎光临,</small>
									{{$name}}
								</span>

                        <i class="icon-caret-down"></i>
                    </a>

                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="#">
                                <i class="icon-cog"></i>
                                设置
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="icon-user"></i>
                                个人资料
                            </a>
                        </li>

                        <li class="divider"></li>

                        <li>
                            <a href="#">
                                <i class="icon-off"></i>
                                退出
                            </a>
                        </li>
                    </ul>
                </li>
            </ul><!-- /.ace-nav -->
        </div><!-- /.navbar-header -->
