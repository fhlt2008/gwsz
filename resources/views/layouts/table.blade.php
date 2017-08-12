<div class="container-fluid">
        <table class="table table-striped table-bordered table-hover text-center">

            @foreach ($item as $m)
                <th class="success text-center">{{$m}}</th>
                @endforeach
            </tr>
                @php
                    $test ="";
                    $num =1;
                @endphp
            @foreach($value as $i =>$v)
                <tr>
                    @php

                    $flag = $v["聘任等级"];
                    @endphp


                    @foreach($item as $m)
                        @if ($loop->first)
                            @if($flag !=$test)
                                @php
                                $num =1;
                                $test = $flag;
                                @endphp


                            @endif

                                <td >{{$num++}}</td>
                        @else

                            <td >{{$v->$m}}</td>
                        @endif
                    @endforeach
                </tr>
            @endforeach



        </table>


        <div class="clearfix">
            <div class="col-md-3"></div>
            <div class="col-md-6 center">
                @php
                    $level="";
                    foreach ((array)$pages[4] as $value){
                        $level.=$value.",";
                    }
                $level = rtrim($level,",");
                @endphp
            <button name="{{$pages[2]}}" level="{{$level}}" page="{{$pages[0]-1}}" code="{{$pages[3]}}" type="submit" class="col-md-1 col-md-offset-4 btn btn-sm btn-primary" >
                上一页</button>
            <label style="vertical-align:middle;text-align:center;display:table-cell;height: 50px" class="inline col-md-4 ">
                第<span id="page">{{$pages[0]}}</span>页,共{{$pages[1]}}页
            </label>


            <button name="{{$pages[2]}}" level="{{$level}}" page="{{$pages[0]+1}}" code="{{$pages[3]}}" class=" col-md-1  btn btn-sm btn-primary" >
                下一页</button>
            </div>
            <div class="col-md-3"></div>
        </div>

    </div>


