<?php 
    Class Controller{
    

        public function loadView($layout, $data = []){
            /**
             * Trích xuất Array tryền xuống từ Controller
             */
            extract($data);
            
            /**
             * Kiểm tra view có tồn tại ? 
             */
            
            if(file_exists('./view/'.$layout.'.php')){

                include('./view/'.$layout.'.php');
                
            }
            else{
                die('View Not Found , Vào folder view kiểm tra lại ?');
            }

        }
    }