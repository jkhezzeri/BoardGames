<?php

namespace App\Controllers;

class User extends BaseController {

    public function join() {       
        return view('join');
    }

    public function login() {       
        return view('login');
    }

    public function register() {

        $data = array();
        $request = request();
        
        if ($request->is('post')) {
            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('joinRules');
            $post = $request->getPost();

            if ($this->validate($rules)) {

                $model = model('UserModel');

                $model->insertUser($post);

                /* $data['success'] = 'L\'utilisateur a été enregistré.';
                return view('home', $data); */

                $user = $model->connect($post);
                session()->set('login', $user['username']);
                session()->set('avatar', $user['avatar']);
                session()->set('admin', $user['admin']);


                return redirect()->to('/');
            }
            else {
                $data['validation'] = $this->validator;
                $data['username'] = $post['username'];
                $data['email'] = $post['email'];
                $data['password'] = $post['password'];
            }

        }
        return view('join', $data);

    }

    public function sign() {

        $data = array();

        $request = request();

        if ($request->is('post')) {
            
            $post = $request->getPost();

            $validation = \Config\Services::validation();
            $rules = $validation->getRuleGroup('loginRules');

            if ($this->validate($rules)) {

                $model = model('UserModel');
                $user = $model->connect($post);

                if (!is_string($user)) {
                    /* echo 'Connexion réussie.';
                    die(); */

                    session()->set('login', $user['username']);
                    session()->set('avatar', $user['avatar']);
                    session()->set('admin', $user['admin']);

                    return redirect()->to('/');
                } else {
                    $data['error'] = $user;
                    $data['email'] = $post['email'];
                    $data['password'] = $post['password'];
                }
            }
            else {
                $data['validation'] = $this->validator;
                $data['email'] = $post['email'];
                $data['password'] = $post['password'];
            }

        }
        return view('login', $data);

    }

    public function logout() {   
        session()->remove('login');    
        return redirect()->to('/');
    }

    public function profile() {     
        if (session()->has('login')){

            $model = model('UserModel');
            $profile = $model->getUserData(session('login'));

            $data['user'] = $profile;


            return view('profile', $data);
        } else {
            return redirect()->to('/');
        }
    }



    public function updateProfile() {
        $request = request();

        if ($request->is('post')) {
            
            $post = $request->getPost();
            $file = $request->getFile('avatar');

            /* echo $name = $file->getName().'<br>';
            echo $tmpName = $file->getTempName().'<br>';
            echo $size = $file->getSize().'<br>';
            echo $type = $file->getMimeType().'<br>';
            echo ROOTPATH.'public/uploads/avatar/'.$randomName.'<br>';
            echo base_url('uploads/avatar/'.$randomName); */
            
            if ($file->getError() == 0) {
                $randomName = $file->getRandomName();
                $file->move(ROOTPATH.'public/uploads/avatar/', $randomName);
                $post['avatar'] = base_url('uploads/avatar/'.$randomName);
            }

            $model = model('UserModel');
            $user = $model->updateUser($post);

            /* echo '<pre>';
            print_r($user);
            echo '</pre>';
            die(); */

            session()->set('avatar', $user['avatar']);

            $updated = 'Profile has been updated successfully.';

            session()->setFlashdata('updated', $updated);
            return redirect()->to('profile');

        }
    }


    public function changePassword() {
        $request = request();

        if ($request->is('post')) {
            
            $post = $request->getPost();

            /* echo'<pre>';
            print_r($post);
            echo'</pre>'; */

            $model = model('UserModel');
            $user = $model->updatePassword($post);

            if (!is_string($user)) {

                $passwordChanged = 'Password has been changed successfully.';
                session()->setFlashdata('passwordChanged', $passwordChanged);

            } else {
                $message = $user;
                session()->setFlashdata('message', $message);
            }

            /* echo $message;
            die(); */
            return redirect()->to('profile');

        }
    }



    public function deleteAccount() {
        $request = request();

        if ($request->is('post')) {
            
            $post = $request->getPost();

            $model = model('UserModel');
            $user = $model->deleteUser($post);

            echo'<pre>';
            print_r($user);
            echo'</pre>';

            if (!is_string($user)) {

                $delete = 'Account has been deleted successfully.';
                session()->setFlashdata('delete', $delete);
                /* return redirect()->to('logout'); */
                $this->logout();
                return redirect()->to('/');

            } else {
                $error = $user;
                session()->setFlashdata('error', $error);
                return redirect()->to('profile');
            }

        }
    }


}