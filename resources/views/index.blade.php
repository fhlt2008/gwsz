@extends('layouts.base.app')
@section('header')
    @endsection


@section('content')
    @includeIf('layouts.base',['hgq'=>$hgq,'pgq'=>$pgq,'hgl'=>$hgl,'psjt'=>$psjt,
    'pgl'=>$pgl,"hzj0"=>$hzj0,"hzj1"=>$hzj1,"hzj2"=>$hzj2,"hzj3"=>$hzj3,"pzj0"=>$pzj0,"pzj1"=>$pzj1,"pzj2"=>$pzj2,"pzj3"=>$pzj3])
@endsection
