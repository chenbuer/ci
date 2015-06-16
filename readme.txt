学习php的CI框架。这个是LAMP兄弟连的笔记。
----------------------------
目录结构说明
license.txt 许可协议
user_guide  用户手册
system      框架核心文件
application 应用目录
index.php   入口文件

---------------------------

MVC
1.入口文件。
        唯一一个让浏览器直接请求的脚本文件
2.控制器controller
        协调模型和视图
3.模型
        提供数据，保存数据
4.视图view
        只负责显示
        表单...
5.动作action(方法）
        是控制器中方法，用于被浏览器请求

CI中的MVC
        访问url使用的是pathinfo

        入口文件.php/控制器/动作

        application目录中：
                controllers 控制器
                models            模型
                views            视图
    
        默认控制器是welcome
        默认动作是index

控制器
        1.不需要加后缀
        2.文件名全部小写 例如 user.php
        3.所有的控制器，直接或间接继承来自CI_controller类
        4.控制器中，对动作（方法）要求：
                public
                不能以_开头

视图
        1.在控制器中如果加载视图
                //直接写视有自图名字，不写扩展名，如果有子目录，则写上目录名
                $this->load->view(视图）；
        2.视图中，直接使用原生php代码
        3.推荐使用
                <?php foreach($list as $item);?>
                <?=$item['name'] ?>
                <?php endforeach;?>

超级对象
        当前的控制器对象
        提供了很多属性：
        $this->load
                装载器类的实例 system/core/loader.php
                装载器类提供方法：
                view()        装在视图
                vars()  分配变量到视图
                database(） 装载数据库操作对象
                model()    装载模型对象
                helper()    
        
        $this->uri
                是CI_URI类实例的 system/core/URI.php
                CI_URI类提供方法
                segment(n)用于获取url中的第n个参数（值）

                传统的：入口文件.php/控制器/动作/参数1/值1/参数2/值2
                 入口文件.php/控制器/动作/参数1/参数2


                echo $this->segment(3);//值1
                echo $this->segment(4);//值2

                //index.php/控制器/index/6
                public function index($p=0){
                        echo $p;//输出6
                }

        $this->input
               输入类
                是CI_Input类实例的 system/core/Input.php
                CI_URI类提供方法:
                $this->input->post('username');      //$_POST['username']
                $this->input->server('DOCUMENT_ROOT');      //$_SERVER['DOCUMENT_ROOT']

        在视图中，直接用$this来访问超级对象的属性

数据库访问
                修改配置文件
                application/config/database.php

                将数据库访问对象，装载到超级对象的属性中 $this->db
                $this->load->database();

                $res=$this->db->query($sql);//返回对象
                $res->result();//返回数组，数组中是一个一个的对象
                $res->result_array();//返回二维数组，里面是关联数组
                $res->row() //.返回第一条数据，直接是一个对象