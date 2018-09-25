<?php
namespace controllers;

class CodeController {

    // 生成代码
    public function make(){
        // 接受参数
        $tableName = $_GET['name'];

        // 生成控制器
        $cname = ucfirst($tableName).'Controller';
        // var_dump($tableName);die;
        // 加载摸板
        ob_start();
        include(ROOT.'templates/controller.php');
        $str = ob_get_clean();
        file_put_contents(ROOT.'controllers/'.$cname.'.php', "<?php\r\n".$str);

        // 生成模型
        $mname = ucfirst($tableName);
        ob_start();
        include(ROOT.'templates/model.php');
        $str = ob_get_clean();
        file_put_contents(ROOT.'models/'.$mname.'.php', "<?php\r\n".$str);

        // 生成试图文件
        @mkdir(ROOT.'views/'.$tableName,0777);
        ob_start();
        include(ROOT.'templates/create.html');
        $str = ob_get_clean();
        file_put_contents(ROOT.'views/'.$tableName.'/create.html', $str);
        ob_start();
        include(ROOT . 'templates/edit.html');
        $str = ob_get_clean();
        file_put_contents(ROOT.'views/'.$tableName.'/edit.html', $str);
        ob_start();
        include(ROOT . 'templates/index.html');
        $str = ob_get_clean();
        file_put_contents(ROOT.'views/'.$tableName.'/index.html', $str);
    }

}