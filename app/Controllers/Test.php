<?php

namespace App\Controllers;

class Test extends BaseController {

    public function test() {       
        return view('test');
    }

    /* public function getURLContent() {
        $url = file_get_contents('https://boardgamegeek.com/boardgame/13/catan');
        $xml = simplexml_load_string($xml);
        $json = json_encode($url);
        $data = json_decode($json, true);

        echo'<pre>';
        print_r($data);
        echo'</pre>';
    } */


    public function formTest() {
        $data = array();
        $request = request();
        
        if ($request->getMethod() == 'post') {
            $post = $request->getFile('file');

            echo'<pre>';
            print_r($_FILES);
            echo'</pre>';
            
            echo'<pre>';
            print_r($post);
            echo'</pre>';

            echo $name = $post->getName().'<br>';
            echo $tmpName = $post->getTempName().'<br>';
            echo $size = $post->getSize().'<br>';
            echo $type = $post->getMimeType().'<br>';

            echo base_url('assets/img/avatar/'.$name).'<br>';

            $randomName = $post->getRandomName();
            $post->move(ROOTPATH.'public/uploads/avatar/', $randomName);

            echo '<img src="'.base_url('uploads/avatar/'.$randomName).'">';

        }
    }
    
}
