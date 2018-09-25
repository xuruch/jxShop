<?php 

// 加载视图函数
function view($file,$data=[]){
    extract($data);
    include(ROOT.'views/'.$file.'.html');
}